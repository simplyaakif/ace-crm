<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tables\QueryTb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\Tables\app\Traits\Datatable;
use LaravelEnso\Tables\app\Traits\Excel;

class QueryTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = QueryTb::class;
}
