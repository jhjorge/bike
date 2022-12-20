@extends('layouts.app')
@section('titulo', 'Fale Conosco')
@php
    $teste = true;
@endphp
@section('valida', $teste)



@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="container my-2">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger col-md-2 m-1 " role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            </div>

        @endif

        <div class="row mt-4">
            <h1>Fale Conosco</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Nisi nostrum magni recusandae excepturi
                exercitationem! Nisi repudiandae praesentium,
                impedit sed aperiam magnam laboriosam ducimus, expedita
                ratione dolores ut deleniti quas dolorum?</p>
        </div>
        <form class="form-row" action="{{ route('contato.store') }}" method="post">
            @csrf


            <div class="form-check  form-check-inline mb-3">
                <input class="form-check-input" type="radio" name="tipo_cliente" value="Sou consumidor" id="inlineRadio1"
                    value="option1">
                <label class="form-check-label" for="inlineRadio1">Sou consumidor Final</label>

            </div>
            <div class="form-check form-check-inline  mb-3">
                <input class="form-check-input" type="radio" name="tipo_cliente" id="inlineRadio2" value="Sou lojista">
                <label class="form-check-label" for="inlineRadio2">Sou lojista</label>
            </div>

            <input type="text" class="form-control mb-3" name="nome" value="{{ old('nome') }}"
                placeholder="informe o seu nome: ">

            <input type="text" class="form-control mb-3" name="email" value="{{ old('email') }}"
                placeholder="Seu email: ">
            <input type="text" class="form-control mb-3" name="telefone" value="{{ old('telefone') }}"
                placeholder="Telefone: ">
            <input type="text" class="form-control mb-3" name="documento" value="{{ old('documento') }}"
                placeholder="CNPJ: ">
            <div class="row mb-3">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="cidade" value="{{ old('cidade') }}"
                        placeholder="Cidade: ">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control " name="estado" value="{{ old('estado') }}"
                        placeholder="Estado: ">
                </div>
            </div>

            <textarea rows="4" cols="50" class="form-control mb-3" name="assunto" value="{{ old('assunto') }}"
                maxlength="2000" placeholder="Descreva sua solicitação"></textarea>
            <div class="d-flex justify-content-center">
                <button class="button-contato btn button">Enviar</button>
            </div>
        </form>
    </div>



@endsection
