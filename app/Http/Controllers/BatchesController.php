<?php

    namespace App\Http\Controllers;

    use App\AdmissionBatch;
    use App\Batches;
    use App\Courses;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use LaravelEnso\Select\app\Traits\OptionsBuilder;

    class BatchesController extends Controller {
        use OptionsBuilder;

        protected $queryAttributes = ['b_name'];
        protected $model = Batches::class;
        public function index()
        {
            $batches = Batches::all();
            $courses = Courses::all();

            return view('pages/academics/batches')->with('batches', $batches)->with('courses', $courses);
        }

        public function create()
        {

        }

        public function show(Batches $batches)
        {

            $batch = Batches::findOrFail($batches->id);
            return json_encode($batch);
        }

        public function loadMonthlyStudents(Request $request)
        {
            $batchInfo    = $request->json()->all();
            $currentMonth = date('m');
            $batStudents
                          = DB::table('batch_admission')->where('batch_admission.batch_id', '=', $batchInfo['id'])
                ->whereRaw('MONTH(batch_admission.created_at) = ?', [$currentMonth])
                ->join('admissions', 'batch_admission.admission_id', '=', 'admissions.id')
                ->join('batches', 'batch_admission.batch_id', '=', 'batches.id')
                ->orderBy('batch_admission.session_start_date','desc')
                ->get();

            return $batStudents;
        }

        public function store(Request $request)
        {
            $info                   = $request->json()->all();
            $batch                  = $request->isMethod('put') ? Courses::findOrFail($request->id) : new Batches;
            $batch->id              = $info['id'];
            $batch->b_name          = $info['name'];
            $batch->b_timings       = $info['class_time'];
            $batch->b_startDate     = date('Y-m-d', strtotime($info['startDate']));
            $batch->b_endDate       = date('Y-m-d', strtotime($info['endDate']));
            $batch->course_id       = $info['course']['id'];
            $batch->b_strength      = $info['strength'];
            $batch->b_class_days    = json_encode($info['days']);
            $batch->b_session_type  = $info['session_type'];
            $batch->b_learning_type = '';
            $batch->b_description   = $info['comments'];
            $batch->instructor_id   = $info['instructor_name'];

            if($batch->save()) {
                return $batch;
            }
        }

        public function batchNotification()
        {
//       shorturl.at/lIKNQ
            $ielts
                = DB::table('batch_admission')->where('batch_id', '=', '8')->join('admissions', 'batch_admission.admission_id', '=', 'admissions.id')->get();

            $username = 'aceinstitute';
            $password = 'worldwar3';
//            $to       = $query->q_contact;
            $from     = 'ACE';
            $message
                      = 'Dear student. Your todays session has been postponed due to the unavailability of instructor. We will arrange makeup session very soon.';

            foreach($ielts as $ielt) {
                $url
                    = "http://Lifetimesms.com/plain?username=" . $username . "&password=" . $password . "&to=" .
                    $ielt->a_mobile . "&from=" . urlencode($from) . "&message=" . urlencode($message) . "";
                //Curl Start
                $ch      = curl_init();
                $timeout = 30;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $response = curl_exec($ch);
                curl_close($ch);

            }

//       dd($ielts);
        }
    }
