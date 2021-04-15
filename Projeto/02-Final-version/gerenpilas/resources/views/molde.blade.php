<!DOCTYPE html>
<html lang="br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            {{-- IMPORTAÇÃO DOS ARQUIVOS JS APRESENTANDO MSG DE ERRO NO CONSOLE --}}
    {{-- <script type="text/javascript" src={{ asset('js/bootstrap-4.6.0.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/jquery-3.5.1.slim.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/popper-1.16.1.min.js') }}></script> --}}
            {{-- IMPORTAR PELO CDN PARA FUNCIONALIDADE DE LOGOUT LARAVEL --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href={{ asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <header>
        <div id="menu-barra">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <div>
                        <a class="navbar-brand text-success font-title" href="{{ route('index') }}">GerenPilas</a>
                    </div>
                    <div class="text-end">
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-outline-success mx-1"
                                            href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-outline-success"
                                            href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-outline-success" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="principal">
        <div class="text-center">
            {{-- MENSAGENS DE AVISO/ALERTA --}}
            @if (session('msg-success'))
                <div class="alert alert-success text-center">
                    {{ session('msg-success') }}
                </div>
            @endif
            @if (session('msg-danger'))
                <div class="alert alert-danger text-center">
                    {{ session('msg-danger') }}
                </div>
            @endif
        </div>
        @yield('conteudo')
    </main>

    <footer></footer>

    <script type="text/javascript" src={{ asset('js/validarFormulario.js') }}></script>
    <script type="text/javascript" src={{ asset('js/mascararInput.js') }}></script>

</body>

</html>
