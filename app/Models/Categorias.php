<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'descricao', 'thumb'];


    public function produtos()
    {
        return $this->hasMany('App\Models\Produtos');
    }
}