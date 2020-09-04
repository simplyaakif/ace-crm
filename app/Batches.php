<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batches extends Model
{
    public function course(){
        return $this->belongsTo('App\Courses');
    }

    public function admissions(){
    return $this->belongsToMany('App\Admissions','batch_admission','batch_id','admission_id')->withTimestamps();
    }

//    public function fee(){
//        return $this->hasMany('App\Recovery','recoveries','registered_batches_id');
//    }

    public function fee( $id){
        $fee = Recovery::where('registered_batch_id','=',$id)
                        ->get();

        return $fee;
    }


}
