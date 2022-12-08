@extends('layouts.app')
@section('titulo', 'Home')


@section('content')
    <div class="banner-container">
        <img src="{{ asset('img/banner.jpg') }}" alt="foto de uma bicicleta">
    </div>

    <div class="container my-5 p-3">
        <div class="row my-4">

            <div class="col-md-5 col-6">
                <a href="{{ route('blog') }}">
                    <img src="{{ asset('img/blog.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-md-5 col-6">
                <a href="{{ route('eventos') }}">
                    <img src="{{ asset('img/eventos.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
        </div>

    </div>
    <div class="gallery-container my-5 row mx-0 p-3">
        <div class="gallery-container-top col-md-8 my-5">
            <div class="row m-0">
                <h2 class="title-gallery">Conheça nossos produtos</h2>
            </div>
            <div class="row mb-5 mx-0 gallery-container-top-nav">
                <a href="{{ route('home', 'Bikes') }}" class="col btn-gallery">
                    <h3>
                        Bikes
                    </h3>
                </a>
                <a href="{{ route('home', 'Acessorios') }}" class="col btn-gallery">
                    <h3>
                        Acessórios
                    </h3>
                </a>
                <a href="{{ route('home', 'Componentes') }}" class="col btn-gallery">
                    <h3>
                        Componentes
                    </h3>
                </a>
                <a href="{{ route('home', 'Vestuarios') }}" class="col btn-gallery">
                    <h3>
                        Vestuários
                    </h3>
                </a>
            </div>
            <div class="row h-50 " style="">
                @if ($request->has('Bikes'))

                    @foreach ($produtos as $item)
                        <div class="col-md-4 col my-2">
                            <a href="{{ route('bike.interno', $item->id) }}">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                </div>
                                <p class="text-center card-text-gallery h5"> {{ $item->title }}</p>

                            </a>
                        </div>
                    @endforeach
                @elseif ($request->has('Acessorios'))
                    @foreach ($produtos as $item)
                        <div class="col-md-4 col my-2">
                            <a href="{{ route('acessorio.interno', $item->id) }}">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                </div>
                                <p class="text-center card-text-gallery h5"> {{ $item->title }}</p>

                            </a>
                        </div>
                    @endforeach
                @elseif ($request->has('Componentes'))
                    @foreach ($produtos as $item)
                        <div class="col-md-4 col my-2">
                            <a href="{{ route('componente.interno', $item->id) }}">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                </div>
                                <p class="text-center card-text-gallery h5"> {{ $item->title }}</p>

                            </a>
                        </div>
                    @endforeach
                @elseif ($request->has('Vestuarios'))
                    @foreach ($produtos as $item)
                        <div class="col-md-4 col my-2">
                            <a href="{{ route('vestuario.interno', $item->id) }}">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                </div>
                                <p class="text-center card-text-gallery h5"> {{ $item->title }}</p>

                            </a>
                        </div>
                    @endforeach
                @else
                    @foreach ($produtos as $item)
                        <div class="col-md-4 col my-2">
                            <a href="{{ route('bike.interno', $item->id) }}">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('storage/' . $item->thumb) }}"
                                        alt="Card image cap">
                                </div>
                                <p class="text-center card-text-gallery h5"> {{ $item->title }}</p>

                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
    <div class="container my-4">
        <div class="row my-4">

            <div class="col-md-5 col-6">
                <a href="{{ route('ondeComprar') }}">
                    <img src="{{ asset('img/onde.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-md-5 col-6">
                <a href="{{ route('registroBike') }}">
                    <img src="{{ asset('img/registre.jpg') }}" class="img-fluid" alt="">
                </a>
            </div>
        </div>

    </div>

@endsection
