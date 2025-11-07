<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tracablite extends Model
{
        use HasFactory;
    //

     public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
