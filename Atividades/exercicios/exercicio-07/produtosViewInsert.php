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

        <div class="plano-fundo">

            <div class="conteudo">

                <header>
                    <div class="btn btn-group">
                        <a href="index.php" class="btn btn-sm btn-outline-light">🏠</a>
                    </div>
                    <div class="jumbotron">
                        <h2 class="display-4 text-center">Cadastrar Produto</h2>
                    </div>
                </header>

                <main>
                    <div>
                        <form action="produtosControllerInsert.php" method="GET" onsubmit="return validar()">
                            <div class="form-group">
                                <label id="nomeLabel" for="nome" class="form-label">Nome do Produto</label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <label id="quantidadeLabel" for="quantidade" class="form-label">Quantidade</label>
                                <input type="text" name="quantidade" id="quantidade" class="form-control"
                                    onkeypress="formatar(this)">
                            </div>
                            <div class="form-group">
                                <label id="umLabel" for="um" class="form-label">Unidade de Medida</label>
                                <select class="form-select" id="um" name="um" aria-label="Default select example">
                                    <option value="" selected>&lt;Selecione&gt;</option>
                                    <option value="kg">Kg - Quilograma</option>
                                    <option value="oz">Oz - Onça</option>
                                    <option value="m">M - Metro</option>
                                    <option value="cm">Cm - Centímetro</option>
                                    <option value="l">L - Litro</option>
                                    <option value="pc">Pç - Peça (und)</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <div class="btn btn-group">
                                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                                </div>

                                <div class="btn btn-group">
                                    <input type="reset" class="btn btn-danger" value="Limpar">
                                </div>
                            </div>
                        </form>
                    </div>
                </main>

                <footer>
                    <div id="campo-alerta" class="alert alert-danger d-none text-center">
                        <span id="texto-alerta">Texto de advertência!</span>
                    </div>
                </footer>

            </div>
        </div>

    </div>

    <script type="text/javascript" src="./js/validar-campos.js"></script>
    <script type="text/javascript" src="./js/mascararInput.js"></script>

</body>

</html>