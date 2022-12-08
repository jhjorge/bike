@extends('layouts.app')
@section('titulo', $produto->title)

@section('content')
    <div class="row m-0 my-5 py-5 container d-flex align-itens-center justify-content-center">

        <div class="col-md-6">
            <div class="row m-0">
                <div class="col-md-5 order-0 ">
                    @foreach ($produto->gallery as $item)
                        <div class="row my-2 mx-0">
                            <img src="{{ asset('storage/' . $item) }}" alt="" class="img-fluid" style="max-width:30rem">

                        </div>
                    @endforeach
                </div>


                <div class="col-md-5 order-1">

                    <img src="{{ asset('storage/' . $produto->thumb) }}" alt="" class="img-fluid"
                        style="max-width:50rem">

                </div>
            </div>
        </div>
        <div class="col-md-5 container m-0">
            <div class="row mb-2 mx-0">
                <h1>{{ $produto->title }}<h1>
            </div>


        </div>

    </div>
@endsection
