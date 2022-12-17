<?php

    class Sessao{
        private $id_sessao;
        private $fk_id_profissional;
        private $fk_id_paciente;
        private $dataSessao;
        private $statusSessao;
        private $codSessao;

        public function __construct(){
            $this->id_sessao = -1;
            $this->fk_id_profissional = "";
            $this->fk_id_paciente = "";
            $this->dataSessao = "";
            $this->statusSessao = "";
            $this->codSessao = "";
        }

        public function getId_sessao(){
            return $this->id_sessao;
        }

        public function setId_sessao($id_sessao){
            $this->id_sessao = $id_sessao;
        }

        public function getFk_id_profissional(){
            return $this->fk_id_profissional;
        }

        public function setFk_id_profissional($fk_id_profissional){
            $this->fk_id_profissional = $fk_id_profissional;
        }

        public function getFk_id_paciente(){
            return $this->fk_id_paciente;
        }

        public function setFk_id_paciente($fk_id_paciente){
            $this->fk_id_paciente = $fk_id_paciente;
        }

        public function getDataSessao(){
            return $this->dataSessao;
        }

        public function setDataSessao($dataSessao){
            $this->dataSessao = $dataSessao;
        }

        public function getStatusSessao(){
            return $this->statusSessao;
        }

        public function setStatusSessao($statusSessao){
            $this->statusSessao = $statusSessao;
        }

        public function getCodSessao(){
            return $this->codSessao;
        }

        public function setCodSessao($codSessao){
            $this->codSessao = $codSessao;
        }
    }
?>