<?php

    namespace App\Controller;
    use App\Database\Connection;
    use App\Database\AdapterSQLite;

    class EstadoController {
        private $listaEstados;

        public function __construct() {
            $listaEstados = array();
        }

        private function loadData() {
            $connection = new Connection(new AdapterSQLite());
            $connection->getAdapter()->open();
            return $connection;
        }

        public function getEstados() {
            $connection = $this->loadData();
            $tables = $connection->getAdapter()->get();
            $connection->getAdapter()->close();
            return $tables->query("SELECT * FROM estados")->fetchAll();
        }
    }
?>