<!DOCTYPE html>
<html lang="br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
</head>

<body>

    <div class="container">

        <header>
            <div class="jumbotron">
                <h1 class="display-5 text-center">Tabela de Produtos</h1>
            </div>
        </header>

        <main>

            <div class="table-responsive">
                <table class="table table-success table-striped table-hover">

                    <tr>
                        <th scope="col">Produto</th>
                        <th scope="col">Qte</th>
                        <th scope="col">Und.</th>
                    </tr>

                    <?php
                        require "config.php";

                        $produtos = $connection->query("SELECT * FROM produtos");
                        
                        while($p = $produtos->fetch()) {
                            echo '<tr><td>' . $p["nome"] . '</td><td>' . $p["quantidade"] . '</td><td>' . $p["um"] . '</td></tr>';
                        }
                    ?>

                </div>
            </table>

            <div class="btn btn-group">
                <a href="produtosViewInsert.php" class="btn btn-primary">Inserir Produto</a>
            </div>

        </main>

        <footer></footer>

    </div>

</body>

</html>