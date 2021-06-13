<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'pdf_name',
        'pdf_file'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
