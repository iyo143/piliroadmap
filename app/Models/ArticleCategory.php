<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
      'category_name' => 'required'
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }

}
