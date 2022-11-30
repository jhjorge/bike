@extends('layouts.app')
@section('titulo', 'Bikes')


@section('content')
    <div class="my-4 container">
        <div class="row">
            <h1>Bikes</h1>
            <div class="row">
                <div class="my-4 card-deck blog-view">
                    @forelse($bikes as $bike)
                        <div class="card blog-view-post" style="width: 18rem;">
                            <a href="{{ route('bike.interno', $bike->id) }}">
                                <img class="card-img-top" src="{{ asset('storage/' . $bike->thumb) }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ $bike->title }}</p>
                                </div>

                            </a>
                        </div>

                    @empty
                        <h2>Nenhum Post encontrado!</h2>
                    @endforelse

                </div>

            </div>
        @endsection
