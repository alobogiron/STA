<?php

    class Tentativa{
        private $id_tentativa;
        private $dtInicioTentativa;
        private $dtFimTentativa;
        private $scoreTentativa;
        private $statusTentativa;
        private $fk_id_sessao;
        private $fk_id_jogo;

        public function __construct(){
            $this->id_tentativa = -1;
            $this->fk_id_jogo = "";
        }

        public function getId_tentativa(){
            return $this->id_tentativa;
        }

        public function setId_tentativa($id_tentativa){
            $this->id_tentativa = $id_tentativa;
        }

        public function getDtInicioTentativa(){
            return $this->dtInicioTentativa;
        }

        public function setDtInicioTentativa($dtInicioTentativa){
            $this->dtInicioTentativa = $dtInicioTentativa;
        }

        public function getDtFimTentativa(){
            return $this->dtFimTentativa;
        }

        public function setDtFimTentativa($dtFimTentativa){
            $this->dtFimTentativa = $dtFimTentativa;
        }

        public function getScoreTentativa(){
            return $this->scoreTentativa;
        }

        public function setScoreTentativa($scoreTentativa){
            $this->scoreTentativa = $scoreTentativa;
        }

        public function getStatusTentativa(){
            return $this->statusTentativa;
        }

        public function setStatusTentativa($statusTentativa){
            $this->statusTentativa = $statusTentativa;
        }

        public function getFk_id_sessao(){
            return $this->fk_id_sessao;
        }

        public function setFk_id_sessao($fk_id_sessao){
            $this->fk_id_sessao = $fk_id_sessao;
        }

        public function getFk_id_jogo(){
            return $this->fk_id_jogo;
        }

        public function setFk_id_jogo($fk_id_jogo){
            $this->fk_id_jogo = $fk_id_jogo;
        }
    }
?>