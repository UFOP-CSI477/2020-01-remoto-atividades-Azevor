<?php

    namespace App\Model;

    class Produto implements ModelInterface {
        private $cod;
        private $nome;
        private $quantidade;
        private $um;

        public function __construct($cod, $nome, $quantidade, $um) {
            $this->cod = $cod;
            $this->nome = $nome;
            $this->quantidade = $quantidade;
            $this->um = $um;
        }

        public function __destruct() {}
    
        public function getAll() {}

        public function get($cod) {}
    }