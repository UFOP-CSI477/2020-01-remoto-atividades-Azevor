<?php

    namespace App\Model;

    class Cidade implements ModelInterface {
        private $id;
        private $nome;

        public function __construct($id, $nome) {
            $this->id = $id;
            $this->nome = $nome;
        }

        public function __destruct() {}
    
        public function getAll() {}

        public function get($id) {}
    }