<?php

/*namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // 🔹 Relation avec les employés
    public function employes()
    {
        return $this->hasMany(Employe::class, 'service_id', 'id');
    }

    // 🔹 Relation avec le département (si tu as une table 'departements')
    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id', 'id');
    }
}*/


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
        return $this->hasMany(Employe::class,'service_id', 'id');
    }
     public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
