<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css') }}">
    <title>@yield('titulo')</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="mt-3">
                        <a href="{{ route('index') }}" class="nav-link text-success">
                            <img id="icone-titulo" src="{{ asset('img/tekton-jlY6nV_STIw-unsplash.jpg') }}"
                                class="img img-fluid">
                            <h1 class="display-6 titulo">Manuteq</h1>
                            <p id="sub-titulo">Manutenção de Equipamentos em Geral</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 mt-4">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Início</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('equipamentos.index') }}">
                                    @guest
                                        Área Geral
                                    @else
                                        Editar dados
                                    @endguest
                                </a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    @if (Route::has('login'))
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Área Administrativa') }}
                                        </a>
                                    @endif
                                </li>
                            @endguest
                            <div class="border bg-light d-flex">
                                @guest
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link text-secondary"
                                                href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item text-primary text-center" href="{{ route('users.index') }}">
                                                {{ __('Usuários') }}
                                            </a>
                                            <a class="dropdown-item text-primary text-center" href="{{ route('logout') }}" 
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Sair') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </header>
    <main>
        <div class="text-center container">
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
        @yield('main-conteudo')
    </main>
    <footer></footer>
    <script type="text/javascript" src="{{ asset('js/validarCampos.js') }}"></script>
</body>

</html>
