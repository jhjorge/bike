<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContatosRequest;
use App\Models\Contatos;

class ContatoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct(Contatos $contatos)
    {
        $this->contato = $contatos;
    }
    public function index()
    {
        return view('app.contato');
    }
    public function store(StoreContatosRequest $request)
    {

        $this->contato->create([
            'tipo_cliente' => $request->tipo_cliente,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'documento' => $request->documento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'assunto' => $request->assunto,
        ]);
        return redirect()->route('contato');
    }
}