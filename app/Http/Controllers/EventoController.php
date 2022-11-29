<?php

namespace App\Http\Controllers;

use App\Models\Eventos;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Eventos::orderby('id', 'desc')->paginate(6);
        return view('app.eventos', ['eventos' => $eventos]);
    }
    public function show(Eventos $id,)

    {
        return view('app.evento', ['evento' => $id]);
    }
}