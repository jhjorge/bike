@extends('layouts.app')
@section('titulo', 'Eventos')


@section('content')
    <div class="container my-4">
        <h1>Eventos</h1>
        <div class="row">
            <div class="my-4 blog-view">
                @forelse($eventos as $evento)
                    <div class="card blog-view-post" style="width: 18rem;">
                        <a href="{{ route('evento', $evento->id) }}">
                            <img class="card-img-top" src="{{ asset('img/evento.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{ Str::limit($evento->content, 60, '...') }}</p>
                            </div>
                            <div class="mx-2 my-2">
                                <i class="bi bi-calendar3"> {{ $evento->date }}</i>
                            </div>
                            <div class="mx-2 my-2">
                                <i class="bi bi-geo-alt-fill"> {{ $evento->locale }}</i>
                            </div>
                        </a>
                    </div>

                @empty
                    <h2>Nenhum Post encontrado!</h2>
                @endforelse

            </div>


        </div>
        <div class="row mt-4">
            <div class="col btn-group">
                {{ $eventos->onEachSide(5)->links() }}
            </div>
        </div>
    </div>

@endsection
