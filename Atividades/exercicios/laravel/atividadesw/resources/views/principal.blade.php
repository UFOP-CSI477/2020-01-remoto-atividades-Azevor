<!DOCTYPE html>
<html lang="br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        <header class="jumbotron">
            <h1>GTsys</h1>
            <ul class="nav">
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="{{ route('index') }}">Home</a></li>
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="{{ route('pessoas.index') }}">Pessoas</a></li>
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="{{ route('estados.index') }}">Estados</a></li>
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="{{ route('cidades.index') }}">Cidades</a></li>
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="{{ route('produtos.index', 'orderBy=id') }}">Produtos</a></li>
                {{-- <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="#">Perfil</a></li> --}}
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="{{ route('compras.index', 'orderBy=data_compra') }}">Relatorio</a></li>
                {{-- <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="#">Sair</a></li> --}}

                <!-- Authentication Links -->
                <div class="text-right">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item btn">
                                <a class="nav-link btn btn-secondary" href="{{ route('login') }}"
                                    style="border: 1px solid #1e7e1e;">{{ __('Entrar') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item btn">
                                <a class="nav-link btn btn-secondary" href="{{ route('register') }}"
                                    style="border: 1px solid #1e7e1e">{{ __('Registrar') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item btn dropdown">
                            <a id="navbarDropdown" class="nav-link btn btn-outline-success dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>

            </ul>
            <hr>
        </header>
        <main>
            <div>
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
                <!-- CONTEÚDO DO CORPO DA PÁGINA -->
                @yield('conteudo')
            </div>
        </main>
        <footer></footer>
    </div>
</body>

</html>
