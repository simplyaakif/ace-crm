<?php


    namespace App\Http\Controllers\Tables;


    use App\Queries;
    use LaravelEnso\Tables\app\Services\Table;

    class QueryTb extends Table {


        protected $templatePath = __DIR__ . '/../Tables/Template/queryTable.json';

        public function query()
        {
            $params = $this->request()->get('params');

            return Queries::selectRaw('
            queries.id as "dtRowId", q_name,q_contact,q_email,q_address,queries.created_at,queries.updated_at,q_session_type,q_interaction_type,q_preferred_timings,q_dealt_by,c_title,q_is_converted,q_remarks,courses.id as "coursesId"
        ')->join('course_query', 'queries.id', '=', 'course_query.query_id')->join('courses', 'courses.id', '=', 'course_id');
        }
    }
