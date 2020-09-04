<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tables\RecoveryTb;
use Illuminate\Http\Request;
use LaravelEnso\Tables\app\Traits\Datatable;
use LaravelEnso\Tables\app\Traits\Excel;

class RecoveryTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = RecoveryTb::class;
}
