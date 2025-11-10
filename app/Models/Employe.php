<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employe extends Authenticatable
{
    //
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        // ajoute les autres champs nécessaires
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
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
    
     public function service()
    {
        return $this->belongsTo(Employe::class);
    }
    

}
