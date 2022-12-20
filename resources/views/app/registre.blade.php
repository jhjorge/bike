@extends('layouts.app')
@section('titulo', 'Registre sua Bike')
@php
    $teste = true;
@endphp
@section('valida', $teste)


@section('content')

    @if ($errors->any())
        <div class="container my-2">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger row col-md-6 " role="alert">
                    {{ $error }}
                </div>
            @endforeach

        </div>

    @endif
    <form action="{{ route('registroBike.store') }}" method="post" class="container form-group my-4">
        @csrf
        <h1 class="my-4">Registre sua bike</h1>
        <h2 class="my-4">
            Dados do comprador
        </h2>

        <input class="form-control my-2" type="text" name="nome" value="{{ old('nome') }}"
            placeholder="Informe seu nome:">
        <input class="form-control my-2" type="email" name="email" value="{{ old('email') }}" placeholder="Seu email:">
        <input class="form-control my-2" type="text" name="telefone" value="{{ old('telefone') }}"
            placeholder="Telefone:">

        <div class="d-flex input-group align-items-center col-5 my-2 ">
            <div class="form-check form-check-inline col-sm-2 col-md-1">
                <input class="form-check-input" type="radio" name="" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">CPF</label>
            </div>
            <div class="form-check form-check-inline col-sm-2 col-md-1">
                <input class="form-check-input" type="radio" name="" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">CNPJ</label>
            </div>
            <input type="text" name="documento" value="{{ old('documento') }}" class="form-control my-2">
        </div>
        <input class="form-control my-2" type="text" name="rua" value="{{ old('rua') }}" placeholder="Rua:">
        <div class="my-2 row">
            <div class="col-sm-8 mx-0 my-2">
                <input type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" placeholder="Bairro:">
            </div>
            <div class="col-sm-4 mx-0 my-2">
                <input type=" text" class="form-control" name="numero" value="{{ old('numero') }}" placeholder="Número:">
            </div>
        </div>
        <div class="my-2 row ">
            <div class="col-sm-8 mx-0 my-2">
                <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" placeholder="Cidade:">
            </div>
            <div class="col-sm-4 my-2 mx-0">
                <input type=" text" class="form-control" name="estado" value="{{ old('estado') }}"
                    placeholder="Estado:">
            </div>
        </div>
        <div class="my-2 row">
            <div class="col-sm-5 my-2 mx-0">
                <input type="text" class="form-control" name="cep" value="{{ old('cep') }}" placeholder="CEP">
            </div>
            <div class="col-sm-3 mx-0 my-2">
                <input type=" text" class="form-control" name="nascimento" value="{{ old('nascimento') }}"
                    placeholder="Data de Nascimento">
            </div>
        </div>
        <h2>
            Dados da Bike
        </h2>
        <div class="my-2 row">
            <div class="col-md-2 my-2 mx-0">
                <input type="text" class="form-control" name="modelo_bike" value="{{ old('modelo_bike') }}"
                    placeholder="Modelo da Bike">
            </div>
            <div class="col-md-5 mx-0 my-2">
                <input type=" text" class="form-control" name="numero_serie" value="{{ old('numero_serie') }}"
                    placeholder="Número de Série do Quadro">
            </div>
            <div class="col-md-5 mx-0 my-2">
                <input type=" text" class="form-control" name="nota_fiscal" value="{{ old('nota_fiscal') }}"
                    placeholder="Número da Nota Fiscal">
            </div>
        </div>
        <div class="my-2 row">
            <div class="col-md my-2 mx-0">
                <input type="text" class="form-control" name="nome_revenda" value="{{ old('nome_revenda') }}"
                    placeholder="Nome da Revenda">
            </div>
            <div class="col-md my-2 mx-0">
                <input type=" text" class="form-control"name="data_compra" value="{{ old('data_compra') }}"
                    placeholder="Data de compra da Bike (o mesmo que consta na nota fiscal)">
            </div>
        </div>
        <h2 class="my-4">
            Termos da Garantia
        </h2>
        <textarea rows="8" class="form-control my-4" readonly>
        Lorem ipsum dolor sit amet,
         consectetur adipiscing elit. Duis vitae sem justo. In tincidunt tincidunto
         dio in tincidunt. Suspendisse eros metus, ultricies eu aliquam non, aliquam sed erat. Proin vel
        lorem quis diam elementum pharetra. Nunc eget facilisis sem, ac ullamcorper tellus. Vestibulum varius
        arcu vitae massa venenatis, in dignissim nibh tincidunt. In ante nunc, sollicitudin a commodo ut,
        consectetur consequat sem. Donec viverra luctus massa et cursus. In venenatis
        tellus ac massa maximus pellentesque. Mauris vestibulum mattis massa. Fusce dapibus,
        leo eget ultricies tincidunt, risus massa volutpat purus, vel scelerisque nunc risus lobortis felis.
        Aliquam eget lorem sed sapien dignissim vulputate. Lorem ipsum dolor sit amet,
        consectetur adipiscing elit. Donec ultrices id nisi vitae venenatis. Suspendisse libero libero,
        suscipit at vulputate quis, consectetur vel lectus.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae sem justo.
        In tincidunt tincidunt odio in tincidunt. Suspendisse eros metus, ultricies eu aliquam non,
        aliquam sed erat. Proin vel lorem quis diam elementum pharetra. Nunc eget facilisis sem,
        ac ullamcorper tellus. Vestibulum varius arcu vitae massa venenatis, in dignissim nibh tincidunt.In ante nunc,
        sollicitudin a commodo ut, consectetur consequat sem. Donec viverra luctus massa et
        cursus. In venenatis tellus ac massa maximus pellentesque. Mauris vestibulum mattis massa.
        Fusce dapibus, leo eget ultricies tincidunt, risus massa volutpat purus, vel scelerisque nunc risus
        lobortis felis. Aliquam eget lorem sed sapien dignissim vulputate. Lorem ipsum dolor sit amet,
        consectetur adipiscing elit. Donec ultrices id nisi vitae venenatis. Suspendisse libero libero,
        suscipit at vulputate quis, consectetur vel lectus.
    </textarea>
        <div class="form-check my-4">
            <input class="form-check-input" type="radio" required id="exampleRadios1" required value="option1">
            <label class="form-check-label" for="exampleRadios1">
                concordo com os termos de garantia
            </label>
        </div>
        <div class="d-flex justify-content-center my-4">
            <button class="button-contato btn button">Registrar</button>
        </div>
    </form>


@endsection
