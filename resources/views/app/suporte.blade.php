@extends('layouts.app')
@section('titulo', 'Suporte e Garantia')

@php
    $teste = true;
@endphp
@section('valida', $teste)


@section('content')
    <div class="container suporte">


        <h1>Suporte e Garantia</h1>
        <div class=" flex-row suporte-nav">
            <a href="#garantia">Garantia</a>
            <a href="#perguntas">Perguntas Frequentes</a>
            <a href="#manuais">Manuais</a>
            <a href="#suporte">Solicitar Suporte</a>
        </div>

        <div class="suporte-garantia" id="garantia">
            <h2>
                Garantia
            </h2>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?
            </p>

        </div>
        <div class="suporte-perguntas " id="perguntas">
            <h2>
                Perguntas Frequentes
            </h2>
            <div class="button-top d-flex justify-content-center">
                <h4>Como faço para encontrar as bikes Goodnine?</h4>
            </div>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Debitis veritatis quae, ab atque voluptates hic
                porro assumenda sint ipsam, saepe tempora. Optio accusamus sunt
                nisi pariatur. Accusantium impedit sunt
                itaque?
            </p>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Como faço para encontrar as bikes goodnine?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It's also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Como faço para encontrar as bikes goodnine?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It's also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Como faço para encontrar as bikes goodnine?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These classes
                            control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                            modify any of this with custom CSS or overriding our default variables. It's also worth noting
                            that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                            does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="suporte-manuais" id="manuais">
            <h2>
                Manuais
            </h2>
            <div class="row my-3">
                <div class="col-5 col-md-3">
                    <img class="img-fluid" src="{{ asset('img/icone-pdf.png') }}" alt="foto de uma bicicleta">
                    <h4>Lorem, ipsum </h4>
                </div>
                <div class="col-5 col-md-3">
                    <img class="img-fluid" src="{{ asset('img/icone-pdf.png') }}" alt="foto de uma bicicleta">
                    <h4>Lorem, ipsum </h4>
                </div>
                <div class="col-5 col-md-3">
                    <img class="img-fluid" src="{{ asset('img/icone-pdf.png') }}" alt="foto de uma bicicleta">
                    <h4>Lorem, ipsum </h4>
                </div>
                <div class="col-md-3 col-5">
                    <img class="img-fluid" src="{{ asset('img/icone-pdf.png') }}" alt="foto de uma bicicleta">
                    <h4>Lorem, ipsum </h4>
                </div>


            </div>
        </div>
        <div class="suporte-solicitar" id="suporte">
            <h2>
                Solicitar Suporte
            </h2>
            <p>
                Caso ainda precise falar sobre algum problema com sua bike, preencha os campos abaixo e descreva o caso na
                caixa de mensagem.

            </p>
            <div class="suporte-solicitar-form">

                @if ($errors->any())
                    <div class="container">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger row col-md-6 " role="alert">
                                {{ $error }}
                            </div>
                        @endforeach

                    </div>

                @endif
                <form class="form-row" action="{{ route('suporte.store') }}" method="post">
                    @csrf
                    <h3>
                        Dados Pessoais:
                    </h3>
                    <input class="form-control mb-3 " type="name" name="nome" value="{{ old('nome') }}"
                        placeholder="Nome">
                    <input class="form-control mb-3" type="tel" name="telefone" value="{{ old('telefone') }}"
                        placeholder="Telefone">
                    <input class="form-control mb-3" type="email" name="email" value="{{ old('email') }}"
                        placeholder="Email:">
                    <h3>
                        Dados da Bike:
                    </h3>
                    <input type="text" class="form-control mb-3" name="modelo_bike" value="{{ old('modelo_bike') }}"
                        placeholder="Modelo da Bike">
                    <input type="text" class="form-control mb-3" name="numero_serie"
                        value="{{ old('numero_serie') }}" placeholder="Número de Série do Quadro">
                    <input type="text" class="form-control mb-3" name="nota_fiscal" value="{{ old('nota_fiscal') }}"
                        placeholder="Número da Nota Fiscal">
                    <input type="text" class="form-control mb-3" name="nome_revenda"
                        value="{{ old('nome_revenda') }}" placeholder="Nome da Revenda">
                    <input type="text" name="data_compra" class="form-control mb-3" value="{{ old('data_compra') }}"
                        placeholder="Data de compra da bike (o mesmo que consta na nota fiscal)">
                    <textarea rows="4" cols="50" name="assunto" value="{{ old('assunto') }}" class="form-control mb-3"
                        maxlength="2000" placeholder="Descreva sua solicitação"></textarea>
                    <div class="d-flex justify-content-center">
                        <button class="btn button">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
