@extends('layouts.app')
@section('titulo', 'Componentes')


@section('content')
    <div class="my-4 container" style="height: 60vh">
        <div class="row">
            <h1>Componentes</h1>
            <div class="row">
                <div class="my-4 card-deck blog-view">
                    @forelse($produtos as $produto)
                        <div class="card blog-view-post" style="width: 18rem;">
                            <a href="{{ route('acessorio.interno', $produto->id) }}">
                                <img class="card-img-top" src="{{ asset('storage/' . $produto->thumb) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ $produto->title }}</p>
                                </div>

                            </a>
                        </div>

                    @empty
                        <h2>Nenhum Post encontrado!</h2>
                    @endforelse

                </div>

            </div>
        @endsection
