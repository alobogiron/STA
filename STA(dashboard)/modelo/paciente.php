<?php

    class Paciente{
        private $id_paciente;
        private $nomePaciente;
        private $cpf;
        private $nascimento;
        private $telefone;
        private $celular;
        private $email;
        private $nomePai;
        private $nomeMae;
        private $contatoPai;
        private $contatoMae;
        private $cidade;
        private $estado;
        private $pais;
        private $rua;
        private $bairro;
        private $numero;
        private $cep;
        private $complemento;
        private $dtPrimeiroCadastro;
        private $statusPaciente;

        public function __construct(){
            $this->id_paciente = -1;
            $this->nomePaciente = "";
            $this->cpf = "";
            $this->nascimento = "";
            $this->telefone = "";
            $this->celular = "";
            $this->email = "";
            $this->nomePai = "";
            $this->nomeMae = "";
            $this->contatoPai = "";
            $this->contatoMae = "";
            $this->cidade = "";
            $this->estado = "";
            $this->pais = "";
            $this->rua = "";
            $this->bairro = "";
            $this->numero = "";
            $this->cep = "";
            $this->complemento = "";
            $this->dtPrimeiroCadastro = "";
            $this->statusPaciente = "";
        }

        public function getId_paciente(){
            return $this->id_paciente;
        }

        public function setId_paciente($id_paciente){
            $this->id_paciente = $id_paciente;
        }

        public function getNome(){
            return $this->nomePaciente;
        }

        public function setNome($nomePaciente){
            $this->nomePaciente = $nomePaciente;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getNascimento(){
            return $this->nascimento;
        }

        public function setNascimento($nascimento){
            $this->nascimento = $nascimento;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getNomePai(){
            return $this->nomePai;
        }

        public function setNomePai($nomePai){
            $this->nomePai = $nomePai;
        }

        public function getNomeMae(){
            return $this->nomeMae;
        }

        public function setNomeMae($nomeMae){
            $this->nomeMae = $nomeMae;
        }

        public function getContatoPai(){
            return $this->contatoPai;
        }

        public function setContatoPai($contatoPai){
            $this->contatoPai = $contatoPai;
        }

        public function getContatoMae(){
            return $this->contatoMae;
        }

        public function setContatoMae($contatoMae){
            $this->contatoMae = $contatoMae;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function getPais(){
            return $this->pais;
        }

        public function setPais($pais){
            $this->pais = $pais;
        }

        public function getRua(){
            return $this->rua;
        }

        public function setRua($rua){
            $this->rua = $rua;
        }

        public function getBairro(){
            return $this->bairro;
        }

        public function setBairro($bairro){
            $this->bairro = $bairro;
        }

        public function getNumero(){
            return $this->numero;
        }

        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function getCep(){
            return $this->cep;
        }

        public function setCep($cep){
            $this->cep = $cep;
        }

        public function getComplemento(){
            return $this->complemento;
        }

        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }

        public function getDtPrimeiroCadastro(){
            return $this->dtPrimeiroCadastro;
        }

        //public function setDtPrimeiroCadastro($dtPrimeiroCadastro){
          //  $this->dtPrimeiroCadastro = $dtPrimeiroCadastro;
        //}

        public function getStatusPaciente(){
            return $this->statusPaciente;
        }

        public function setStatusPaciente($statusPaciente){
            $this->statusPaciente = $statusPaciente;
        }
    }
?>