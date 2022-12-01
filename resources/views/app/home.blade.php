@extends('layouts.app')
@section('titulo', 'Home')


@section('content')
    <div class="banner-container">
        <img src="{{ asset('img/banner.jpg') }}" alt="foto de uma bicicleta">
    </div>

    <div class="container my-4">
        <div class="row">

            <div class="col-5">
                <a href="{{ route('blog') }}">
                    <img src="{{ asset('img/blog.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-5">
                <a href="{{ route('eventos') }}">
                    <img src="{{ asset('img/eventos.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
        </div>

    </div>
    <div class="gallery-container my-4 row m-0">
        <div class="gallery-container-top col-md-5 ">
            <div class="row m-0">
                <h2>
                    Conheça nossos produtos
                </h2>
            </div>
            <div class="row m-0 gallery-container-top-nav">
                <h3 class="col">Bicicletas</h3>
                <h3 class="col">Acessórios</h3>
                <h3 class="col">Componentes</h3>
                <h3 class="col">Vestuário</h3>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">

            <div class="col-5">
                <a href="{{ route('ondeComprar') }}">
                    <img src="{{ asset('img/onde.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-5">
                <a href="{{ route('registroBike') }}">
                    <img src="{{ asset('img/registre.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
        </div>

    </div>

@endsection
