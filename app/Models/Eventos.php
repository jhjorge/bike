<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'locale', 'date', 'content', 'thumb', 'gallery',];
    protected $casts = [
        'gallery' => 'array',
        'content' => 'array'
    ];
}