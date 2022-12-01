@extends('layouts.app')
@section('titulo', 'Acessórios')


@section('content')
    <div class="my-4 container">
        <div class="row">
            <h1>Acessórios</h1>
            <div class="row">
                <div class="my-4 card-deck blog-view">
                    @forelse($acessorios as $acessorio)
                        <div class="card blog-view-post" style="width: 18rem;">
                            <a href="{{ route('acessorio.interno', $acessorio->id) }}">
                                <img class="card-img-top" src="{{ asset('storage/' . $acessorio->thumb) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ $acessorio->title }}</p>
                                </div>

                            </a>
                        </div>

                    @empty
                        <h2>Nenhum Post encontrado!</h2>
                    @endforelse

                </div>

            </div>
        @endsection
