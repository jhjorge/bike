<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Eventos::limit(9)->orderby('id', 'desc')->get();
        return view('app.eventos', ['eventos' => $eventos]);
    }
    public function show(Eventos $id)
    {
        return view('app.evento', ['evento' => $id]);
    }
}