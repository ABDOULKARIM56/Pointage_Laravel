<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //
    public function employe() {
        return $this->hasMany(Employe::class,'employe_id', 'id');
    }
}
