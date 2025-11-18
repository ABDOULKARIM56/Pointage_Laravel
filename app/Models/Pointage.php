<?php

/*namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    //
     public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pointage extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'date',
        'heure_arrivee',
        'heure_depart',
        'statut',
        'justification',
        'duree_travail'
    ];

    protected $casts = [
        'date' => 'date',
        'heure_arrivee' => 'datetime',
        'heure_depart' => 'datetime',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    // Calculer la durée de travail
    /*public function getDureeTravailAttribute()
    {
        if ($this->heure_arrivee && $this->heure_depart) {
            return $this->heure_arrivee->diff($this->heure_depart)->format('%H:%I');
        }
        return '00:00';
    }*/
    // Dans le modèle Pointage, supprimez l'accesseur getDureeTravailAttribute()
// et gardez seulement :

public function getDureeFormateeAttribute()
{
    if ($this->duree_travail > 0) {
        $heures = floor($this->duree_travail / 60);
        $minutes = $this->duree_travail % 60;
        return sprintf("%02dh%02d", $heures, $minutes);
    }
    return '00h00';
}

    // Vérifier si l'employé est en retard
    public function getEstEnRetardAttribute()
    {
        $heureLimite = \Carbon\Carbon::createFromTime(8, 30); // Exemple: 8h30
        return $this->heure_arrivee && $this->heure_arrivee->gt($heureLimite);
    }
}
