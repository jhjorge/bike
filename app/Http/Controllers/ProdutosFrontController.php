<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosFrontController extends Controller
{
    public function __construct(Produtos $produtos)
    {
        $this->produto = $produtos;
    }

    public function acessorios(Request $request)
    {



        $produtos = $this->produto::where('categoria_id', 1)->orderby('id', 'desc')->paginate(10);


        return view('products.acessorios', ['produtos' => $produtos]);
    }

    public function componentes(Request $request)
    {



        $produtos = $this->produto::where('categoria_id', 2)->orderby('id', 'desc')->paginate(10);


        return view('products.componentes', ['produtos' => $produtos]);
    }
    public function vestuario(Request $request)
    {



        $produtos = $this->produto::where('categoria_id', 3)->orderby('id', 'desc')->paginate(10);


        return view('products.vestuario', ['produtos' => $produtos]);
    }
    public function showAcessorio(Produtos $id)
    {

        return view('products.acessorioInterno', ['produto' => $id]);
    }
}