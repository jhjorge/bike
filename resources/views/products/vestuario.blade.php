@extends('layouts.app')
@section('titulo', 'Vestuário')


@section('content')
    <div class="my-4 container">
        <div class="row my-4">
            <h1>Vestuário</h1>
        </div>
        <div class="row my-4">
            <div class="my-4 card-deck blog-view">
                @forelse($produtos as $produto)
                    <div class="card blog-view-post my-3" style="width: 18rem;">
                        <a href="{{ route('vestuario.interno', $produto->id) }}">
                            <img class="card-img-top" src="{{ asset('storage/' . $produto->thumb) }}" alt="Card image cap">
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
        <div class="row mt-4">
            <div class="col btn-group">
                {{ $produtos->onEachSide(5)->links() }}
            </div>
        </div>

    </div>
@endsection
