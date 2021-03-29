<?php

    namespace App\Model;

    interface ModelInterface {

        public function getAll();
        public function get($id);
    }