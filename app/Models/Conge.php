<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
     protected $fillable = [
        'type',
    ];
    //
    public function emploiConge() {
        return $this->hasMany(EmploiConge::class,'conge_id', 'id');
    }
}
