@extends('layouts.app')
@section('titulo', 'Home')


@section('content')
<div class="banner-container">
    <img src="{{ asset('img/banner.jpg') }}" alt="foto de uma bicicleta">
</div>
<div class="call-container my-4">
    <div class="call-container-content">
        <img src="{{ asset('img/blog.jpg') }}" alt="">
        <img src="{{ asset('img/eventos.jpg') }}" alt="">
    </div>
</div>
<div class="gallery-container my-4">
    <div class="gallery-container-top">
        <h2>
            Conheça nossos produtos
        </h2>
        <div class="gallery-container-top-nav">
            <h3>Bicicletas</h3>
            <h3>Acessórios</h3>
            <h3>Componentes</h3>
            <h3>Vestuário</h3>
        </div>
    </div>
</div>
<section>
    <div class="call-container my-4">
        <div class="call-container-content">
            <img src="{{ asset('img/onde.jpg') }}" alt="">
            <img src="{{ asset('img/registre.jpg') }}" alt="">
        </div>
    </div>
</section>
@endsection