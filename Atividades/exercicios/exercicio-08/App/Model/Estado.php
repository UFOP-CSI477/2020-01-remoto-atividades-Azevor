<?php

    namespace App\Model;

    class Estado implements ModelInterface {
        private $id;
        private $nome;
        private $sigla;

        public function __construct($id, $nome, $sigla) {
            $this->id = $id;
            $this->nome = $nome;
            $this->sigla = $sigla;
        }

        public function __destruct() {}
    
        public function getAll() {
            // $dados = array();
            // $dados["id"] = $this->id;
            // $dados["nome"] = $this->nome;
            // $dados["sigla"] = $this->sigla;
            // return $dados;
            return [$this->id, $this->nome, $this->sigla];
        }

        public function get($id) {
            return [$nome, $sigla];
        }
    }
