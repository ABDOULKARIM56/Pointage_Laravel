<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmploiPermission extends Model
{
    use HasFactory;
    //
  // Relation vers la permission (chaque emploiPermission appartient à une permission)
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    // Relation vers l'employé (chaque emploiPermission appartient à un employé)
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
