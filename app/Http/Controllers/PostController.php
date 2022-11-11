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

        $post = Post::limit(9)->orderby('id', 'desc')->get();

        return response()->json($post, 200);
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
            'slug' => $request->slug,
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
        if ($post === null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {

            if ($request->file('thumb')) {
                Storage::disk('public')->delete($post->thumb);
            }
            $image = $request->file('thumb');
            $imagen_urn = $image->store('imagens', 'public');

            $post->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'thumb' => $imagen_urn,

            ]);
            return response()->json($post, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,)
    { {
            $post = $this->post->find($id);
            if ($post === null) {
                return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
            } else {
                Storage::disk('public')->delete($post->thumb);

                $post->delete();
                return response()->json(['msg' => 'A post removido com sucesso!'], 200);
            }
        }
    }
}