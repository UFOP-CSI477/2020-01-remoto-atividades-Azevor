<?php

    namespace App\Controller;
    use App\Database\Connection;
    use App\Database\AdapterSQLite;

    class ProdutoController {
        private $listaProdutos;

        public function __construct() {
            $listaProdutos = array();
        }

        private function loadData() {
            $connection = new Connection(new AdapterSQLite());
            $connection->getAdapter()->open();
            return $connection;
        }

        public function getProdutos() {
            $connection = $this->loadData();
            $tables = $connection->getAdapter()->get();
            $connection->getAdapter()->close();
            return $tables->query("SELECT * FROM produtos")->fetchAll();
        }
    }
?>