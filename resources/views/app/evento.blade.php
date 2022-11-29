@extends('layouts.app')
@section('titulo', $evento->title)

@section('content')
    <div class="container">
        <div class="row my-4">
            <h1>Evento</h1>
        </div>
        <div class="row my-4">
            <h2 class="h2 text-center">
                {{ $evento->title }}
            </h2>
        </div>
        <div class="row my-4">
            <img src="{{ asset('storage/' . $evento->thumb) }}" alt="" class="img-fluid">
        </div>
        <div class="row  my-4">
            <div class="mx-2">
                <i class="h4 bi bi-calendar3"> {{ $evento->date }} </i>
            </div>
            <div class="h4 mx-2 my-2">
                <i class="bi bi-geo-alt-fill"> {{ $evento->locale }}</i>
            </div>
        </div>
        <div class="row my-4">
            <h2 class="h5">{{ $evento->title }}</h2>
            <p>
                {{ $evento->content }}

            </p>
        </div>
        <div class="row my-4">
            <i class="h2 bi bi-camera"> Galeria</i></h2>
        </div>

        <div class="row">

            @foreach ($evento->gallery as $img)
                <div class="col-4 my-3 p-2">
                    <img src="{{ asset('storage/' . $img) }}" class="img-fluid" alt="">
                </div>
            @endforeach
        </div>



    </div>
@endsection
