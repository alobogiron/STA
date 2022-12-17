<?php
    include_once("../util/conexao.php");

    class ProfissionalDAO{

        public function inserir($profissional){
            $stmt = Conexao::getConexao()->prepare("insert into profissional (nomeProfissional, rg, cpf, numcrefito, nascimento, telefone, celular, email, senha, cidade, estado, pais, rua, bairro, numero, cep, complemento) values (:nomeProfissional, :rg, :cpf, :numcrefito, :nascimento, :telefone, :celular, :email, :senha, :cidade, :estado, :pais, :rua, :bairro, :numero, :cep, :complemento)");
            $stmt->bindValue(":nomeProfissional" , $profissional->getNome());
            $stmt->bindValue(":rg" , $profissional->getRg());
            $stmt->bindValue(":cpf" , $profissional->getCpf());
            $stmt->bindValue(":numcrefito" , $profissional->getNumcrefito());
            $stmt->bindValue(":nascimento" , $profissional->getNascimento());
            $stmt->bindValue(":telefone" , $profissional->getTelefone());
            $stmt->bindValue(":celular" , $profissional->getCelular());
            $stmt->bindValue(":email" , $profissional->getEmail());
            $stmt->bindValue(":senha" , $profissional->getSenha());
            $stmt->bindValue(":cidade" , $profissional->getCidade());
            $stmt->bindValue(":estado" , $profissional->getEstado());
            $stmt->bindValue(":pais" , $profissional->getPais());
            $stmt->bindValue(":rua" , $profissional->getRua());
            $stmt->bindValue(":bairro" , $profissional->getBairro());
            $stmt->bindValue(":numero" , $profissional->getNumero());
            $stmt->bindValue(":cep" , $profissional->getCep());
            $stmt->bindValue(":complemento" , $profissional->getComplemento());
            
            $stmt->execute();

            return Conexao::getConexao()->lastInsertId();
        }

        public function alterar($profissional){
            $stmt = Conexao::getConexao()->prepare("update profissional set nomeProfissional = :nomeProfissional, rg = :rg, cpf = :cpf, numcrefito = :numcrefito, nascimento = :nascimento, telefone = :telefone, celular = :celular, email = :email, senha = :senha, cidade = :cidade, estado = :estado, pais = :pais, rua = :rua, bairro = :bairro, numero = :numero, cep = :cep, complemento = :complemento where id_profissional = :id_profissional");
            $stmt->bindValue(":nomeProfissional" , $profissional->getNome());
            $stmt->bindValue(":rg" , $profissional->getRg());
            $stmt->bindValue(":cpf" , $profissional->getCpf());
            $stmt->bindValue(":numcrefito" , $profissional->getNumcrefito());
            $stmt->bindValue(":nascimento" , $profissional->getNascimento());
            $stmt->bindValue(":telefone" , $profissional->getTelefone());
            $stmt->bindValue(":celular" , $profissional->getCelular());
            $stmt->bindValue(":email" , $profissional->getEmail());
            $stmt->bindValue(":senha" , $profissional->getSenha());
            $stmt->bindValue(":cidade" , $profissional->getCidade());
            $stmt->bindValue(":estado" , $profissional->getEstado());
            $stmt->bindValue(":pais" , $profissional->getPais());
            $stmt->bindValue(":rua" , $profissional->getRua());
            $stmt->bindValue(":bairro" , $profissional->getBairro());
            $stmt->bindValue(":numero" , $profissional->getNumero());
            $stmt->bindValue(":cep" , $profissional->getCep());
            $stmt->bindValue(":complemento" , $profissional->getComplemento());
            $stmt->bindValue(":id_profissional" , $profissional->getId_profissional());
            
            $stmt->execute();
        }

        public function excluir($profissional){
            $stmt = Conexao::getConexao()->prepare("delete from profissional where id_profissional = :id_profissional");
            $stmt->bindValue(":id_profissional" , $profissional->getId_profissional());
            $stmt->execute();
        }

        public function pegarTodos(){
            $stmt = Conexao::getConexao()->prepare("select * from profissional order by nomeProfissional");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorNome($nomeProfissional){
            $stmt = Conexao::getConexao()->prepare("select * from profissional where nomeProfissional like :nomeProfissional");
            $stmt->bindValue(":nomeProfissional" , "%$nomeProfissional%");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorId($id_profissional){
            $stmt = Conexao::getConexao()->prepare("select * from profissional where id_profissional = :id_profissional");
            $stmt->bindValue(":id_profissional" , $id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarExcetoId($id_profissional){
            $stmt = Conexao::getConexao()->prepare("select * from profissional where id_profissional != :id_profissional");
            $stmt->bindValue(":id_profissional" , $id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function efetuarLogin($profissional){
            $stmt = Conexao::getConexao()->prepare("select * from profissional where email = :email and senha = :senha ");
            $stmt->bindValue(":email" , $profissional->getEmail());
            $stmt->bindValue(":senha" , $profissional->getSenha());
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
    }

?>