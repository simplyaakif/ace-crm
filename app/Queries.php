<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Queries extends Model
{

    protected $casts = ['q_is_converted' => 'boolean'];
//    public function getCreatedAtAttribute($value)
//    {
//        return Carbon::parse($value)->format('Y-m-d');
//    }
//    public function getDateFormat()
//    {
//        return 'Y-m-d H:i:s';
//    }
    public function courses(){
        return $this->belongsToMany('App\Courses','course_query','query_id','course_id')->withTimestamps();
    }
}
