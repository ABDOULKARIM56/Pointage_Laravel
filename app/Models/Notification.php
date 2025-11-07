<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;      

class Notification extends Model
{
    use HasFactory;
    //
    public function emploiNofifier() {
        return $this->hasMany(EmploiNotifier::class,'notification_id', 'id');
    }
}
