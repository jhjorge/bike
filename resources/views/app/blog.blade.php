@extends('layouts.app')
@section('titulo', 'Blog')


@section('content')
    <div class="my-4 container">
        <div class="row">
            <h1>Blog</h1>
        </div>
        <div class="my-4 blog-view">
            @forelse($posts as $post)
                <div class="card blog-view-post" style="width: 18rem;">
                    <a href="{{ route('blogPost', $post->id) }}">
                        <img class="card-img-top" src="{{ asset('img/logoBlog.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{ Str::limit($post->content, 50, '...') }}</p>
                        </div>
                    </a>
                </div>

            @empty
                <h2>Nenhum Post encontrado!</h2>
            @endforelse

        </div>
        @if (request()->input('search-post'))
            {{ $posts->appends(['search-post' => request()->input('search-post')])->links() }}
        @endif
    </div>
@endsection
