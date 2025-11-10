<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    //
    public function service() {
        return $this->hasMany(Service::class,'departement_id', 'id');
    }
}
