<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionBatch extends Model
{
    protected $table = 'batch_admission';

    public function batch(){
        return $this->belongsTo('Batches');
    }
}


