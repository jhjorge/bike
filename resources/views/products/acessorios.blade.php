@extends('layouts.app')
@section('titulo', 'Acessórios')


@section('content')
    <div class="my-4 container" style="height: 60vh">
        <div class="row">
            <h1>Acessórios</h1>
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
                        <h2>Nenhum Produto encontrado!</h2>
                    @endforelse

                </div>

            </div>


        </div>
        <div class="row mt-4">
            <div class="col btn-group">
                {{ $produtos->onEachSide(5)->links() }}
            </div>
        </div>

    </div>
@endsection
