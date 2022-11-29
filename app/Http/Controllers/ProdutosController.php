<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Http\Requests\StoreProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct(Produtos $produtos)
    {
        $this->produto = $produtos;
    }


    public function index(Request $request)
    {
        $produtos = array();



        if ($request->has('filtro')) {
            $filtros = explode(';', $request->filtro);

            foreach ($filtros as $key => $condicao) {
                $c = explode(':', $condicao);
                $produtos = $this->produto::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(10);
            }
        } elseif ($request->has('valor')) {
            $cont = $request->valor;
            $produtos = Produtos::orderBy('id', 'desc')->paginate($cont);
        } else {
            $produtos = Produtos::orderBy('id', 'desc')->paginate(10);
        }


        return response()->json($produtos, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutosRequest $request)
    {
        $img = array();
        //return response()->json($request, 404);
        //$imageGallery_urn = "";
        $imageThumb = $request->file('thumb');
        $imageGallery = $request->file('gallery');
        $imagen_urn = $imageThumb->store('imagens', 'public');

        if ($request->file('gallery')) {
            foreach ($imageGallery as $file) {
                $img[] = $file->store('imagens/galeria');
            }
        }
        //dd($request, $img);



        $produto = $this->produto->create(([
            'title' => $request->title,
            'categoria_id' => $request->categoria_id,
            'tamanho' => $request->tamanho,
            'cor' => $request->cor,
            'observacao' => $request->observacao,
            'descricao' => $request->descricao,
            'content' => $request->content,
            'gallery' => $img,
            'thumb' => $imagen_urn,
        ]));

        return response()->json($produto, 201);
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
     * @param  \App\Http\Requests\UpdateProdutosRequest  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutosRequest $request, $id)
    {
        $produto = $this->produto->find($id);
        $imgInfo = $this->produto->find($id);
        if ($produto === null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {
            $produto->fill($request->all());


            if ($request->file('thumb')) {
                Storage::delete($imgInfo->thumb);
                $imagem = $request->file('thumb');
                $imagem_urn = $imagem->store('imagens', 'public');
                $produto->thumb = $imagem_urn;
            }

            if ($request->file('gallery')) {
                foreach ($imgInfo->gallery as $img) {
                    Storage::delete($img);
                }


                $imgList = array();

                $imagemGalleryUpdate = $request->file('gallery');
                foreach ($imagemGalleryUpdate as $file) {
                    $imgList[] = $file->store('imagens/galeria');
                }
                $produto->gallery = $imgList;
            }

            $produto->save();
            return response()->json($produto, 200);
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
            $produto = $this->produto->find($id);
            if ($produto === null) {
                return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
            } else {
                Storage::disk('public')->delete($produto->thumb);
                Storage::disk('public')->delete($produto->gallery);

                $produto->delete();
                return response()->json(['msg' => 'O post removido com sucesso!'], 200);
            }
        }
    }
}