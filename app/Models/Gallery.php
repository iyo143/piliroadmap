<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_name',
        'image_file',
        'gallery_category_id',
        'user_id'
    ];

    public function gallery_category(){
        return $this->belongsTo(GalleryCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
