<div class="table table-responsive">

    <table class="table table-hover table-striped table-light">

        <caption>Tabela: Lista de Produtos</caption>
        <head>
            <tr class="table table-dark">
                <th scope="col">Descrição</th>
                <th scope="col">Estoque</th>
            </tr>
        </head>

        <tbody>

            <?php
                use App\Controller\ProdutoController;

                $produtoController = new ProdutoController();
                $produtos = $produtoController->getProdutos();

                foreach($produtos as $produto) {
                    echo '<tr><td>' . $produto["nome"] . '</td><td>' . $produto["quantidade"] . ' ' . $produto["um"] . '</td></tr>';
                }
            ?>

        </tbody>

        <tfoot></tfoot>

    </table>

</div>