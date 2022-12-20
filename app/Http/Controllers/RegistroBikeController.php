<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrosRequest;
use App\Models\Registros;
use Illuminate\Http\Request;

class RegistroBikeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct(Registros $registros)
    {
        $this->registro = $registros;
    }
    public function index()
    {
        return view('app.registre');
    }
    public function store(StoreRegistrosRequest $request)
    {

        $this->registro->create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'documento' => $request->documento,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
            'nascimento' => $request->nascimento,
            'modelo_bike' => $request->modelo_bike,
            'numero_serie' => $request->numero_serie,
            'nota_fiscal' => $request->nota_fiscal,
            'nome_revenda' => $request->nome_revenda,
            'data_compra' => $request->data_compra,
        ]);
        return redirect()->route('registroBike');
    }
}