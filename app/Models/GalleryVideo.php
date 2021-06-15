<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_name',
        'video_link',
        'video_image',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
