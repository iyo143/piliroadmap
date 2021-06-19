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
        'respondents',
        'processors',
        'latitude',
        'longitude',
        'pili_image',
        'user_id',
        'brgy_value',
        'municipality_value',
        'data_collector',
        'daily_per_40_days'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
