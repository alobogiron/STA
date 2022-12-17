<?php
    include_once("../modelo/jogo.php");
    include_once("../dao/jogoDAO.php");

    //print_r($_POST);
    //print_r($_GET);

    class JogoControle{
        private $jogo;
        private $jogoDAO;
        

        public function __construct(){
            $this->jogo = new Jogo();
            $this->jogoDAO = new JogoDAO();
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
            }else{
                header("location: ../pgs/jogo_menu.php");
            }
        }

        private function inserir(){
            //echo"inseriu memo";
            $this->jogo->setNome($_POST["nomeJogo"]);
            $this->jogo->setSrcJogo($_POST["srcJogo"]);
            $this->jogo->setDescricao($_POST["descricao"]);
            $this->jogo->setTipo($_POST["tipo"]);

            $id = $this->jogoDAO->inserir($this->jogo);
            if($id > 0){
                header("location: ../pgs/jogo_menu.php");
            }else{
                header("location: ../pgs/regis_jogo.php");
            }
        }

        private function alterar(){
            $this->jogo->setId_jogo($_POST["id_jogo"]);
            $this->jogo->setNome($_POST["nomeJogo"]);
            $this->jogo->setSrcJogo($_POST["srcJogo"]);
            $this->jogo->setDescricao($_POST["descricao"]);
            $this->jogo->setTipo($_POST["tipo"]);

            $this->jogoDAO->alterar($this->jogo);

            header("location: ../pgs/jogo_menu.php");
        }

        private function excluir(){
            $this->jogo->setId_jogo($_GET["id_jogo"]);
            try{
                $this->jogoDAO->excluir($this->jogo);
                header("location: ../pgs/jogo_menu.php");
            }catch(PDOException $e){
                header("location: ../pgs/jogo_menu.php?error=del");
            }
        }

    }

    $jogoControle = new JogoControle;

?>