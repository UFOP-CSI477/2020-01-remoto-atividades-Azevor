<?php

    namespace App\Database;
    use PDO;

    class AdapterSQLite implements AdapterInterface {
        private $dbConnection;

        public function open() {
            $pathSQLite = "sqlite:" . "../App/Database/SQLite/database.sqlite";
            $this->dbConnection = new PDO($pathSQLite, "", "");
        }

        public function close() {
            unset($this->dbConnection);
        }

        public function get() {
            return $this->dbConnection;
        }
    }