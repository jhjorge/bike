@extends('layouts.app')
@section('titulo', $produto->title)

@section('content')
    <div class="row mx-0 my-md-4 py-md-3">
        @if ($produto->gallery)


            <div class="col-md-2 d-md-block d-flex order-0 my-3">
                @foreach ($produto->gallery as $item)
                    <a class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="row my-2 mx-0">

                            <img src="{{ asset('storage/' . $item) }}" alt="" class="img-fluid" style="max-width:30rem">

                        </div>
                    </a>
                @endforeach
            </div>
        @endif


        <div class="col-md-5 order-1 my-3 text-center align-itens-center d-flex" data-bs-toggle="modal"
            data-bs-target="#exampleModal2">

            <img src="{{ asset('storage/' . $produto->thumb) }}" alt="" class="img-fluid"
                style=" max-width:600px; max-height:600px">


        </div>

        <div class="col-md-5 my-3 order-3">
            <div class="row mb-2 ">
                <h1>{{ $produto->title }}<h1>
            </div>
            @if ($produto->tamanho && $produto->tamanho != [null])
                <div class="row my-3">
                    <div class="col-md-3 mb-3">
                        <h2 class="h5">Tamanho:
                        </h2>

                    </div>



                    <div class="col-md-9 mb-3">
                        <select class="form-select" aria-label="Default select example">

                            @foreach ($produto->tamanho as $item)
                                <option value="1">{{ $item }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>
            @endif


            <div class="row my-3">
                @if ($produto->cor && $produto->cor != [null])
                    <div class="col-md-3 mb-3">
                        <h2 class="h5">Cor:
                        </h2>
                    </div>

                    <div class="col-md-9 mb-3">
                        <select class="form-select" aria-label="Default select example">

                            @foreach ($produto->cor as $item)
                                <option value="1">{{ $item }}</option>
                            @endforeach

                        </select>
                    </div>
                @endif

            </div>

            @if ($produto->descricao)

                @foreach ($produto->descricao as $item)
                    <div class="row my-3">
                        <div class="col-md-5 h5 mb-3">{{ json_decode($item)->titulo }}</div>
                        <div class="col-md-7 mb-3">
                            {!! json_decode($item)->conteudo !!}
                        </div>
                        <hr>
                    </div>
                @endforeach
            @endif



        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Galeria de Fotos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">



                        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                @foreach ($produto->gallery as $img)
                                    @if ($img == $produto->gallery[0])
                                        <div class="carousel-item active">
                                            <img src="{{ asset('storage/' . $img) }}" class="d-block w-100" alt="...">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/' . $img) }}" class="d-block w-100" alt="...">
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal2 -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <img src="{{ asset('storage/' . $produto->thumb) }}" alt="" class="img-fluid">
                    </div>



                </div>
            </div>
        </div>

    </div>
@endsection
