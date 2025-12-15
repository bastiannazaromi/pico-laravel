<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GpsData extends Model
{
    protected $fillable = [
        'latitude',
        'longitude',
    ];
}
