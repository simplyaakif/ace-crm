<?php


    namespace App\Http\Controllers\Tables;


    use App\Admissions;
    use LaravelEnso\Tables\app\Services\Table;

    class AdmissionTb extends Table {

        protected $templatePath = __DIR__ . '/../Tables/Template/admissionsTable.json';

        public function query()
        {
//            $params = $this->request()->get('params');

            return Admissions::selectRaw('
            admissions.id as "dtRowId",a_name,a_reg_id,a_mobile,a_email,a_address,admissions.created_at,c_title,courses.id,batches.b_name,b_timings,batch_admission.completion_status
        ')->join('batch_admission', 'admissions.id', '=', 'batch_admission.admission_id')->join('batches', 'batches.id', '=', 'batch_admission.batch_id')->join('courses', 'courses.id', '=', 'course_id');
        }
    }