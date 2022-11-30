<?php

namespace App\Http\Controllers;

use App\Models\Contatos;
use App\Http\Requests\StoreContatosRequest;
use App\Http\Requests\UpdateContatosRequest;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Contatos $contatos)
    {
        $this->contato = $contatos;
    }

    public function index(Request $request)
    {
        $contatos = array();




        if ($request->has('filtro')) {
            $contatos = explode(';', $request->filtro);

            foreach ($contatos as $key => $condicao) {
                $c = explode(':', $condicao);
                $contatos = $this->post::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(10);
            }
        } elseif ($request->has('valor')) {
            $cont = $request->valor;
            $contatos =  Contatos::orderBy('id', 'desc')->paginate($cont);
        } else {
            $contatos = Contatos::orderBy('id', 'desc')->paginate(10);
        }

        return response()->json($contatos, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContatosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContatosRequest $request)
    {

        $contato = $this->contato->create([
            'tipo_cliente' => $request->tipo_cliente,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'documento' => $request->documento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'assunto' => $request->assunto,
        ]);
        return response()->json($contato, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = $this->contato->find($id);
        if ($contato === null) {
            return response()->json(['erro' => 'O recurso pesquisado não existe'], 404);
        }
        return response()->json($contato, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContatosRequest  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContatosRequest $request, $id)
    {
        $contato = $this->contato->find($id);
        if ($contato == null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {
            $contato->fill($request->all());
            $contato->save();
            return response()->json($contato, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { {
            $contato = $this->contato->find($id);
            if ($contato === null) {
                return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
            } else {

                $contato->delete();
                return response()->json(['msg' => 'O post removido com sucesso!'], 200);
            }
        }
    }
}
