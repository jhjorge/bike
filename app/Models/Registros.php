<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'telefone', 'documento', 'rua', 'bairro', 'numero', 'cidade', 'estado', 'cep', 'nascimento', 'modelo_bike', 'numero_serie', 'nota_fiscal', 'nome_revenda', 'data_compra'];
}