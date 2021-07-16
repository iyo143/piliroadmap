<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable =[
        'agency_name',
        'agency_logo',
        'user_id',
        'agency_link'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
