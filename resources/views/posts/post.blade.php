@extends('layouts.app')
@section('titulo', $post->title)

@section('content')
    <div class="container">
        <div class="row my-4">
            <h1>Blog</h1>
        </div>
        <div class="row my-4">
            <img src="{{ asset('img/bannerBlog.jpg') }}" alt="" class="img-fluid">
        </div>
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
