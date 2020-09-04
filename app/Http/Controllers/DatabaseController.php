<?php

    namespace App\Http\Controllers;

    use App\AdmissionBatch;
    use App\Admissions;
    use App\Courses;
    use App\Features\SMS;
    use App\Mail\ReportsMail;
    use App\Queries;
    use GrammarBot\GrammarBot;
    use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Mail;
    use Spatie\Permission\Models\Role;

    class DatabaseController extends Controller {

        public function index()
        {

            $students
                = DB::table('students')->join('classes', 'students.classId', '=', 'classes.id')->orderBy('students.stdAdmissionDate')->get();

//            dd($students);

            $currentNumber = 0;
            foreach($students as $student) {

//                $firstadm = Admissions::latest()->first();


                $now = Carbon::parse($student->stdAdmissionDate);

                echo $currentNumber;
                $currentNumber = $currentNumber + 1;
                $reg_number
                               = substr($now->year, -2) . sprintf("%02d", $now->month) . sprintf("%04d", $currentNumber);

//            dd($reg_number);

                $admission                = new Admissions;
                $admission->a_name        = $student->stdName;
                $admission->a_reg_id      = $reg_number;
                $admission->a_father_name = $student->stdFatherName;
//                $admission->a_gender         = $admissionInfo['gender'];
//                $admission->a_nationality    = $admissionInfo['nationality'];
//                $admission->a_place_of_birth = $admissionInfo['place_of_birth'];
//                $admission->a_first_language = $admissionInfo['first_language'];
                $admission->a_dob = $student->stdDob;
//                $admission->a_cnic           = $admissionInfo['cnic'];
                $admission->a_mobile = $student->stdCellNo;
                if(strpos($student->stdAddress, '@') !== false) {
                    $admission->a_email = $student->stdAddress;
                } else {
                    $admission->a_address = $student->stdAddress;
                }
                $admission->created_at = $now;

                $admission->save();


                $admbatch                     = new AdmissionBatch;
                $admbatch->admission_id       = $admission->id;
                $admbatch->batch_id           = $student->classId;
                $admbatch->session_start_date = $student->stdAdmissionDate;
                $admbatch->session_end_date   = Carbon::parse($student->stdAdmissionDate)->addMonth(3);
                $admbatch->created_at         = $now;
                $admbatch->save();

            }

        }

        public function send()
        {
            $sms = new SMS();
            $sms->singleSMS('03320913427', 'Test Message');
        }

        public function testMail()
        {
            $queries    = Queries::all();
            $admissions = Admissions::all();
//            var_dump($queries);

            Mail::to('simply.aakif@gmail.com')->queue(new ReportsMail($queries, $admissions));
            logger('Schedule Mail sent 58');
        }

        public function bulkSms()
        {
            $queries = Queries::all();
            foreach($queries as $query) {
                $msg = 'Dear ' . $query->q_name . '
Last Date of Registration for Spoken English is 7 September.
Kindly make sure to reserve your seat before that.
03335335792
03335335892';
                $sms = new SMS();
                $sms->singleSMS($query->q_contact, $msg);
                echo $query->q_name;
            }
//            dd($queries);
        }

        public function totalSale()
        {
            $monthSale
                = DB::table('recoveries')->where('paid_status', '=', '1')->whereBetween('paidOn', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])->sum('instAmount');

            echo $monthSale;
        }

        public function createRole()
        {
            $role = Role::create(['name' => 'admin']);
            $role = Role::create(['name' => 'instructor']);
            $role = Role::create(['name' => 'frontdeskofficer']);
//            $permission = Permission::create(['name' => 'edit articles']);
        }

        public function datatable()
        {
            $queries = Queries::all();
//            var_dump($queries);
//            dd($queries);
            $courses = Courses::all();

            return view('testing.datatable')->with('courses', $courses);
        }

        public function courses()
        {
            return Courses::all();

        }

        public function writing()
        {
            return view('testing.writing');
        }

        public function api(Request $request)
        {
            $text = $request->body;
            $response
                  = \Unirest\Request::post("https://ipeirotis-readability-metrics.p.rapidapi.com/getReadabilityMetrics?text='.$text.'", array(
                                                                                                                                          "X-RapidAPI-Host" => "ipeirotis-readability-metrics.p.rapidapi.com",
                                                                                                                                          "X-RapidAPI-Key"  => "mVWvBazqi8msh7ByreBrhEiibxe8p1KkXbpjsnG0ZTwlnykwnU",
                                                                                                                                          "Content-Type"    => "application/x-www-form-urlencoded"
                                                                                                                                      ));
//                dd( $response);
            $base_uri = 'http://api.grammarbot.io/v2';
            $endpoint = '/check';
            $lang = 'en-US';
            $api_key = 'KS9C5N3Y';
//            $text = 'A quick brown fox jump over the lazzy dog';
//Usage # 2 is overriding using constructor
            $grammarbot = new GrammarBot($base_uri, $endpoint, $api_key, $lang);
//call the api
            $json = $grammarbot->check($text);
            $matches = $json->matches;

//            foreach($matches as $match) {
//                echo $match->message . "<br>";
//                echo $match->offset . "<br>";
//                echo $match->length . "<br>";
//                echo $match->context->text . "<br>";
//                echo $match->rule->id . "<br>";
//                echo $match->rule->description . "<br>";
//                echo $match->rule->issueType . "<br>";
//                echo $match->rule->category->id . "<br>";
//                echo $match->rule->category->name . "<br>";
//            }
            $results = [$json,$response];

            return json_encode($results);
        }

    }
