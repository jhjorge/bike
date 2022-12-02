@extends('layouts.app')
@section('titulo', 'Bikes')


@section('content')
    <div class="my-4 container" style="height: 60vh">
        <div class="row my-4">
            <h1>Bikes</h1>
            <div class="row my-4">
                <div class="my-4 card-deck blog-view">
                    @forelse($bikes as $bike)
                        <div class="card blog-view-post my-3" style="width: 18rem;">
                            <a href="{{ route('bike.interno', $bike->id) }}">
                                <img class="card-img-top" src="{{ asset('storage/' . $bike->thumb) }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ $bike->title }}</p>
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
                {{ $bikes->onEachSide(5)->links() }}
            </div>
        </div>

    </div>
@endsection
