<?php

/*namespace App\Models;

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
        'matricule',
        'email',
        'nationalite',
        'genre',
        'etat_civil',
        'numero',
        'adresse',
        'service_id',
        'role',
        'date_naissance',
        'password',
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
    
     /*public function service()
    {
        return $this->belongsTo(Employe::class);
    }*/
    /*public function service()
    {
        return $this->belongsTo(Service::class);
    }
    

}*/



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employe extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'matricule',
        'email',
        'nationalite',
        'genre',
        'etat_civil',
        'numero',
        'adresse',
        'service_id',
        'role',
        'date_naissance',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relation avec les permissions d'emploi
     */
    public function emploiPermissions()
    {
        return $this->hasMany(EmploiPermission::class, 'employe_id', 'id');
    }

    /**
     * Relation avec les notifications
     */
    public function emploiNotifiers()
    {
        return $this->hasMany(EmploiNotifier::class, 'employe_id', 'id');
    }

    /**
     * Relation avec les congés
     */
    public function emploiConges()
    {
        return $this->hasMany(EmploiConge::class, 'employe_id', 'id');
    }

    /**
     * Relation avec la traçabilité
     */
    public function tracabilites()
    {
        return $this->hasMany(Tracablite::class, 'employe_id', 'id');
    }

    /**
     * Relation avec les pointages
     */
    public function pointages()
    {
        return $this->hasMany(Pointage::class, 'employe_id', 'id');
    }

    /**
     * Relation avec le service (CORRIGÉ)
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    /**
     * Accessor pour obtenir le nom complet
     */
    public function getNomCompletAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }

    /**
     * Accessor pour formater la date de naissance
     */
    public function getDateNaissanceFormateeAttribute()
    {
        return $this->date_naissance ? $this->date_naissance->format('d/m/Y') : '';
    }

    /**
     * Scope pour filtrer par service
     */
    public function scopeByService($query, $serviceId)
    {
        return $query->where('service_id', $serviceId);
    }

    /**
     * Scope pour rechercher par nom, prénom ou matricule
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('nom', 'like', "%{$search}%")
              ->orWhere('prenom', 'like', "%{$search}%")
              ->orWhere('matricule', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    /**
     * Scope pour filtrer par rôle
     */
    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }
    // Dans App\Models\Employe

/**
 * Obtenir les pointages du mois courant
 */
public function pointagesDuMois()
{
    return $this->pointages()
        ->whereYear('date', now()->year)
        ->whereMonth('date', now()->month)
        ->orderBy('date', 'desc');
}

/**
 * Calculer le taux de présence du mois
 */
public function getTauxPresenceMoisAttribute()
{
    $pointagesMois = $this->pointagesDuMois()->get();
    $totalJours = $pointagesMois->count();
    
    if ($totalJours === 0) return 0;
    
    $presents = $pointagesMois->where('statut', 'présent')->count();
    
    return round(($presents / $totalJours) * 100, 2);
}

/**
 * Vérifier si l'employé a pointé aujourd'hui
 */
public function aPointeAujourdhui()
{
    return $this->pointages()
        ->where('date', today())
        ->exists();
}

/**
 * Obtenir le pointage d'aujourd'hui
 */
public function pointageAujourdhui()
{
    return $this->pointages()
        ->where('date', today())
        ->first();
}
}
