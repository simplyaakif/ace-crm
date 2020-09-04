<?php


    namespace App\Http\Controllers\Tables;


    use App\expense;
    use LaravelEnso\Tables\app\Services\Table;

    class ExpensesTb extends Table {

        protected $templatePath = __DIR__ . '/../Tables/Template/expenseTable.json';

        public function query()
        {
            $params = $this->request()->get('params');

            return expense::selectRaw('expenses.id as "dtRowId",e_title, e_amount,e_cat,e_status_paid,created_at,e_receipt,e_paidOn');
        }
    }