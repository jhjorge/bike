@extends('layouts.app')
@section('titulo', $bike->title)

@section('content')
    <div class="row m-0 p-0 container-banner-bike  mb-3" style="">
        <img src="{{ asset('storage/' . $bike->thumb) }}" class="img-fluid m-0 p-0 banner-bike" alt="Responsive image"
            style=" max-height: 40vh">
        <div class="overlay-bike">
            <h2 class="mt-md-5  title-bike">{{ $bike->title }}</h2>
        </div>
    </div>


    <div class="container my-3 mt-5">
        <div class="container gallery-img">


            @foreach ($bike->gallery as $img)
                <div class="col-10 my-2">
                    <picture>
                        <source srcset="" type="image/svg+xml">
                        <img src="{{ asset('storage/' . $img) }}" class="img-fluid img-thumbnail">
                    </picture>

                </div>
            @endforeach

        </div>

        <div class="row my-4 text-center">
            <div class="col-6 col-md-4">
                <p>
                    {{ $bike->content }}
                </p>
            </div>
        </div>
        <div class="row my-5  text-width-bold">
            <h2 class="h2">
                Descrição
            </h2>
        </div>
        <div class="row my-4 text-width-bold">
            <p>
                {{ $bike->descricao }}
            </p>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Quadro</div>
            <div class="col ">{{ $bike->quadro }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Garfo</div>
            <div class="col ">{{ $bike->garfo }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Movimento de Direção</div>
            <div class="col ">{{ $bike->movimentoDirecao }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Guidão</div>
            <div class="col ">{{ $bike->guidao }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Manopla</div>
            <div class="col ">{{ $bike->manopla }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Freio</div>
            <div class="col ">{{ $bike->freio }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Aro/Raio</div>
            <div class="col ">{{ $bike->aro }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Cubo</div>
            <div class="col ">{{ $bike->cubo }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Pneu/Câmara de Ar</div>
            <div class="col ">{{ $bike->pneu }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Pedivela</div>
            <div class="col ">{{ $bike->pedivela }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Corrente</div>
            <div class="col ">{{ $bike->corrente }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Movimento Central</div>
            <div class="col ">{{ $bike->movimentoCentral }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Roda Livre</div>
            <div class="col ">{{ $bike->rodaLivre }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Câmbio Dianteiro</div>
            <div class="col ">{{ $bike->cambioDianteiro }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Câmbio Traseiro</div>
            <div class="col ">{{ $bike->cambioTraseiro }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Manete/Alavanca</div>
            <div class="col ">{{ $bike->manete }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">selim</div>
            <div class="col ">{{ $bike->selim }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Canote</div>
            <div class="col ">{{ $bike->canote }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Abraçadeira</div>
            <div class="col ">{{ $bike->abracadeira }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Pedal</div>
            <div class="col ">{{ $bike->pedal }}</div>

        </div>
        <div class="row my-4 text-width-bold">
            <div class="col h3">Peso</div>
            <div class="col ">{{ $bike->peso }}</div>

        </div>
        <div class="row my-4 pb-5 text-width-bold">
            <div class="col h3">Observação</div>
            <div class="col ">{{ $bike->observacao }}</div>

        </div>


    </div>
@endsection
