<?php

namespace App\Http\Controllers;

use App\Models\Suporte;
use App\Http\Requests\StoreSuporteRequest;
use App\Http\Requests\UpdateSuporteRequest;
use Illuminate\Http\Request;

class SuporteGarantiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Suporte $suportes)
    {
        $this->suporte = $suportes;
    }
    public function index(Request $request)
    {
        $suportes = array();




        if ($request->has('filtro')) {
            $suportes = explode(';', $request->filtro);

            foreach ($suportes as $key => $condicao) {
                $c = explode(':', $condicao);
                $suportes = $this->post::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(10);
            }
        } elseif ($request->has('valor')) {
            $cont = $request->valor;
            $suportes =  Suporte::orderBy('id', 'desc')->paginate($cont);
        } else {
            $suportes = Suporte::orderBy('id', 'desc')->paginate(10);
        }

        return response()->json($suportes, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuporteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuporteRequest $request)
    {

        $suporte = $this->suporte->create([
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
        return response()->json($suporte, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suporte = $this->suporte->find($id);
        if ($suporte === null) {
            return response()->json(['erro' => 'O recurso pesquisado não existe'], 404);
        }
        return response()->json($suporte, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuporteRequest  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuporteRequest $request, $id)
    {
        $suporte = $this->suporte->find($id);
        if ($suporte == null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {
            $suporte->fill($request->all());

            $suporte->save();
            return response()->json($suporte, 200);
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
            $suporte = $this->suporte->find($id);
            if ($suporte === null) {
                return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
            } else {

                $suporte->delete();
                return response()->json(['msg' => 'O registro foi removido com sucesso!'], 200);
            }
        }
    }
}