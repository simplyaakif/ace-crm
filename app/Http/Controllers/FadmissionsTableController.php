<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Tables\FadmissionsTb;
use Illuminate\Http\Request;
use LaravelEnso\Tables\app\Traits\Datatable;
use LaravelEnso\Tables\app\Traits\Excel;

class FadmissionsTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = FadmissionsTb::class;
}
