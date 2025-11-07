<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    //
    use HasFactory;
    public function emploiPermission() {
        return $this->hasMany(EmploiPermission::class,'employe_id', 'id');
    }
    public function emploiNofifier() {
        return $this->hasMany(EmploiNotifier::class,'employe_id', 'id');
    }
    public function emploiConge() {
        return $this->hasMany(EmploiConge::class,'employe_id', 'id');
    }
    public function tracablite() {
        return $this->hasMany(Tracablite::class,'employe_id', 'id');
    }
      public function pointage() {
        return $this->hasMany(pointage::class,'employe_id', 'id');
    }
     public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    

}
