<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    function queries(){
        return $this->belongsToMany('App\Queries','course_query','course_id','query_id')->withTimestamps();
    }
}
