<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suporte extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'telefone',  'cidade', 'estado', 'modelo_bike', 'numero_serie', 'nota_fiscal', 'nome_revenda', 'data_compra', 'assunto'];
}