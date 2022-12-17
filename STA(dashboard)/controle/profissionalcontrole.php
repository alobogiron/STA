<?php
    include_once("../modelo/profissional.php");
    include_once("../dao/profissionalDAO.php");

    //print_r($_POST);
    //print_r($_GET);

    class ProfissionalControle{
        private $profissional;
        private $profissionalDAO;
        

        public function __construct(){
            $this->profissional = new Profissional();
            $this->profissionalDAO = new profissionalDAO();
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
            }else if($acao == "logar"){
                $this->logar();
            }else{
                header("location: ../pgs/profissional_menu.php");
            }
        }

        private function logar(){
            $this->profissional->setEmail($_POST["email"]);
            $this->profissional->setSenha($_POST["senha"]);

            $result = $this->profissionalDAO->efetuarLogin($this->profissional);
            if(sizeof($result) == 0){
                header("location: ../index.php?errado=true");
            }else{
                $this->profissional->setId_profissional($result[0]['id_profissional']);
                $this->profissional->setNome($result[0]['nomeProfissional']);
                $this->profissional->setRg($result[0]['rg']);
                $this->profissional->setCpf($result[0]['cpf']);
                $this->profissional->setNumcrefito($result[0]['numcrefito']);
                $this->profissional->setNascimento($result[0]['nascimento']);
                $this->profissional->setTelefone($result[0]['telefone']);
                $this->profissional->setCelular($result[0]['celular']);
                $this->profissional->setCidade($result[0]['cidade']);
                $this->profissional->setEstado($result[0]['estado']);
                $this->profissional->setPais($result[0]['pais']);
                $this->profissional->setRua($result[0]['rua']);
                $this->profissional->setBairro($result[0]['bairro']);
                $this->profissional->setNumero($result[0]['numero']);
                $this->profissional->setCep($result[0]['cep']);
                $this->profissional->setComplemento($result[0]['complemento']);

                session_start();
                $_SESSION["proflogado"] = serialize($this->profissional);

                header("location: ../pgs/paciente_menu.php");
            }

        }

        private function inserir(){
            //echo"inseriu memo";
            $this->profissional->setNome($_POST["nomeProfissional"]);
            $this->profissional->setRg($_POST["rg"]);
            $this->profissional->setCpf($_POST["cpf"]);
            $this->profissional->setNumcrefito($_POST["numcrefito"]);
            $this->profissional->setNascimento($_POST["nascimento"]);
            $this->profissional->setTelefone($_POST["telefone"]);
            $this->profissional->setCelular($_POST["celular"]);
            $this->profissional->setEmail($_POST["email"]);
            $this->profissional->setSenha($_POST["senha"]);
            $this->profissional->setCidade($_POST["cidade"]);
            $this->profissional->setEstado($_POST["estado"]);
            $this->profissional->setPais($_POST["pais"]);
            $this->profissional->setRua($_POST["rua"]);
            $this->profissional->setBairro($_POST["bairro"]);
            $this->profissional->setNumero($_POST["numero"]);
            $this->profissional->setCep($_POST["cep"]);
            $this->profissional->setComplemento($_POST["complemento"]);

            $id = $this->profissionalDAO->inserir($this->profissional);
            if($id > 0){
                header("location: ../index.php");
            }else{
                header("location: ../pgs/regis_profissional.php");
            }
        }

        private function alterar(){
            $this->profissional->setId_profissional($_POST["id_profissional"]);
            $this->profissional->setNome($_POST["nomeProfissional"]);
            $this->profissional->setRg($_POST["rg"]);
            $this->profissional->setCpf($_POST["cpf"]);
            $this->profissional->setNumcrefito($_POST["numcrefito"]);
            $this->profissional->setNascimento($_POST["nascimento"]);
            $this->profissional->setTelefone($_POST["telefone"]);
            $this->profissional->setCelular($_POST["celular"]);
            $this->profissional->setEmail($_POST["email"]);
            $this->profissional->setSenha($_POST["senha"]);
            $this->profissional->setCidade($_POST["cidade"]);
            $this->profissional->setEstado($_POST["estado"]);
            $this->profissional->setPais($_POST["pais"]);
            $this->profissional->setRua($_POST["rua"]);
            $this->profissional->setBairro($_POST["bairro"]);
            $this->profissional->setNumero($_POST["numero"]);
            $this->profissional->setCep($_POST["cep"]);
            $this->profissional->setComplemento($_POST["complemento"]);

            $this->profissionalDAO->alterar($this->profissional);

            header("location: ../util/sair.php");
        }

        private function excluir(){
            $this->profissional->setId_profissional($_GET["id_profissional"]);
            try{
                $this->profissionalDAO->excluir($this->profissional);
                header("location: ../pgs/profissional_menu.php");
            }catch(PDOException $e){
                header("location: ../pgs/profissional_menu.php?error=del");
            }
        }

    }

    $profissionalControle = new ProfissionalControle;

?>