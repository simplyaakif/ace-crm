<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function messageable()
    {
        return $this->morphTo();
    }
}
