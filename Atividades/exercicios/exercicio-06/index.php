<!DOCTYPE html>
<html lang="br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Conexão com SqLite</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
</head>

<body>

    <div class="container">

        <header class="jumbotron">
            <h1 class="display-4 text-center">Tabela de Estados Brasileiros</h1>
        </header>

        <main>
        
        <div class="table-responsive">
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Estado</th>
                        <th scope="col">Sigla</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require './db/sqliteConfig.php';

                        $estados = $dbConnection->query('SELECT * FROM estados');

                        // var_dump($estados);

                        while($e = $estados->fetch()) {
                            echo '<tr><td>' . $e["nome"] . '</td><td>' . $e["sigla"] . '</td></tr>';
                        }
                    ?>
                </tbody>

                <tfoot></tfoot>
            </table>
        </div>

        </main>

        <footer></footer>

    </div>
    
</body>
</html>