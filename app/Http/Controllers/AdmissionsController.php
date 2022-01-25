<?php

    namespace App\Http\Controllers;

    use App\AdmissionBatch;
    use App\Admissions;
    use App\Batches;
    use App\Course_Query;
    use App\Courses;
    use App\Guardian;
    use App\Message;
    use App\Recovery;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class AdmissionsController extends Controller {

        public function index()
        {
            $batches
                = DB::table('batches')->join('courses', 'batches.course_id', '=', 'courses.id')->select('batches.*', 'courses.c_fee')->get();

            return view('pages.admissions.create')->with('batches', $batches);
        }

        public function status()
        {

            $todayAdmissions  = Admissions::whereDate('created_at', Carbon::today())->count();
            $yesterAdmissions = Admissions::whereDate('created_at', Carbon::yesterday())->count();

            Carbon::setWeekStartsAt(Carbon::SUNDAY);
            $weekAdmissions
                = DB::table('admissions')->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();

            $currentMonth    = date('m');
//            $monthAdmissions = DB::table('admissions')->whereRaw('MONTH(created_at) = ?', [$currentMonth])->count();
            $monthAdmissions = DB::table('admissions')->whereRaw('MONTH(created_at) = ?', [$currentMonth])
                ->whereRaw('YEAR(created_at) = YEAR(CURRENT_DATE())')->count();
            $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
            $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();

            $lastMonth = DB::table('admissions')->whereBetween('created_at', [
                $fromDate,
                $tillDate
            ])->count();

            $recentAdmissions = Admissions::limit(10)->orderBy('id', 'desc')->get();

            $batchAdmissions
                = Batches::withCount([
                                         'admissions' => function ($query) use ($fromDate, $tillDate, $currentMonth) {
                                             $query->whereRaw('batch_admission.session_end_date > ?', [Carbon::today()]);
                                         }
                                     ])->orderBy('admissions_count', 'desc')->get();

//            $batchAdmissions
//                = DB::table('batches')->join('batch_admission', 'batches.id', '=', 'batch_admission.batch_id')->where('batch_admission.session_end_date', '>', Carbon::today())//                ->groupBy('batches.b_name')
////                ->select('batches.*','batch_admission.*')
//                ->get();

//            dd($batchAdmissions);

            $sessionsEnd
                = DB::table('batch_admission')->join('admissions', 'batch_admission.admission_id', '=', 'admissions.id')->join('batches', 'batch_admission.batch_id', '=', 'batches.id')->join('courses', 'batches.course_id', '=', 'courses.id')->where('completion_status','=','0')->whereBetween('batch_admission.session_end_date', [
                Carbon::today(),
                Carbon::now()->endOfMonth()->addMonth(1)
            ])->orderBy('batch_admission.session_end_date', 'asc')->select('batch_admission.session_end_date', 'batch_admission.session_start_date', 'admissions.a_name', 'batches.b_name', 'admissions.id as aid', 'courses.c_title', 'batches.b_timings')->limit(10)->get();


            return view('pages.admissions.admission_status')->with('todayAdmissions', $todayAdmissions)->with('yesterAdmissions', $yesterAdmissions)->with('weekAdmissions', $weekAdmissions)->with('monthAdmissions', $monthAdmissions)->with('recentAdmissions', $recentAdmissions)->with('batchAdmissions', $batchAdmissions)->with('sessionsEnd', $sessionsEnd)->with('lastMonth', $lastMonth);
        }

        public function create(Request $request)
        {
            $info           = $request->json()->all();
            $admissionInfo  = $info['admissionInfo'];
            $guardianInfo   = $info['guardianInfo'];
            $studentBatches = $info['studentBat'];
            $sms = $info['sms'];
//
            $firstadm = Admissions::latest()->first();

            if($firstadm === null) {
                $firstadm     = new Admissions;
                $firstadm->id = 1;
            }

            $now           = Carbon::now();
            $currentNumber = substr($firstadm->a_reg_id, -4) + 1;
            $reg_number    = substr($now->year, -2) . sprintf("%02d", $now->month) . sprintf("%04d", $currentNumber);

//            dd($reg_number);

            $admission                   = new Admissions;
            $admission->a_name           = $admissionInfo['name'];
            $admission->a_reg_id         = $reg_number;
            $admission->a_father_name    = $admissionInfo['father'];
            $admission->a_gender         = $admissionInfo['gender'];
            $admission->a_nationality    = $admissionInfo['nationality'];
            $admission->a_place_of_birth = $admissionInfo['place_of_birth'];
            $admission->a_first_language = $admissionInfo['first_language'];
            $admission->a_dob            = date('Y-m-d', strtotime($admissionInfo['dob']));
            $admission->a_cnic           = $admissionInfo['cnic'];
            $admission->a_mobile         = $admissionInfo['mobile'];
            $admission->a_email          = $admissionInfo['email'];
            $admission->a_phone          = $admissionInfo['phone'];
            $admission->a_address        = $admissionInfo['address'];

            $admission->save();

            if($guardianInfo['name']) {
                $guardian                               = new Guardian;
                $guardian->admission_id                 = $admission->id;
                $guardian->guard_name                   = $guardianInfo['name'];
                $guardian->guard_relation               = $guardianInfo['relation'];
                $guardian->guard_cnic                   = $guardianInfo['cnic'];
                $guardian->guard_occupation_type        = $guardianInfo['occupation_type'];
                $guardian->guard_occupation_designation = $guardianInfo['occupation_designation'];
                $guardian->guard_mobile                 = $guardianInfo['mobile'];
                $guardian->guard_email                  = $guardianInfo['email'];

                $guardian->save();
            }

            foreach($studentBatches as $batch) {
                $admbatch                     = new AdmissionBatch;
                $admbatch->admission_id       = $admission->id;
                $admbatch->batch_id           = $batch['bat_id'];
                $admbatch->session_start_date = $batch['start_date'];
                $admbatch->session_end_date   = $batch['end_date'];

                $admbatch->save();

                $inst = $batch['installmentrows'];

                foreach($inst as $single) {
                    $recovery                      = new Recovery;
                    $recovery->registered_batch_id = $admbatch->id;
                    $recovery->instAmount          = $single['instAmount'];
                    $recovery->dueDate             = $single['instDueDate'];
                    $recovery->paid_status         = $single['instFeeStatus'];
                    if($single['instFeeStatus'] == 1) {
                        $recovery->paidOn      = Carbon::today();
                        $recovery->slip_number = $single['slip'];
                    }
                    $recovery->save();
                }

                if($sms){
                    $message = 'Dear '. $admission->a_name .' You have been successfully registered at Ace American Institute.';
                    $params   = [
                        'to'      => $admission->a_mobile,
                        'from'    => 'ACE',
                        'message' => $message,
                        'unicode' => false,
                        'date'    => null,
                        'time'    => null
                    ];
                    $response = (new \Lifetimesms\Gateway\Lifetimesms)->singleSMS($params);

                    $msg                   = new Message;
                    $msg->m_mobile         = str_replace('-', '', $admission->a_mobile) ;
                    $msg->m_text           = $message;
                    $msg->messageable_type = 'App\Admissions';
                    $msg->messageable_id   = $admission->id;
                    $msg->m_status         = $response['status'];
                    $msg->m_message_id     = $response['message_id'];

                    $msg->save();
                }

//                $admission->batches()->attach($batch['bat_id'],[
//                    'session_start_date'=>$batch['start_date'],
//                    'session_end_date'=>$batch['end_date'],
//                ]);

            }

            return json_encode($admission);

        }

        public function loadStudent($id)
        {

//            $studentInfo
//                = DB::table('admissions')->where('admissions.id', '=', $id)->join('batch_admission', 'admissions.id', '=', 'batch_admission.admission_id')->join('batches', 'batch_admission.batch_id', '=', 'batches.id')->first();

            $studentInfo = Admissions::find($id);

//            dd($studentInfo->batches[0]->fee($));

            return view('pages.admissions.student', ['student' => $studentInfo]);
        }

        public function studentData(Request $request)
        {
            $info = $request->json()->all();
            $studentInfo
                  = DB::table('admissions')->where('admissions.id', '=', $info['id'])->join('batch_admission', 'admissions.id', '=', 'batch_admission.admission_id')->join('batches', 'batch_admission.batch_id', '=', 'batches.id')->first();

            return json_encode($studentInfo);
        }

        public function searchStudent()
        {
            $admissions = Admissions::limit(10)->orderBy('created_at', 'desc')->get();
            $batches    = Batches::all();
            $courses    = Courses::all();

            return view('pages.admissions.admission_search')->with('admissions', $admissions)->with('courses', $courses)->with('batches', $batches);
        }

        public function searchStudentData(Request $request)
        {
            $options         = $request->json()->all();
            $status          = $options['completionStatus'];
            $roll            = $options['roll'];
            $selectedBatches = $options['selectedBatches'];
            $startDate       = $options['startDate'];
            $endDate         = $options['endDate'];
            $admissions      = DB::table('Admissions')->where('a_name', 'LIKE', '%' . $options['searchBox'] . '%');
//            ->orWhere('a_email', 'LIKE', "%{$options['searchBox']}%");
            $join = false;

            if($selectedBatches) {
                $batchId = array();
                foreach($selectedBatches as $batch) {
                    $batchId[] = $batch['id'];
                }
                $admissions->join('batch_admission', 'admissions.id', '=', 'batch_admission.admission_id')->whereIn('batch_admission.batch_id', $batchId);
                $admissions->select('admissions.*');
                $join = true;
                if($status) {
                    $statusId = array();
                    foreach($status as $st) {
                        $statusId[] = $st['val'];
                    }
                    $admissions->whereIn('completion_status', $statusId);
                }
            }

            if($roll) {
                $admissions->where('a_reg_id', $roll);
            }
            if($startDate && $endDate) {
                if($join) {
                    $admissions->whereBetween('admissions.created_at', [
                        $startDate,
                        $endDate
                    ]);
                } else {
                    $admissions->whereBetween('created_at', [
                        $startDate,
                        $endDate
                    ]);
                }

            }
            $admissions->orderByDesc('a_reg_id');
            $admissions = $admissions->get();


            return json_encode($admissions);
        }

        public function batches()
        {
            $students
                = DB::table('batch_admission')->where('completion_status', '=', '0')->join('batches', 'batch_admission.batch_id', '=', 'batches.id')->join('admissions', 'batch_admission.admission_id', '=', 'admissions.id')->select('batch_admission.*', 'batches.id as bid', 'batches.b_name', 'batches.b_timings', 'admissions.id as aid', 'admissions.a_name', 'admissions.a_mobile', 'admissions.a_email', 'admissions.a_dp', 'admissions.a_reg_id')->get()->groupBy('bid');

//            dd($students);
            return view('pages.admissions.batches')->with('batches', $students);

        }

        public function deleteStudent($id)
        {
            $student = Admissions::find($id);
            $student->delete();

            return redirect()->route('home');
        }

        public function sessionDetails($student_id, $batch_id)
        {
            $studentId = $student_id;
            $sessionId = $batch_id;

            $sessionRecId
                        = DB::table('batch_admission')->where('batch_id', $sessionId)->where('admission_id', $student_id)->first();
            $recoveries = Recovery::where('registered_batch_id', $sessionRecId->id)->get();

            return $recoveries;
        }

        public function infoEdit($id){
            $student = Admissions::find($id);
            $studentBatches = $student->batches;
            return json_encode($student);
        }
        public function infoUpdate(Request $request){
            $admissionInfo = $request->input('student');
            $admission = Admissions::find($admissionInfo['id']);

            $admission->a_name           = $admissionInfo['a_name'];
//            $admission->a_reg_id         = $reg_number;
            $admission->a_father_name    = $admissionInfo['a_father_name'];
            $admission->a_gender         = $admissionInfo['a_gender'];
            $admission->a_nationality    = $admissionInfo['a_nationality'];
            $admission->a_place_of_birth = $admissionInfo['a_place_of_birth'];
            $admission->a_first_language = $admissionInfo['a_first_language'];
            $admission->a_dob            = date('Y-m-d', strtotime($admissionInfo['a_dob']));
            $admission->a_cnic           = $admissionInfo['a_cnic'];
            $admission->a_mobile         = $admissionInfo['a_mobile'];
            $admission->a_email          = $admissionInfo['a_email'];
            $admission->a_phone          = $admissionInfo['a_phone'];
            $admission->a_address        = $admissionInfo['a_address'];

            $admission->save();

            $batches = $admissionInfo['batches'];

            foreach($batches as $batch){
//                $bt = DB::table('batch_admission')->find($batch['id']);
                $bt = AdmissionBatch::find($batch['pivot']['id']);
                $bt->batch_id = (int)$batch['pivot']['batch_id'];
                $bt->completion_status = (int)$batch['pivot']['completion_status'];
                $bt->save();
//                dd ($bt);
            }

            return 'Updated Successfully. Kindly reload the page';
        }

        public function uploadDp( Request $request)
        {
            $student_id = $request->input('id');
            $student_dp = $request->input('url');

            $student = Admissions::findOrFail($student_id);
            $student->a_dp = $student_dp;
            $student->save();

            return 'Image added successfully.';
        }
    }


