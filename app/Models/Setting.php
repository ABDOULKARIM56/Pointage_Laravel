<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'start_time', 'break_time', 'resume_time', 'end_time',
        'workdays',
        'tolerance_minutes', 'sanction_after',
        'conditions', 'obligations', 'sanctions'
    ];

    protected $casts = [
        'workdays' => 'array',
    ];
}
