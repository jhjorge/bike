<?php

namespace App\Http\Controllers;

use App\Models\Bikes;
use App\Models\Produtos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Produtos $produtos, Bikes $bikes)
    {
        // $this->middleware('auth');
        $this->bikes = $bikes;
        $this->produtos = $produtos;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $produtos = array();

        if ($request->has('Bikes')) {
            $produtos = $this->bikes::inRandomOrder()->paginate(6);


            return view('app.home', ['produtos' => $produtos, 'request' => $request]);
        } elseif ($request->has('Acessorios')) {

            $produtos = $this->produtos::where('categoria_id', 1)->orderby('id', 'desc')->paginate(6);

            return view('app.home', ['produtos' => $produtos, 'request' => $request]);
        } elseif ($request->has('Componentes')) {

            $produtos = $this->produtos::where('categoria_id', 2)->orderby('id', 'desc')->paginate(6);

            return view('app.home', ['produtos' => $produtos, 'request' => $request]);
        } elseif ($request->has('Vestuarios')) {

            $produtos = $this->produtos::where('categoria_id', 3)->orderby('id', 'desc')->paginate(6);

            return view('app.home', ['produtos' => $produtos, 'request' => $request]);
        }
        $produtos = $this->bikes::inRandomOrder()->paginate(6);
        return view('app.home', ['produtos' => $produtos, 'request' => $request]);
    }
}