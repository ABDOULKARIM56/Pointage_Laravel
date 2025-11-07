<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploiConge extends Model
{
    //
        public function conge()
    {
        return $this->belongsTo(Conge::class);
    }
        public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

}
