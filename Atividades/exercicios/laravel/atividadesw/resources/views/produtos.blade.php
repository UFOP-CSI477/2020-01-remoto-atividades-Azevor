<!DOCTYPE html>
<html lang="br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style type="text/css">
        h1, caption {
            text-shadow: 2px 2px #a1a1a1;
            padding-top: 2%;
        }
        .table-responsive {
            width: 90%;
            margin: 0 auto;
        }
        .plano-fundo {
            background-color: #d3d3d3;
	        box-shadow: 3px 6px 8px 3px rgba(75, 75, 75, 0.3);
            border-radius: 10px;
            width: 60%;
            margin: 0 auto;
            margin-top: 3%;
        }
        .conteudo {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="plano-fundo">
            <header>
                <h1 class="display-6 text-center">Tabela de Produtos</h1>
            </header>
            <main>
                <div class="table table-responsive">
                    <table class="table table-hover table-striped table-light">
                        <caption>Tabela de Produtos</caption>
                        <head>
                            <tr class="table table-dark">
                                <th scope="col">Descrição</th>
                                <th scope="col">Estoque</th>
                                <th scope="col">Und</th>
                            </tr>
                        </head>
                        <tbody>
                            @foreach ($output as $dados)
                            <tr>
                                <td>{{ $dados->nome }}</td>
                                <td>{{ $dados->quantidade }}</td>
                                <td>{{ $dados->um }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </main>
            <footer></footer>
        </div>
    </div>
</body>
</html>