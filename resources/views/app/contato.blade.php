@extends('layouts.app')
@section('titulo', 'Fale Conosco')


@section('content')

<div class="container">
    <div class="row mt-4">
        <h1>Fale Conosco</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Nisi nostrum magni recusandae excepturi
            exercitationem! Nisi repudiandae praesentium,
            impedit sed aperiam magnam laboriosam ducimus, expedita
            ratione dolores ut deleniti quas dolorum?</p>
    </div>
    <div class="row container-fluid col-6 my-4 ">

        <div class="form-check form-check-inline col-sm-5">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Sou consumidor Final</label>
        </div>
        <div class="form-check form-check-inline col-sm-4">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Sou lojista</label>
        </div>
    </div>
    <div class="row my-4">
        <form>
            <div class="col my-4">
                <input type="text" class="form-control" placeholder="informe o seu nome: ">
            </div>
            <div class="col my-4">
                <input type="text" class="form-control" placeholder="Seu email: ">
            </div>
            <div class="col my-4">
                <input type="text" class="form-control" placeholder="Telefone: ">
            </div>
            <div class="col my-4">
                <input type="text" class="form-control" placeholder="CNPJ: ">
            </div>
            <div class="row ">
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="Cidade: ">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Estado: ">
                </div>
            </div>
            <textarea rows="4" cols="50" class="my-4 form-control" maxlength="2000"
                placeholder="Descreva sua solicitação"></textarea>
            <div class="d-flex justify-content-center">
                <button class="button-contato btn button">Enviar</button>
            </div>
        </form>
    </div>
</div>

@endsection