<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'tamanho', 'cor', 'content', 'descricao', 'observacao', 'thumb', 'gallery', 'categoria_id'
    ];
    protected $casts = [
        'gallery' => 'array'
    ];
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categorias');
    }
}