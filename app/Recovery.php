<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    protected $casts = ['paid_status' => 'boolean'];

    public function admission(){
        return $this->hasManyThrough('App\Admissions', 'App\AdmissionBatch');
    }
}
