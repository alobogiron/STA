<?php

    class Profissional{
        private $id_profissional;
        private $nomeProfissional;
        private $rg;
        private $cpf;
        private $numcrefito;
        private $nascimento;
        private $telefone;
        private $celular;
        private $email;
        private $senha;
        private $cidade;
        private $estado;
        private $pais;
        private $rua;
        private $bairro;
        private $numero;
        private $cep;
        private $complemento;

        public function __construct(){
            $this->id_profissional = -1;
            $this->nomeProfissional = "";
            $this->rg = "";
            $this->cpf = "";
            $this->numcrefito = "";
            $this->nascimento = "";
            $this->telefone = "";
            $this->celular = "";
            $this->email = "";
            $this->senha = "";
            $this->cidade = "";
            $this->estado = "";
            $this->pais = "";
            $this->rua = "";
            $this->bairro = "";
            $this->numero = "";
            $this->cep = "";
            $this->complemento = "";
        }

        public function getId_profissional(){
            return $this->id_profissional;
        }

        public function setId_profissional($id_profissional){
            $this->id_profissional = $id_profissional;
        }

        public function getNome(){
            return $this->nomeProfissional;
        }

        public function setNome($nomeProfissional){
            $this->nomeProfissional = $nomeProfissional;
        }

        public function getRg(){
            return $this->rg;
        }

        public function setRg($rg){
            $this->rg = $rg;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getNumcrefito(){
            return $this->numcrefito;
        }

        public function setNumcrefito($numcrefito){
            $this->numcrefito = $numcrefito;
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

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
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
    }
?>