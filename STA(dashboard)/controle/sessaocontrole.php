<?php
    include_once("../modelo/sessao.php");
    include_once("../dao/sessaoDAO.php");

    //print_r($_POST);
    //print_r($_GET);

    class SessaoControle{
        private $sessao;
        private $sessaoDAO;
        

        public function __construct(){
            $this->sessao = new Sessao();
            $this->sessaoDAO = new SessaoDAO();
            if (empty($_GET)){
                $this->determinarAcao($_POST["acao"]);
            }else{
                $this->determinarAcao($_GET["acao"]);
            }
        }

        private function determinarAcao($acao){
            if($acao == "inserir"){
                $this->inserir();
            }else if($acao == "alterar"){
                $this->alterar();
            }else if($acao == "excluir"){
                $this->excluir();
            }else if($acao == "updateStatus"){
                $this->updateStatus();
            }else if($acao == "verificaStatus"){
                $this->verificaStatus();
            }else{
                header("location: ../pgs/sessao_menu.php");
            }
        }

        private function inserir(){
            //echo"inseriu memo";
            $this->sessao->setFk_id_profissional($_POST["fk_id_profissional"]);
            $this->sessao->setFk_id_paciente($_POST["fk_id_paciente"]);
            //$this->sessao->setStatusSessao($_POST["statusSessao"]);
            $this->sessao->setDataSessao($_POST["dataSessao"]);

            $id = $this->sessaoDAO->inserir($this->sessao);
            if($id > 0){
                header("location: ../pgs/sessao_menu.php");
            }else{
                header("location: ../pgs/regis_sessao.php");
            }
        }

        private function alterar(){
            $this->sessao->setId_sessao($_POST["id_sessao"]);
            $this->sessao->setFk_id_profissional($_POST["fk_id_profissional"]);
            $this->sessao->setFk_id_paciente($_POST["fk_id_paciente"]);
            $this->sessao->setDataSessao($_POST["dataSessao"]);

            $this->sessaoDAO->alterar($this->sessao);

            header("location: ../pgs/sessao_menu.php");
        }

        private function excluir(){
            $this->sessao->setId_sessao($_GET["id_sessao"]);
            try{
                $this->sessaoDAO->excluir($this->sessao);
                header("location: ../pgs/sessao_menu.php");
            }catch(PDOException $e){
                header("location: ../pgs/sessao_menu.php?error=del");
            }
        }

        private function updateStatus(){
            $resultado = $this->sessaoDAO->verificaStatus($_GET["codSessao"]);
            //print_r($resultado);
            if($resultado[0]["statusSessao"] == "Fechada"){
                header("location: ../pgs/sessao_menu.php?error=sessaoFechada");
            }else{
            $this->sessao->setCodSessao($_GET["codSessao"]);
            $this->sessao->setStatusSessao($_GET["statusSessao"]);
            //print_r($_GET);

            $this->sessaoDAO->trocaStatus($this->sessao);
            //$modaltype = "modaltype=prepareStatus";
            header("location: ../pgs/sessao_menu.php?codSessao={$_GET['codSessao']}&statusSessao={$_GET['statusSessao']}");
            }
        }

        private function verificaStatus(){ 
            $codSessao = $_POST["codSessao"];
            $resultado = $this->sessaoDAO->verificaStatus($codSessao);

            if($resultado[0]["statusSessao"] == "Aguardando"){
                echo "0";
            }else{
               echo "1";
            }
        }

    }

    $sessaoControle = new SessaoControle;

?>