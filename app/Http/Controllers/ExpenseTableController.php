<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tables\ExpensesTb;
use LaravelEnso\Tables\app\Traits\Datatable;
use LaravelEnso\Tables\app\Traits\Excel;

class ExpenseTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = ExpensesTb::class;
}
