@extends('layouts.app')
@section('titulo', 'Home')


@section('content')
<main>
    <div class="banner-container">
        <div class="col-md-12 banner-container-img">
            <img src="{{ asset('img/banner.jpg') }}" alt="foto de uma bicicleta">
        </div>
    </div>
    <div class="call-container">
        <div class="call-container-content">
            <img src="{{ asset('img/blog.jpg') }}" alt="">
        </div>
        <div class=" call-container-content">
            <img src="{{ asset('img/eventos.jpg') }}" alt="">
        </div>
    </div>
</main>
<section>
    <div class="gallery-container">
        <div class="gallery-container-content">
            <div class="gallery-container-content-top">
                <h2>
                    Conheça nossos produtos
                </h2>
                <div class="gallery-container-content-top-nav">
                    <h3>Bicicletas</h3>
                    <h3>Acessórios</h3>
                    <h3>Componentes</h3>
                    <h3>Vestuário</h3>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection