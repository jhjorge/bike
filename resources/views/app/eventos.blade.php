@extends('layouts.app')
@section('titulo', 'Eventos')


@section('content')
    <div class="my-4 container">
        <div class="row my-4">
            <h1>Eventos</h1>
        </div>
        <div class="row my-4">

            @forelse($eventos as $evento)
                <div class="my-4 card-deck blog-view" style="width: 18rem;">
                    <a href="{{ route('evento', $evento->id) }}">
                        <img class="card-img-top" src="{{ asset('storage/' . $evento->thumb) }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{!! Str::limit($evento->content, 100, '...') !!}</p>
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
        <div class="row mt-4">
            <div class="col btn-group">
                {{ $eventos->onEachSide(5)->links() }}
            </div>
        </div>



    @endsection
