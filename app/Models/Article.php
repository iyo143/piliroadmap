<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'excerpt',
        'cover_image',
        'body',
        'article_category_id'
    ];

    public function article_category(){
        return $this->belongsTo(ArticleCategory::class);
    }
}
