<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'brgy',
        'municipality',
        'trees',
        'farmers',
        'retailers',
        'processors',
        'latitude',
        'longitude',
        'pili_image'
    ];
  
}
