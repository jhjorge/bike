<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuporteRequest;
use App\Models\Suporte;

class SuporteController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct(Suporte $suportes)
    {
        $this->suporte = $suportes;
    }
    public function index()
    {
        return view('app.suporte');
    }
    public function store(StoreSuporteRequest $request)
    {

        $this->suporte->create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'modelo_bike' => $request->modelo_bike,
            'numero_serie' => $request->numero_serie,
            'nota_fiscal' => $request->nota_fiscal,
            'nome_revenda' => $request->nome_revenda,
            'data_compra' => $request->data_compra,
            'assunto' => $request->assunto,
        ]);
        $msg = true;

        return redirect()->route('suporte', ['msg' => $msg]);
    }
}