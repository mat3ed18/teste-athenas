<?php
    include 'categoria.php';

    class Pessoa {
        private $codigo;
        private $nome;
        private $categoria;

        public function __construct($codigo, $nome, $categoria) {
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->categoria = $categoria;
        }

        public function getCodigo() {
            return $this->codigo;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getCategoria() {
            return $this->categoria;
        }

        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

    }
