<?php

    namespace App\Http\Controllers;

    use App\Courses;
    use App\Features\SMS;
    use App\Mail\NewQuery;
    use App\Queries;
    use App\Recovery;
    use Carbon\Carbon;
    use DateTime;
    use DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;

    class QueriesController extends Controller {

        public function index()
        {
            $date    = \Carbon\Carbon::today()->subDays(60);
            $queries = DB::table('queries')->where('created_at', '>=', $date)->get();

            return view('pages.queries.queries')->with('queries', $queries);
        }

        public function manage()
        {
            $queries  = Queries::whereDate('created_at', Carbon::today())->get();
            $yQueries = Queries::whereDate('created_at', Carbon::yesterday())->get();

            $todayQueries  = $queries->count();
            $yesterQueries = $yQueries->count();


            Carbon::setWeekStartsAt(Carbon::SUNDAY);
            $weekQueries
                = DB::table('queries')->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();

            $currentMonth = date('m');
            $monthQueries
                          = DB::table('queries')->whereRaw('MONTH(created_at) = ?', [$currentMonth])//                ->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
            ->count();

            $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
            $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();

            $lastMonth = DB::table('queries')->whereBetween('created_at', [
                $fromDate,
                $tillDate
            ])->count();

            $recentQueries = Queries::latest()->limit(10)->get();

            $contactType
                = DB::table('queries')->whereRaw('MONTH(created_at) = ?', [$currentMonth])->select('q_interaction_type', DB::raw('count(*) as total'))->groupBy('q_interaction_type')->get();

            $courseQueries
                = DB::table('courses')->whereRaw('MONTH(created_at) = ?', [$currentMonth])->select('c_title', DB::raw('count(*) as total'))->groupBy('c_title')->get();

            $courseQueries
                = Courses::withCount([
                                         'queries' => function ($query) use ($fromDate, $tillDate, $currentMonth) {
                                             $query->whereRaw('MONTH(course_query.created_at) = ?', [$currentMonth]);
                                         }
                                     ])->get();


            // Month Charts Data
            $monthDayWiseVisitDates
                = $this->queryStatsMethod('d', 'DATE(created_at) as date', now()->startOfMonth(), now()->endOfMonth(), 'On Campus Visit');
            if(!empty($monthDayWiseVisitDates[1]))
                $visitMax = round((max($monthDayWiseVisitDates[1]) + 20 / 2) / 10) * 10; else $visitMax = -1;

            // Year Charts Data
            $queryYearVisitData
                = $this->queryStatsMethod('m', 'MONTH(created_at) as date', now()->startOfYear(), now()->endOfYear(), 'On Campus Visit');;
            if(!empty($queryYearVisitData[1]))
                $yearVisitMax = round((max($queryYearVisitData[1]) + 50 / 2) / 10) * 10; else $yearVisitMax = -1;


            return view('pages.queries.manage', compact('visitMax', 'monthDayWiseVisitDates', 'yearVisitMax', 'queryYearVisitData'))->with('todayQueries', $todayQueries)->with('yesterQueries', $yesterQueries)->with('weekQueries', $weekQueries)->with('monthQueries', $monthQueries)->with('recentQueries', $recentQueries)->with('contactType', $contactType)->with('lastMonth', $lastMonth)->with('courseQueries', $courseQueries);
        }

        public function queryStatsMethod($type, $rangeType, $startDate, $endDate, $interactionType): array
        {
            $queryVisitDays = DB::table('queries')->whereBetween('created_at', [
                $startDate,
                $endDate
            ])->where('q_interaction_type', $interactionType)->select(DB::raw($rangeType), DB::raw('count(*) as queries'))->groupBy('date')->get();

            $dateArr  = [];
            $queryArr = [];
            foreach($queryVisitDays as $single) {
                if($type == "d") {
                    $date      = new \DateTime($single->date);
                    $dateArr[] = $date->format('d') . ' (' . $date->format('D') . ') ';
                } else {
                    $dt        = DateTime::createFromFormat('!m', $single->date);
                    $dateArr[] = $dt->format('F');
                }
                $queryArr[] = $single->queries;
            }
            $queryVisitData = [
                $dateArr,
                $queryArr
            ];

            return $queryVisitData;
        }


        public function search()
        {
            $queries = Queries::latest()->limit(5)->get();
            $courses = Courses::all();

            return view('pages.queries.search')->with('queries', $queries)->with('courses', $courses);
        }

        public function info(Request $request)
        {
            $info      = $request->json()->all();
            $queryInfo = $info['id'];
            $query     = Queries::find($queryInfo);

            return json_encode($query->courses);

        }

        public function delete($id)
        {
            echo $id;
            $query = Queries::findOrFail($id);
            if($query->delete()) {
                return "Query Deleted";
            }
        }

        public function options(Request $request)
        {
            $options   = $request->json()->all();
            $queryType = $options['interactionType'];
            $startDate = $options['startDate'];
            $endDate   = $options['endDate'];
            $queries   = DB::table('Queries')->where('q_name', 'LIKE', '%' . $options['searchBox'] . '%');
//            ->orWhere('q_email', 'LIKE', "%{$searchTerm}%")

            if($queryType) {
                $queries->whereIn('q_interaction_type', $queryType);
            }
            if($startDate && $endDate) {
                $queries->whereBetween('created_at', [
                    $startDate,
                    $endDate
                ]);
            }
            $queries = $queries->get();


            return json_encode($queries);

        }

        public function create()
        {
            $courses = Courses::latest()->get();

            return view('pages/queries/quickQuery')->with('courses', $courses);
        }

        public function save(Request $request)
        {

            $info         = $request->json()->all();
            $sms          = $info['sms'];
            $mail         = $info['mail'];
            $queryData    = $info['queryInfo'];
            $queryCourses = $info['queryInfo']['courses'];

            $courses = array();
            foreach($queryCourses as $course) {
                $courses[] = ["course_id" => $course['id']];
            }


            $query                      = new Queries;
            $query->q_name              = $queryData['name'];
            $query->q_contact           = str_replace("-", "", $queryData['phone']);
            $query->q_email             = $queryData['email'];
            $query->q_address           = $queryData['address'];
            $query->q_preferred_timings = $queryData['preferredTimings'];
            $query->q_session_type      = $queryData['sessionType'];
            $query->q_interaction_type  = $queryData['queryRecievedAs'];
            $query->q_dealt_by          = $queryData['q_dealt_by'];
            $query->q_is_converted      = $queryData['q_is_converted'];
            $query->q_remarks           = $queryData['comments'];

            if($query->save()) {

                $query->courses()->attach($courses);

                if($sms) {
                    $sms = new SMS;
                    $message
                         = 'Thank you ' . $query->q_name . ' for your Interest in ACE Institute. We hope to hear from you soon.
0333-5335792
0333-5335892
www.ace.org.pk
                              ';
                    $sms->singleSMS($query->q_contact, $message);
                }
                if($mail) {
                    Mail::to($query->q_email)->send(new NewQuery($query));
                }

                return json_encode('Query Saved.');
            } else {
                return json_encode('Some Error Occured');
            }

        }

        public function update(Request $request)
        {
            $query       = $request->input('query');
            $queryPerson = Queries::where('id', $query['dtRowId'])->first();

            $queryPerson->q_name              = $query['q_name'];
            $queryPerson->q_contact           = str_replace("-", "", $query['q_contact']);
            $queryPerson->q_email             = $query['q_email'];
            $queryPerson->q_address           = $query['q_address'];
            $queryPerson->q_preferred_timings = $query['q_preferred_timings'];
            $queryPerson->q_session_type      = $query['q_session_type'];
            $queryPerson->q_interaction_type  = $query['q_interaction_type'];
            $queryPerson->q_is_converted      = $query['q_is_converted'];
            $queryPerson->q_dealt_by          = $query['q_dealt_by'];

            $qcourses = $query['coursesId'];
            $courses  = array();
            foreach($qcourses as $course) {
                $courses[] = ["course_id" => $course['id']];
            }
            $queryPerson->save();
            $queryPerson->courses()->sync($courses);

            return json_encode('Updated Successfully');
        }
    }
