<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_name',
        'store_owner',
        'store_image',
        'fb_link',
        'ig_link',
        'twit_link',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
