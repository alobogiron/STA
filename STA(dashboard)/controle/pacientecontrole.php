<?php
    include_once("../modelo/paciente.php");
    include_once("../dao/pacienteDAO.php");

    //print_r($_POST);
    //print_r($_GET);

    class PacienteControle{
        private $paciente;
        private $pacienteDAO;
        

        public function __construct(){
            $this->paciente = new Paciente();
            $this->pacienteDAO = new PacienteDAO();
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
                header("location: ../pgs/paciente_menu.php");
            }
        }

        private function inserir(){
            //echo"inseriu memo";
            $this->paciente->setNome($_POST["nomePaciente"]);
            $this->paciente->setCpf($_POST["cpf"]);
            $this->paciente->setNascimento($_POST["nascimento"]);
            $this->paciente->setTelefone($_POST["telefone"]);
            $this->paciente->setCelular($_POST["celular"]);
            $this->paciente->setEmail($_POST["email"]);
            $this->paciente->setNomePai($_POST["nomePai"]);
            $this->paciente->setNomeMae($_POST["nomeMae"]);
            $this->paciente->setContatoPai($_POST["contatoPai"]);
            $this->paciente->setContatoMae($_POST["contatoMae"]);
            $this->paciente->setCidade($_POST["cidade"]);
            $this->paciente->setEstado($_POST["estado"]);
            $this->paciente->setPais($_POST["pais"]);
            $this->paciente->setRua($_POST["rua"]);
            $this->paciente->setBairro($_POST["bairro"]);
            $this->paciente->setNumero($_POST["numero"]);
            $this->paciente->setCep($_POST["cep"]);
            $this->paciente->setComplemento($_POST["complemento"]);
            //$this->paciente->setDtPrimeiroCadastro($_POST["dtPrimeiroCadastro"]);
            $this->paciente->setStatusPaciente("Ativo");

            $id = $this->pacienteDAO->inserir($this->paciente);
            if($id > 0){
                header("location: ../pgs/paciente_menu.php");
            }else{
                header("location: ../pgs/regis_paciente.php");
            }
        }

        private function alterar(){
            $this->paciente->setId_paciente($_POST["id_paciente"]);
            $this->paciente->setNome($_POST["nomePaciente"]);
            $this->paciente->setCpf($_POST["cpf"]);
            $this->paciente->setNascimento($_POST["nascimento"]);
            $this->paciente->setTelefone($_POST["telefone"]);
            $this->paciente->setCelular($_POST["celular"]);
            $this->paciente->setEmail($_POST["email"]);
            $this->paciente->setNomePai($_POST["nomePai"]);
            $this->paciente->setNomeMae($_POST["nomeMae"]);
            $this->paciente->setContatoPai($_POST["contatoPai"]);
            $this->paciente->setContatoMae($_POST["contatoMae"]);
            $this->paciente->setCidade($_POST["cidade"]);
            $this->paciente->setEstado($_POST["estado"]);
            $this->paciente->setPais($_POST["pais"]);
            $this->paciente->setRua($_POST["rua"]);
            $this->paciente->setBairro($_POST["bairro"]);
            $this->paciente->setNumero($_POST["numero"]);
            $this->paciente->setCep($_POST["cep"]);
            $this->paciente->setComplemento($_POST["complemento"]);
            //$this->paciente->setDtPrimeiroCadastro($_POST["dtPrimeiroCadastro"]);
            //$this->paciente->setStatusPaciente($_POST["statusPaciente"]);

            $this->pacienteDAO->alterar($this->paciente);

            header("location: ../pgs/paciente_menu.php");
        }

        private function excluir(){
            $this->paciente->setId_paciente($_GET["id_paciente"]);
            try{
                $this->pacienteDAO->excluir($this->paciente);
                header("location: ../pgs/paciente_menu.php");
            }catch(PDOException $e){
                header("location: ../pgs/paciente_menu.php?error=del");
            }
        }

    }

    $pacienteControle = new PacienteControle;

?>