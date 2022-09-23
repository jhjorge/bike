@extends('layouts.app')
@section('titulo', 'Sobre')


@section('content')
<div class="banner-container">
    <img src="{{ asset('img/sobre-banner.jpg') }}" alt="foto de uma bicicleta">
</div>
<div class="container text-information ">
    <div class="row">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Dolorum quae possimus numquam non rerum sunt, officia
            totam quo unde eum molestiae iste fugit iure,
            delectus similique ratione voluptate alias error!orem
            ipsum dolor sit amet, consectetur adipisicing elit.
            Dolorum quae possimus numquam non rerum sunt, officia
            totam quo unde eum molestiae iste fugit iure,
            delectus similique ratione voluptate alias error!
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Dolorum quae possimus numquam non rerum sunt, officia
            totam quo unde eum molestiae iste fugit iure,
            delectus similique ratione voluptate alias error!orem
            ipsum dolor sit amet, consectetur adipisicing elit.
            Dolorum quae possimus numquam non rerum sunt, officia
            totam quo unde eum molestiae iste fugit iure,
            delectus similique ratione voluptate alias error!
        </p>
    </div>
</div>
<div class="video-content">
    <iframe width="1024" height="400" src="https://www.youtube.com/embed/9iCU5BSDsqE" title="YouTube video player"
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
</div>
<div class="sobre-content">
    <div class="container sobre-content-text">
        <div class="row col-md-4 col-sm-12">
            <h2>Qualidade na Fabricação</br></h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Laboriosam vel corrupti aspernatur consequatur quo,
                illo sit labore obcaecati vero, expedita pariatur
                neque doloribus reprehenderit placeat voluptatibus
                accusamus harum quos ullam!</p>
        </div>
    </div>
</div>
<div class="banner-container sobre-content-2">
    <img src="{{ asset('img/sobre-section-2.jpg') }}" alt="foto de uma bicicleta">

</div>


@endsection