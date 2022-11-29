<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bikes extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'thumb',
        'gallery',
        'descricao',
        'quadro',
        'garfo',
        'movimentoDirecao',
        'guidao',
        'manopla',
        'freio',
        'aro',
        'cubo',
        'pneu',
        'pedivela',
        'corrente',
        'movimentoCentral',
        'rodaLivre',
        'cambioDianteiro',
        'cambioTraseiro',
        'manete',
        'selim',
        'canote',
        'abracadeira',
        'pedal',
        'peso',
        'observacao',


    ];
    protected $casts = [
        'gallery' => 'array'
    ];
}