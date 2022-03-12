<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardio extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'duration',
        'distance',
        'date'
    ];

    protected $casts = [
        'date' => 'date'
    ];

}
