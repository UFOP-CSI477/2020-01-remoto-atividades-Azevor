<!DOCTYPE html>
<html lang="br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Principal</title>
</head>

<body>
    <div class="container">

        <header>
            <h1>Universo</h1>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Pessoas</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Estados</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Cidades</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('produtos.index', 'orderBy=id') }}">Produtos</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Perfil</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Relatorio</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Sair</a></li>
            </ul>
            <hr>
        </header>

        <main>
            <div>
                <div class="text-center">
                    {{-- Mensagem de retorno --}}
                    @if (session('mensagem'))
                        <div class="alert alert-success text-center">
                            {{ session('mensagem') }}
                        </div>
                    @endif
                </div>
                <!-- CONTEÚDO DA TABELA -->
                @yield('conteudo')
            </div>
        </main>

        <footer></footer>

    </div>
</body>

</html>
