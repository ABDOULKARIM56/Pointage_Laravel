<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    protected $fillable = [
        'type',
    ];
    //
     use HasFactory;
    public function emploiPermission() {
        return $this->hasMany(EmploiPermission::class,'permission_id', 'id');
    }
}
