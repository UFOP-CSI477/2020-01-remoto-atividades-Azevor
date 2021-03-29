<!DOCTYPE html>
<html lang="br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO e Autoloader</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="./css/estilo.css">
</head>

<body>
    <div class="container">
        <div class="plano-fundo">
            <header>
                <h1 class="display-6 text-center">Tabela: Estados e Produtos</h1>
            </header>

            <main>
                <?php
                    require '../vendor/autoload.php';

                    include '../App/Views/tabelaEstados.php';
                    include '../App/Views/tabelaProdutos.php';
                ?>
            </main>

            <footer></footer>
        </div>
    </div>
</body>

</html>