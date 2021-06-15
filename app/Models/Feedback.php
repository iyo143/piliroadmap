<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact',
        'country',
        'province',
        'subject',
        'feedback',
        'department',
        'department_name'
    ];
}
