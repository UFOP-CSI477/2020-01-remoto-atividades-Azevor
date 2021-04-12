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
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="#">Perfil</a></li>
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="{{ route('compras.index', 'orderBy=data_compra') }}">Relatorio</a></li>
                <li class="nav-item btn"><a onclick="fillBtn(this)" class="nav-link btn btn-outline-success"
                        href="#">Sair</a></li>
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
