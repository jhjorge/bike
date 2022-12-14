<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventosRequest;
use App\Http\Requests\UpdateEventosRequest;
use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Eventos $evento)
    {
        $this->evento = $evento;
    }


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


        return response()->json($eventos, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreEventosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventosRequest $request)

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



        $evento = $this->evento->create(([
            'title' => $request->title,
            'locale' => $request->locale,
            'date' => $request->date,
            'content' => $request->content,
            'gallery' => $img,
            'thumb' => $imagen_urn,
        ]));

        return response()->json($evento, 201);
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
            return response()->json(['erro' => 'O recurso pesquisado n??o existe'], 404);
        }
        return response()->json($evento, 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateEventosRequest  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventosRequest $request, $id)
    {
        $evento = $this->evento->find($id);
        $imgInfo = $this->evento->find($id);
        if ($evento === null) {
            return response()->json(['erro' => 'Impossivel realizar a altera????o. O recurso solicitado n??o existe'], 404);
        } else {
            $evento->fill($request->all());


            if ($request->file('thumb')) {
                Storage::delete($imgInfo->thumb);
                $imagem = $request->file('thumb');
                $imagem_urn = $imagem->store('imagens', 'public');
                $evento->thumb = $imagem_urn;
            }

            if ($request->file('gallery')) {
                foreach ($imgInfo->gallery as $img) {
                    Storage::delete($img);
                }

                $imgRecover = array();
                $imagemGalleryUpdate = $request->file('gallery');
                foreach ($imagemGalleryUpdate as $file) {
                    $imgRecover[] = $file->store('imagens/galeria');
                }
                $evento->gallery = $imgRecover;
            }


            $evento->save();
            return response()->json($evento, 200);
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
            $evento = $this->evento->find($id);
            if ($evento === null) {
                return response()->json(['erro' => 'Impossivel realizar a exclus??o. O recurso solicitado n??o existe'], 404);
            } else {
                Storage::disk('public')->delete($evento->thumb);
                Storage::disk('public')->delete($evento->gallery);

                $evento->delete();
                return response()->json(['msg' => 'O post removido com sucesso!'], 200);
            }
        }
    }
}