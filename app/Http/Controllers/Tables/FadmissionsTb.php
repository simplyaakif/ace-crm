<?php


    namespace App\Http\Controllers\Tables;


    use App\expense;
    use App\Recovery;
    use LaravelEnso\Tables\app\Services\Table;

    class FadmissionsTb extends Table {


        protected $templatePath = __DIR__ . '/../Tables/Template/fadmissionsTable.json';

        public function query()
        {
            $params = $this->request()->get('params');

            return Recovery::selectRaw('recoveries.id as "dtRowId", instAmount,paidOn,paid_status,batch_admission.completion_status,recoveries.created_at,registered_batch_id,admissions.a_name,admissions.id,batches.b_name,batches.b_timings,admissions.a_mobile,c_title')->join('batch_admission', 'recoveries.registered_batch_id', '=', 'batch_admission.id')->join('admissions', 'admissions.id', '=', 'batch_admission.admission_id')->join('batches', 'batches.id', '=', 'batch_admission.batch_id')
                ->join('courses', 'courses.id', '=', 'course_id')
                ->where('recoveries.paid_status', '=', '1');
        }
    }