<?php

namespace App\Http\Controllers;

use App\Models\Bikes;
use App\Http\Requests\StoreBikesRequest;
use App\Http\Requests\UpdateBikesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BikesController extends Controller

{
    public function __construct(Bikes $bikes)
    {
        $this->bikes = $bikes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { {
            $bikes = array();

            if ($request->has('filtro')) {
                $filtros = explode(';', $request->filtro);

                foreach ($filtros as $key => $condicao) {
                    $c = explode(':', $condicao);
                    $bikes = $this->bikes::where($c[0], $c[1], $c[2])->orderby('id', 'desc')->paginate(10);
                }
            } elseif ($request->has('valor')) {
                $cont = $request->valor;
                $bikes = Bikes::orderBy('id', 'desc')->paginate($cont);
            } else {
                $bikes = Bikes::orderBy('id', 'desc')->paginate(10);
            }


            return response()->json($bikes, 200);
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBikesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBikesRequest $request)
    {
        //return response()->json($request, 404);
        //$imageGallery_urn = "";
        $imageThumb = $request->file('thumb');
        $imageBanner = $request->file('banner');
        $imageGallery = $request->file('gallery');
        $imagen_urn = $imageThumb->store('imagens', 'public');
        $banner_urn = $imageBanner->store('imagens', 'public');

        if ($request->file('gallery')) {
            foreach ($imageGallery as $file) {
                $img[] = $file->store('imagens/galeria');
            }
            $img;
        }



        $bikes = $this->bikes->create(([
            'title' => $request->title,
            'descricao' => $request->descricao,
            'quadro' => $request->quadro,
            'garfo' => $request->garfo,
            'movimentoDirecao' => $request->movimentoDirecao,
            'guidao' => $request->guidao,
            'manopla' => $request->manopla,
            'freio' => $request->freio,
            'aro' => $request->aro,
            'cubo' => $request->cubo,
            'pneu' => $request->pneu,
            'pedivela' => $request->pedivela,
            'corrente' => $request->corrente,
            'movimentoCentral' => $request->movimentoCentral,
            'rodaLivre' => $request->rodaLivre,
            'cambioDianteiro' => $request->cambioDianteiro,
            'cambioTraseiro' => $request->cambioTraseiro,
            'manete' => $request->manete,
            'selim' => $request->selim,
            'canote' => $request->canote,
            'abracadeira' => $request->abracadeira,
            'pedal' => $request->pedal,
            'peso' => $request->peso,
            'observacao' => $request->observacao,
            'content' => $request->content,
            'gallery' => $img,
            'thumb' => $imagen_urn,
            'banner' => $banner_urn,
        ]));
        return response()->json($bikes, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bikes  $bikes
     * @return \Illuminate\Http\Response
     */
    public function show(Bikes $bikes, $id)
    {
        $bikes = $this->bikes->find($id);
        if ($bikes === null) {
            return response()->json(['erro' => 'O recurso pesquisado não existe'], 404);
        }
        return response()->json($bikes, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBikesRequest  $request
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBikesRequest $request, $id)
    {
        $bikes = $this->bikes->find($id);
        $imgInfo = $this->bikes->find($id);
        if ($bikes === null) {
            return response()->json(['erro' => 'Impossivel realizar a alteração. O recurso solicitado não existe'], 404);
        } else {
            $bikes->fill($request->all());



            if ($request->file('thumb')) {
                Storage::delete($imgInfo->thumb);
                $imagem = $request->file('thumb');
                $imagem_urn = $imagem->store('imagens', 'public');
                $bikes->thumb = $imagem_urn;
            }
            if ($request->file('banner')) {
                Storage::delete($imgInfo->banner);
                $caminho = $request->file('banner');
                $banner_urn = $caminho->store('imagens', 'public');
                $bikes->banner = $banner_urn;
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
                $bikes->gallery = $imgRecover;
            }


            $bikes->save();

            return response()->json($bikes, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $bikes = $this->bikes->find($id);
        if ($bikes === null) {
            return response()->json(['erro' => 'Impossivel realizar a exclusão. O recurso solicitado não existe'], 404);
        } else {
            Storage::disk('public')->delete($bikes->thumb);
            Storage::disk('public')->delete($bikes->banner);
            foreach ($bikes->gallery as $img) {
                Storage::disk('public')->delete($img);
            }

            $bikes->delete();
            return response()->json(['msg' => 'Bike removida com sucesso!'], 200);
        }
    }
}