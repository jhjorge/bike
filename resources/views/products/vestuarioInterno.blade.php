@extends('layouts.app')
@section('titulo', $produto->title)

@section('content')
    <div class="row m-0 my-5 py-5 container d-flex align-itens-center justify-content-center" style="height: 60vh">

        <div class="col-md-6">
            <div class="row m-0">
                <div class="col-md-5 order-0 ">
                    @foreach ($produto->gallery as $item)
                        <div class="row my-2 mx-0">
                            <img src="{{ asset('storage/' . $item) }}" alt="" class="img-fluid" style="max-width:30rem">

                        </div>
                    @endforeach
                </div>


                <div class="col-md-5 order-1">

                    <img src="{{ asset('storage/' . $produto->thumb) }}" alt="" class="img-fluid"
                        style="max-width:50rem">

                </div>
            </div>
        </div>
        <div class="col-md-5 container m-0">
            <div class="row mb-2 mx-0">
                <h1>{{ $produto->title }}<h1>
            </div>
            <div class="row my-3 mx-0">
                <div class="col h5">Tamanho</div>
                <div class="col">{{ $produto->tamanho }}</div>
            </div>
            <hr />
            <div class="row my-3 mx-0">
                <div class="col h5">Cor</div>
                <div class="col">{{ $produto->cor }}</div>
            </div>
            <hr />
            <div class="row my-3 mx-0">
                <div class="col h5">Conteúdo</div>
                <div class="col">{{ $produto->content }}</div>
            </div>
            <hr />
            <div class="row my-3 mx-0">
                <div class="col h5">Descrição</div>
                <div class="col">{{ $produto->descricao }}</div>
            </div>
            <hr />
            <div class="row my-3 mx-0">
                <div class="col h5">Observação</div>
                <div class="col">{{ $produto->observacao }}</div>
            </div>
            <hr />

        </div>

    </div>
@endsection
