<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonPlan extends Model
{
    //
    protected $guarded=[];
    protected $casts = [
        'date' => 'date',
    ];
}
