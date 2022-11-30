<?php

namespace App\Http\Controllers;

use App\Models\Registros;
use App\Http\Requests\StoreRegistrosRequest;
use App\Http\Requests\UpdateRegistrosRequest;
use Illuminate\Http\Request;


class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Registros $registros)
    {
        $this->registro = $registros;
    }
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistrosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrosRequest $request)
    {

        $registro = $this->registro->create([
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
        return response()->json($registro, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registro = $this->registro->find($id);
        if ($registro === null) {
            return response()->json(['erro' => 'O recurso pesquisado não existe'], 404);
        }
        return response()->json($registro, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistrosRequest  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrosRequest $request, $id)
    {
        $registro = $this->registro->find($id);
        if ($registro == null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {
            $registro->fill($request->all());

            $registro->save();
            return response()->json($registro, 200);
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
            $registro = $this->registro->find($id);
            if ($registro === null) {
                return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
            } else {

                $registro->delete();
                return response()->json(['msg' => 'O post removido com sucesso!'], 200);
            }
        }
    }
}