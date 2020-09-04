<?php

namespace App\Http\Controllers\Tables\TableController;

use App\Http\Controllers\Tables\AdmissionTb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\Tables\app\Traits\Datatable;
use LaravelEnso\Tables\app\Traits\Excel;

class AdmissionsTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = AdmissionTb::class;
}
