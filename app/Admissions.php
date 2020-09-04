<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admissions extends Model
{
//    public function getDateFormat()
//    {
//        return 'Y-m-d H:i:s';
//    }
    public function batches(){
        return $this->belongsToMany('App\Batches','batch_admission','admission_id','batch_id')->withPivot('session_start_date', 'session_end_date','completion_status','id')->withTimestamps();
    }

    public function messages()
    {
        return $this->morphMany('App\Message', 'messageable');
    }
}
