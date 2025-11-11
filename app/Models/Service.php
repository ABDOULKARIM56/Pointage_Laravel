<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nom',
        'departement_id',
        // ajoute les autres champs nécessaires
    ];
    //
      public function employe() {
        return $this->hasMany(employe::class,'service_id', 'id');
    }
     public function departement()
    {
        return $this->belongsTo(Employe::class);
    }
}
