@extends('layouts.app')
@section('titulo', $bike->title)

@section('content')

    <div class="banner-bike">
        <img src="{{ asset('storage/' . $bike->banner) }}" class="img-fluid" alt="..." style="width:1920px, height:800px ">
    </div>



    <div class="container my-3 col-9">
        <div class="row m-0">
            <h2 class="title-bike my-5 text-uppercase">{{ $bike->title }}</h5>
        </div>
        <div class="row my-4">
            <div class="col-md-8 justify-content center d-flex">
                <img src="{{ asset('storage/' . $bike->thumb) }}" class="img-fluid" alt="">
            </div>
        </div>

        @isset($bike->gallery)
            <div class="row gallery-img m-0">




                @foreach ($bike->gallery as $img)
                    <div class="col-md-3 col-4 my-2 d-flex justify-content-center">
                        <picture>
                            <a class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <source srcset="" type="image/svg+xml">
                                <img src="{{ asset('storage/' . $img) }}" class="img-fluid img-thumbnail">
                            </a>
                        </picture>

                    </div>
                @endforeach


            </div>
        @endisset

        <div class="row my-4 text-center">
            <div class="col-6 col-md-4">
                <p>
                    {!! $bike->content !!}
                </p>
            </div>
        </div>
        <div class="row my-3  text-width-bold">
            <h2 class="h1 text-width-bold">
                Descrição
            </h2>
        </div>
        <div class="row my-2 text-width-bold">
            <p>
                {!! $bike->descricao !!}
            </p>

        </div>
        <div class="row my-5  text-width-bold">
            <h2 class="h1 text-width-bold">
                Ficha Técnica
            </h2>
        </div>
        @if ($bike->quadro !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Quadro</div>
                <div class="col ">{{ $bike->quadro }}</div>

            </div>
        @elseif($bike->garfo !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Garfo</div>
                <div class="col ">{{ $bike->garfo }}</div>

            </div>
        @elseif($bike->movimentoDirecao !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Movimento de Direção</div>
                <div class="col ">{{ $bike->movimentoDirecao }}</div>

            </div>
        @elseif($bike->guidao !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Guidão</div>
                <div class="col ">{{ $bike->guidao }}</div>

            </div>
        @elseif($bike->manopla !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Manopla</div>
                <div class="col ">{{ $bike->manopla }}</div>

            </div>
        @elseif($bike->freio !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Freio</div>
                <div class="col ">{{ $bike->freio }}</div>

            </div>
        @elseif($bike->aro !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Aro/Raio</div>
                <div class="col ">{{ $bike->aro }}</div>

            </div>
        @elseif($bike->cubo !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Cubo</div>
                <div class="col ">{{ $bike->cubo }}</div>

            </div>
        @elseif($bike->pneu !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Pneu/Câmara de Ar</div>
                <div class="col ">{{ $bike->pneu }}</div>

            </div>
        @elseif($bike->pedivela !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Pedivela</div>
                <div class="col ">{{ $bike->pedivela }}</div>

            </div>
        @elseif($bike->corrente !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Corrente</div>
                <div class="col ">{{ $bike->corrente }}</div>

            </div>
        @elseif($bike->movimentoCentral !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Movimento Central</div>
                <div class="col ">{{ $bike->movimentoCentral }}</div>

            </div>
        @elseif($bike->rodaLivre !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Roda Livre</div>
                <div class="col ">{{ $bike->rodaLivre }}</div>

            </div>
        @elseif($bike->cambioDianteiro !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Câmbio Dianteiro</div>
                <div class="col ">{{ $bike->cambioDianteiro }}</div>

            </div>
        @elseif($bike->cambioTraseiro !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Câmbio Traseiro</div>
                <div class="col ">{{ $bike->cambioTraseiro }}</div>

            </div>
        @elseif($bike->manete !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Manete/Alavanca</div>
                <div class="col ">{{ $bike->manete }}</div>

            </div>
        @elseif($bike->selim !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">selim</div>
                <div class="col ">{{ $bike->selim }}</div>

            </div>
        @elseif($bike->canote !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Canote</div>
                <div class="col ">{{ $bike->canote }}</div>

            </div>
        @elseif($bike->abracadeira !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Abraçadeira</div>
                <div class="col ">{{ $bike->abracadeira }}</div>

            </div>
        @elseif($bike->pedal !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Pedal</div>
                <div class="col ">{{ $bike->pedal }}</div>

            </div>
        @elseif($bike->peso !== 'null')
            <div class="row my-4 text-width-bold">
                <div class="col h3">Peso</div>
                <div class="col ">{{ $bike->peso }}</div>

            </div>
        @elseif($bike->observacao !== 'null')
            <div class="row my-4 pb-5 text-width-bold">
                <div class="col h3">Observação</div>
                <div class="col ">{!! $bike->observacao !!}</div>

            </div>
        @endif



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

                            @foreach ($bike->gallery as $img)
                                @if ($img == $bike->gallery[0])
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
