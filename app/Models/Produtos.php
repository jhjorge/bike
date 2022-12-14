<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'tamanho',  'cor',  'descricao',  'thumb', 'gallery', 'categoria_id', 'titulo_descricao'
    ];
    protected $casts = [
        'gallery' => 'array',
        'descricao' => 'array',
        'tamanho' => 'array',
        'cor' => 'array',
        'titulo_descricao' => 'array'
    ];


    public function categoria()
    {
        return $this->belongsTo('App\Models\Categorias');
    }
}