<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $eventos = array();



        if ($request->has('filtro')) {
            $filtros = explode(';', $request->filtro);

            foreach ($filtros as $key => $condicao) {
                $c = explode(':', $condicao);
                $eventos = $this->evento::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(10);
            }
        } elseif ($request->has('valor')) {
            $cont = $request->valor;
            $eventos = Eventos::orderBy('id', 'desc')->paginate($cont);
        } else {
            $eventos = Eventos::orderBy('id', 'desc')->paginate(10);
        }


        return view('app.eventos', ['eventos' => $eventos]);
    }
    public function show(Eventos $id,)

    {
        return view('app.evento', ['evento' => $id]);
    }
}