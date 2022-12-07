<?php

namespace App\Http\Controllers;

use App\Models\Bikes;
use Illuminate\Http\Request;

class BikesFrontController extends Controller
{

    public function __construct(Bikes $bikes)
    {
        $this->bike = $bikes;
    }

    public function index(Request $request)
    {
        $bikes = array();




        if ($request->has('filtro')) {
            $bikes = explode(';', $request->filtro);

            foreach ($bikes as $key => $condicao) {
                $c = explode(':', $condicao);
                $bikes = $this->post::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(8);
            }
        } elseif ($request->has('valor')) {
            $cont = $request->valor;
            $bikes =  Bikes::orderBy('id', 'desc')->paginate($cont);
        } else {
            $bikes = Bikes::orderBy('id', 'desc')->paginate(8);
        }

        return view('products.bike', ['bikes' => $bikes]);
    }
    public function show(Bikes $id)
    {

        return view('products.bikeInterno', ['bike' => $id]);
    }
}