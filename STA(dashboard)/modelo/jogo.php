<?php

    class Jogo{
        private $id_jogo;
        private $nomeJogo;
        private $srcJogo;
        private $descricao;

        public function __construct(){
            $this->id_jogo = -1;
            $this->nomeJogo = "";
            $this->srcJogo = "";
            $this->descricao = "";
            $this->tipo = "";
        }

        public function getId_jogo(){
            return $this->id_jogo;
        }

        public function setId_jogo($id_jogo){
            $this->id_jogo = $id_jogo;
        }

        public function getNome(){
            return $this->nomeJogo;
        }

        public function setNome($nomeJogo){
            $this->nomeJogo = $nomeJogo;
        }

        public function getSrcJogo(){
            return $this->srcJogo;
        }

        public function setSrcJogo($srcJogo){
            $this->srcJogo = $srcJogo;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
    }
?>