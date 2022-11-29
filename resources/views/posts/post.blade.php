@extends('layouts.app')
@section('titulo', $post->title)

@section('content')
    <div class="container">
        <div class="row my-4">
            <h1>Blog</h1>
        </div>
    </div>
    <div class="row my-4">
        <img src="{{ asset('storage/' . $post->thumb) }}" alt="" class="img-fluid" style="max-width:50rem">
    </div>
    <div class="container">
        <div class="row text-center my-4">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="row my-4">
            <p>
                {{ $post->content }}
            </p>
        </div>

    </div>
@endsection
