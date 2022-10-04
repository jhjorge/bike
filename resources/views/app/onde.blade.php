@extends('layouts.app')
@section('titulo', 'Onde comprar')


@section('content')

<div class="img-fluid banner-container">
    <img src="{{ asset('img/banner-encontre.jpg') }}" alt="foto de uma bicicleta">
</div>
<div class="container justify-content-center onde-content">
    <div class="row onde-title">
        <h1>
            Digite o <b>nome da sua cidade ou navegue
                pelo mapa</b> para encontrar a loja mais próxima de você
        </h1>
    </div>
    <form class="row form-group">
        <label for="form-label selectCity" class="text-center col-sm-3 form-label label-search">Pesquise sua
            cidade</label>
        <div class="col-sm-8">
            <select name="selectCity" class="form-control" id="selectCity">
                <option value="valor1" selected hidden>Nome da Cidade</option>
                <option value="valor1">Valor 1</option>
                <option value="valor2">Valor 2</option>
                <option value="valor3">Valor 3</option>
            </select>
        </div>
    </form>
    <div class="row onde-pesquise">
        <h2>
            Pesquise em um raio de:
        </h2>
        <div class="d-flex justify-content-end">
            <button class="button-encontre">Buscar</button>
        </div>
    </div>
    <div class="onde-map row">
        <div class="row map-responsive justify-content-center">

            <iframe src="https://www.google.com.br/maps/@-14.239424,-53.186502,4z" width="600" height="450"
                frameborder="0" style="border:0" allowfullscreen></iframe>

            <div class="row col-md-10 d-flex justify-content-center onde-information">
                <div class="col-md-6 justify-content-end">
                    <h2>
                        Nome da Loja
                    </h2>
                    <div>
                        <i class=" bi bi-geo-alt-fill "></i>
                        <h3>Endereço:</h3>
                        <p>Rua Lorel Impum</p>
                        <i class="bi bi-telephone-fill "></i>
                        <h3>Telefone:</h3>
                        <p>(00) 0000 0000</p>

                    </div>
                </div>
                <div class="col-md-6 justify-content-end">
                    <h2>
                        Nome da Loja
                    </h2>
                    <div class="">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h3>Endereço:</h3>
                        <p>Rua Lorel Impum</p>
                        <i class="bi bi-telephone-fill "></i>
                        <h3>Telefone:</h3>
                        <p>(00) 0000 0000</p>

                    </div>
                </div>
            </div>
        </div>



        @endsection