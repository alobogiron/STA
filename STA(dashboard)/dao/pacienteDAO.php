<?php
    include_once("../util/conexao.php");

    class PacienteDAO{

        public function inserir($paciente){
            $stmt = Conexao::getConexao()->prepare("insert into paciente (nomePaciente, cpf, nascimento, telefone, celular, email, nomePai, nomeMae, contatoPai, contatoMae, cidade, estado, pais, rua, bairro, numero, cep, complemento, statusPaciente) values (:nomePaciente, :cpf, :nascimento, :telefone, :celular, :email, :nomePai, :nomeMae, :contatoPai, :contatoMae, :cidade, :estado, :pais, :rua, :bairro, :numero, :cep, :complemento, :statusPaciente)");
            $stmt->bindValue(":nomePaciente" , $paciente->getNome());
            $stmt->bindValue(":cpf" , $paciente->getCpf());
            $stmt->bindValue(":nascimento" , $paciente->getNascimento());
            $stmt->bindValue(":telefone" , $paciente->getTelefone());
            $stmt->bindValue(":celular" , $paciente->getCelular());
            $stmt->bindValue(":email" , $paciente->getEmail());
            $stmt->bindValue(":nomePai" , $paciente->getNomePai());
            $stmt->bindValue(":nomeMae" , $paciente->getNomeMae());
            $stmt->bindValue(":contatoPai" , $paciente->getContatoPai());
            $stmt->bindValue(":contatoMae" , $paciente->getContatoMae());
            $stmt->bindValue(":cidade" , $paciente->getCidade());
            $stmt->bindValue(":estado" , $paciente->getEstado());
            $stmt->bindValue(":pais" , $paciente->getPais());
            $stmt->bindValue(":rua" , $paciente->getRua());
            $stmt->bindValue(":bairro" , $paciente->getBairro());
            $stmt->bindValue(":numero" , $paciente->getNumero());
            $stmt->bindValue(":cep" , $paciente->getCep());
            $stmt->bindValue(":complemento" , $paciente->getComplemento());
            //$stmt->bindValue(":dtPrimeiroCadastro" , $paciente->getDtPrimeiroCadastro());
            $stmt->bindValue(":statusPaciente" , $paciente->getStatusPaciente());
            //$stmt->bindValue(":codPaciente" , $paciente->getStatusPaciente());
            
            $stmt->execute();

            return Conexao::getConexao()->lastInsertId();
        }

        public function alterar($paciente){
            $stmt = Conexao::getConexao()->prepare("update paciente set nomePaciente = :nomePaciente, cpf = :cpf, nascimento = :nascimento, telefone = :telefone, celular = :celular, email = :email, nomePai = :nomePai, nomeMae = :nomeMae, contatoPai = :contatoPai, contatoMae = :contatoMae, cidade = :cidade, estado = :estado, pais = :pais, rua = :rua, bairro = :bairro, numero = :numero, cep = :cep, complemento = :complemento where id_paciente = :id_paciente");
            $stmt->bindValue(":nomePaciente" , $paciente->getNome());
            $stmt->bindValue(":cpf" , $paciente->getCpf());
            $stmt->bindValue(":nascimento" , $paciente->getNascimento());
            $stmt->bindValue(":telefone" , $paciente->getTelefone());
            $stmt->bindValue(":celular" , $paciente->getCelular());
            $stmt->bindValue(":email" , $paciente->getEmail());
            $stmt->bindValue(":nomePai" , $paciente->getNomePai());
            $stmt->bindValue(":nomeMae" , $paciente->getNomeMae());
            $stmt->bindValue(":contatoPai" , $paciente->getContatoPai());
            $stmt->bindValue(":contatoMae" , $paciente->getContatoMae());
            $stmt->bindValue(":cidade" , $paciente->getCidade());
            $stmt->bindValue(":estado" , $paciente->getEstado());
            $stmt->bindValue(":pais" , $paciente->getPais());
            $stmt->bindValue(":rua" , $paciente->getRua());
            $stmt->bindValue(":bairro" , $paciente->getBairro());
            $stmt->bindValue(":numero" , $paciente->getNumero());
            $stmt->bindValue(":cep" , $paciente->getCep());
            $stmt->bindValue(":complemento" , $paciente->getComplemento());
            //$stmt->bindValue(":dtPrimeiroCadastro" , $paciente->getDtPrimeiroCadastro());
            //$stmt->bindValue(":statusPaciente" , $paciente->getStatusPaciente());
            $stmt->bindValue(":id_paciente" , $paciente->getId_paciente());
            
            $stmt->execute();
        }

        public function excluir($paciente){
            $stmt = Conexao::getConexao()->prepare("delete from paciente where id_paciente = :id_paciente");
            $stmt->bindValue(":id_paciente" , $paciente->getId_paciente());
            

            $stmt->execute();

        }

        public function pegarTodos(){
            $stmt = Conexao::getConexao()->prepare("select * from paciente order by nomePaciente");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorNome($nomePaciente){
            $stmt = Conexao::getConexao()->prepare("select * from paciente where nomePaciente like :nomePaciente");
            $stmt->bindValue(":nomePaciente" , "%$nomePaciente%");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorId($id_paciente){
            $stmt = Conexao::getConexao()->prepare("select * from paciente where id_paciente = :id_paciente");
            $stmt->bindValue(":id_paciente" , $id_paciente);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarExcetoId($id_paciente){
            $stmt = Conexao::getConexao()->prepare("select * from paciente where id_paciente != :id_paciente");
            $stmt->bindValue(":id_paciente" , $id_paciente);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarLastId(){
            $stmt = Conexao::getConexao()->prepare("select id_paciente, nomePaciente FROM sta.paciente ORDER BY id_paciente DESC LIMIT 1;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarNextPaciente($fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select id_paciente, statusSessao, nomePaciente, date_format(dataSessao, '%d/%c %H:%i') as dataSessao from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where (fk_id_profissional = :fk_id_profissional) AND (statusSessao != 'Fechada') AND (dataSessao - current_timestamp()) > 0 ORDER BY (dataSessao - current_timestamp()) ASC LIMIT 1");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarAgendados(){
            $stmt = Conexao::getConexao()->prepare("select count(distinct nomePaciente) as countScheduled from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarRegistrados(){
            $stmt = Conexao::getConexao()->prepare("select count(*) as countRegistered FROM sta.paciente");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarNaoAgendados(){
            $stmt = Conexao::getConexao()->prepare("select count(*) as unScheduled FROM paciente LEFT JOIN sessao ON paciente.id_paciente = sessao.fk_id_paciente where id_sessao is null;");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>