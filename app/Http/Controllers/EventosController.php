<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventosRequest;
use App\Http\Requests\UpdateEventosRequest;
use App\Models\Eventos;
use Illuminate\Http\Request;


class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Eventos $evento)
    {
        $this->evento = $evento;
    }


    public function index(Request $request)
    {
        $eventos = array();

        if ($request->has('atributos_user')) {
            $atributos_user = $request->atributos_user;
            $eventos = $this->evento->with('user:id,' . $atributos_user);
        } else {
            $eventos = $this->evento->with('user');
        }
        if ($request->has('filtro')) {
            $filtros = explode(';', $request->filtro);
            foreach ($filtros as $key => $condicao) {
                $c = explode(':', $condicao);
                $eventos = $eventos->where($c[0], $c[1], $c[2]);
            }
        }
        if ($request->has('atributos')) {
            $atributos = $request->atributos;
            $eventos = $eventos->selectRaw($atributos)->get();
        } else {
            $eventos = $eventos->get();
        }
        //$eventos = $this->eventos->with('users')->get();
        return response()->json($eventos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreEventosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventosRequest $request)
    {
        $evento = $this->evento->create($request->all());
        return response()->json($evento, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = $this->evento->find($id);
        if ($evento === null) {
            return response()->json(['erro' => 'O recurso pesquisado não existe'], 404);
        }
        return response()->json($evento, 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateEventosRequest  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventosRequest $request, $id)
    {
        $evento = $this->evento->find($id);
        if ($evento === null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {

            $img = $request->file();
            $img->store('images/eventos', 'public');

            $evento->update($request->all());
            return response()->json($evento, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = $this->evento->find($id);
        if ($evento === null) {
            return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
        } else {
            $evento->delete();
            return response()->json(['msg' => 'A evento removido com sucesso!'], 200);
        }
    }
}