@extends('layouts.app')
@section('titulo', $post->title)

@section('content')
    <div class="row mb-4 mx-0">
        <img src="{{ asset('storage/' . $post->thumb) }}" alt="Foto banner" class="img-fluid" style="max-height:800px">
    </div>
    <div class="row mx-0">
        <div class="row text-center my-4">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="row mx-0 my-3">

            <div class="col-11">
                {!! $post->content !!}
            </div>


        </div>

    </div>
@endsection
