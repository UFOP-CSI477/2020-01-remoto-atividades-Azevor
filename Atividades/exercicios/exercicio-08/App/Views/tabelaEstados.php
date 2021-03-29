<div class="table table-responsive">

    <table class="table table-hover table-striped table-light">

        <caption>Tabela: Lista de Estados</caption>
        <head>
            <tr class="table table-dark">
                <th scope="col">Estado</th>
                <th scope="col">UF</th>
            </tr>
        </head>

        <tbody>

            <?php
                use App\Controller\EstadoController;

                $estadoController = new EstadoController();
                $estados = $estadoController->getEstados();

                foreach($estados as $estado) {
                    echo '<tr><td>' . $estado["nome"] . '</td><td>' . $estado["sigla"] . '</td></tr>';
                }
            ?>

        </tbody>

        <tfoot></tfoot>

    </table>

</div>