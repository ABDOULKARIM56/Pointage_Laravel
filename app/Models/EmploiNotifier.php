<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploiNotifier extends Model
{
    //
     public function notification()
    {
        return $this->belongsTo(Notification::class);
    }

    // Relation vers l'employé (chaque emploiPermission appartient à un employé)
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
