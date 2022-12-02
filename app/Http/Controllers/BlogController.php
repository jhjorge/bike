<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = array();



        if ($request->has('filtro')) {
            $filtros = explode(';', $request->filtro);

            foreach ($filtros as $key => $condicao) {
                $c = explode(':', $condicao);
                $posts = $this->evento::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(10);
            }
        } elseif ($request->has('valor')) {
            $cont = $request->valor;
            $posts = Post::orderBy('id', 'desc')->paginate($cont);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }


        return view('app.blog', ['posts' => $posts]);
    }
    public function post(Post $id)
    {

        return view('posts.post', ['post' => $id]);
    }
}