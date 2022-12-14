<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(Request $request)
    {
        $posts = array();




        if ($request->has('filtro')) {
            $posts = explode(';', $request->filtro);

            foreach ($posts as $key => $condicao) {
                $c = explode(':', $condicao);
                $posts = $this->post::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(10);
            }
        } elseif ($request->has('valor')) {
            $cont = $request->valor;
            $posts = Post::orderBy('id', 'desc')->paginate($cont);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }

        return response()->json($posts, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $image = $request->file('thumb');
        $imagen_urn = $image->store('imagens', 'public');

        $post = $this->post->create([
            'title' => $request->title,
            'content' => $request->content,
            'thumb' => $imagen_urn,
        ]);
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->find($id);
        if ($post === null) {
            return response()->json(['erro' => 'O recurso pesquisado não existe'], 404);
        }
        return response()->json($post, 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->post->find($id);
        $data = $this->post->find($id);
        if ($post == null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {
            $post->fill($request->all());
            if ($request->file('thumb')) {
                Storage::delete($data->thumb);


                $imagem = $request->file('thumb');
                $imagem_urn = $imagem->store('imagens', 'public');
                $post->thumb = $imagem_urn;
            }

            $post->save();
            return response()->json($post, 200);
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
            $post = $this->post->find($id);
            if ($post === null) {
                return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
            } else {
                Storage::delete($post->thumb);

                $post->delete();
                return response()->json(['msg' => 'O post removido com sucesso!'], 200);
            }
        }
    }
}