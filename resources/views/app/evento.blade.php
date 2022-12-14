@extends('layouts.app')
@section('titulo', $evento->title)

@section('content')


    <div class="row my-4 mx-0">
        <h2 class="h2 text-center">
            {{ $evento->title }}
        </h2>
    </div>
    <div class="row my-4 mx-0">
        <img src="{{ asset('storage/' . $evento->thumb) }}" alt="" class="img-fluid" style="max-height: 800px">
    </div>
    <div class="container">
        <div class="row  my-4">
            <div class="mx-2 my-2">
                <i class="h4 bi bi-calendar3"> {{ $evento->date }} </i>
            </div>
            <div class="h4 mx-2 my-2">
                <i class="bi bi-geo-alt-fill"> {{ $evento->locale }}</i>
            </div>
        </div>
        <div class="row my-4">
            <h2 class="h2">{{ $evento->title }}</h2>
            <p>
                {!! $evento->content !!}

            </p>
        </div>
        <div class="row my-4">
            <i class="h2 bi bi-camera"> Galeria</i></h2>
        </div>
        @isset($evento->gallery)


            <div class="row">

                @foreach ($evento->gallery as $img)
                    <div class="col-md-3 col-4 my-2 d-flex justify-content-center">
                        <picture>
                            <a class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <source srcset="" type="image/svg+xml">
                                <img src="{{ asset('storage/' . $img) }}" class="img-fluid" alt="">
                            </a>
                        </picture>

                    </div>
                @endforeach
            </div>
        @endisset
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Galeria de Fotos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach ($evento->gallery as $img)
                                @if ($img == $evento->gallery[0])
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $img) }}" class="d-block w-100" alt="...">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $img) }}" class="d-block w-100" alt="...">
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>



@endsection
