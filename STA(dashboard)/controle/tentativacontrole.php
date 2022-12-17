<?php
    include_once("../modelo/tentativa.php");
    include_once("../dao/tentativaDAO.php");

    //print_r($_POST);
    //print_r($_GET);

    class TentativaControle{
        private $tentativa;
        private $tentativaDAO;
        

        public function __construct(){
            $this->tentativa = new Tentativa();
            $this->tentativaDAO = new TentativaDAO();
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
            }else if($acao == "pegarSessao"){
                $this->pegarSessao();
            }else{
                header("location: ../pgs/tentativa_menu.php");
            }
        }

        private function inserir(){
            //echo"inseriu memo";
            //$this->sessao->setFk_id_profissional($_POST["fk_id_profissional"]);
            //$this->sessao->setFk_id_paciente($_POST["fk_id_paciente"]);
            //$this->sessao->setStatusSessao($_POST["statusSessao"]);
            //$this->sessao->setDataSessao($_POST["dataSessao"]);

            //$id = $this->sessaoDAO->inserir($this->sessao);
            //if($id > 0){
              //  header("location: ../pgs/sessao_menu.php");
            //}else{
              //  header("location: ../pgs/regis_sessao.php");
            //}
        }

        private function alterar(){
            //$this->sessao->setId_sessao($_POST["id_sessao"]);
            //$this->sessao->setFk_id_profissional($_POST["fk_id_profissional"]);
            //$this->sessao->setFk_id_paciente($_POST["fk_id_paciente"]);
            //$this->sessao->setStatusSessao($_POST["statusSessao"]);
            //$this->sessao->setDataSessao($_POST["dataSessao"]);

            //$this->sessaoDAO->alterar($this->sessao);

            //header("location: ../pgs/sessao_menu.php");
        }

        private function excluir(){
            $this->tentativa->setId_tentativa($_GET["id_tentativa"]);
            $this->tentativaDAO->excluir($this->tentativa);

            header("location: ../pgs/tentativa_menu.php");
        }

        private function pegarSessao(){
            $this->tentativa->setFk_id_sessao($_GET["fk_id_sessao"]);
            $resultado = $this->tentativaDAO->pegarPorSessao($this->tentativa);

            $data = array();
            foreach ($resultado as $row) {
                $data[] = $row['id_tentativa'];
            }

            echo json_encode($data);

        }

    }

    $tentativaControle = new TentativaControle;

?>