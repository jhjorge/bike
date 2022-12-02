@extends('layouts.app')
@section('titulo', 'Blog')


@section('content')
    <div class="my-4 container" style="height: 60vh">
        <div class="row">
            <h1>Blog</h1>
            <div class="row">
                <div class="my-4 card-deck blog-view">
                    @forelse($posts as $post)
                        <div class="card blog-view-post" style="width: 18rem;">
                            <a href="{{ route('blogPost', $post->id) }}">
                                <img class="card-img-top" src="{{ asset('storage/' . $post->thumb) }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ Str::limit($post->content, 100, '...') }}</p>
                                </div>

                            </a>
                        </div>

                    @empty
                        <h2>Nenhum Post encontrado!</h2>
                    @endforelse

                </div>


            </div>



        </div>
        <div class="row mt-4">
            <div class="col btn-group">
                {{ $posts->onEachSide(5)->links() }}
            </div>
        </div>

    </div>
@endsection
