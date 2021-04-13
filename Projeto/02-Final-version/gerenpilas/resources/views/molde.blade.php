<!DOCTYPE html>
<html lang="br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src={{ asset('js/bootstrap-4.6.0.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/jquery-3.5.1.slim.min.js') }}></script>
    <script type="text/javascript" src={{ asset('js/popper-1.16.1.min.js') }}></script>
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
                        <a href="#" class="btn btn-outline-success">Entrar</a>
                        <a href="#" class="btn btn-outline-success">Registrar</a>
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
</body>

</html>
