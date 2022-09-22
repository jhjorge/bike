<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Goodnine - @yield('titulo')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.sass', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="top-menu">
            <div class="top-menu-navigation">
                <a href=" {{route('sobre')}}">Sobre</a>
                <a href="{{route('suporte')}}">Suporte e garantia</a>
                <a href="{{route('blog')}}">Blog</a>
                <a href="{{route('eventos')}}">Eventos</a>
                <a href="{{route('ondeComprar')}}">Onde Comprar</a>
                <a href="{{route('contato')}}">Fale conosco</a>
                <a href="{{route('registroBike')}}">Registre sua bike</a>

            </div>
            <div class="top-menu-social-midia">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-whatsapp"></i>
            </div>
        </div>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a href="{{route('home')}}">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="nav-brand">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto navigation">
                        <p class="m-2">bikes</p>
                        <p class="m-2">acessórios</p>
                        <p class="m-2">componentes</p>
                        <p class="m-2">vestuário</p>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto search">
                        <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>

                </div>
        </nav>

        <main>
            @yield('content')
        </main>
        <footer>
            <div class="footer-navigation">
                <a href=" {{route('sobre')}}">Sobre</a>
                <a href=" {{route('suporte')}}">Suporte e garantia</a>
                <a href=" {{route('ondeComprar')}}">onde comprar</a>
                <a href=" {{route('registroBike')}}">registre sua bike</a>
            </div>
            <div class="footer-social">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-whatsapp"></i>
            </div>
            <div class="footer-span">
                <span> &copy2022 - goodnine| todos os direitos reservados - desenvolvido por </span>
            </div>

        </footer>
    </div>
</body>

</html>