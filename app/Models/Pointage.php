<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    //
     public function pointage()
    {
        return $this->belongsTo(Pointage::class);
    }
}
