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
    <div class="gallery-container my-4 row m-0" style="height: 80vh">
        <div class="gallery-container-top col-md-8">
            <div class="row m-0">
                <h2>Conheça nossos produtos</h2>
            </div>
            <div class="row mb-5 mx-0 gallery-container-top-nav">
                <a href="{{ route('home', 'Bikes') }}" class="col">
                    <h3>
                        Bikes
                    </h3>
                </a>
                <a href="{{ route('home', 'Acessorios') }}" class="col">
                    <h3>
                        Acessórios
                    </h3>
                </a>
                <a href="{{ route('home', 'Componentes') }}" class="col">
                    <h3>
                        Componentes
                    </h3>
                </a>
                <a href="{{ route('home', 'Vestuarios') }}" class="col">
                    <h3>
                        Vestuários
                    </h3>
                </a>
            </div>
            <div class="row" style="">
                @if ($request->has('Bikes'))

                    @foreach ($produtos as $item)
                        <a href="{{ route('bike.interno', $item->id) }}">
                            <div class="col-4 my-2">
                                <div class="card" style="width: 12rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text h5" style="color: black"> {{ $item->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @elseif ($request->has('Acessorios'))
                    @foreach ($produtos as $item)
                        <a href="{{ route('acessorio.interno', $item->id) }}">
                            <div class="col-4 my-2">
                                <div class="card" style="width: 12rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text h5" style="color: black"> {{ $item->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @elseif ($request->has('Componentes'))
                    @foreach ($produtos as $item)
                        <a href="{{ route('componente.interno', $item->id) }}">
                            <div class="col-4 my-2">
                                <div class="card" style="width: 12rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text h5" style="color: black"> {{ $item->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @elseif ($request->has('Vestuarios'))
                    @foreach ($produtos as $item)
                        <a href="{{ route('vestuario.interno', $item->id) }}">
                            <div class="col-4 my-2">
                                <div class="card" style="width: 12rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text h5" style="color: black"> {{ $item->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    @foreach ($produtos as $item)
                        <a href="{{ route('bike.interno', $item->id) }}">
                            <div class="col-4 my-2">
                                <div class="card" style="width: 12rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text h5" style="color: black"> {{ $item->title }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
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
