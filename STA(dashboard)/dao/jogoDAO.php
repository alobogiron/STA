<?php
    include_once("../util/conexao.php");

    class JogoDAO{

        public function inserir($jogo){
            $stmt = Conexao::getConexao()->prepare("insert into jogo (nomeJogo, descricao, tipo, srcJogo) values (:nomeJogo, :descricao, :tipo, :srcJogo)");
            $stmt->bindValue(":nomeJogo" , $jogo->getNome());
            $stmt->bindValue(":descricao" , $jogo->getDescricao());
            $stmt->bindValue(":tipo" , $jogo->getTipo());
            $stmt->bindValue(":srcJogo" , $jogo->getSrcJogo());
            $stmt->execute();

            return Conexao::getConexao()->lastInsertId();
        }

        public function alterar($jogo){
            $stmt = Conexao::getConexao()->prepare("update jogo set nomeJogo = :nomeJogo, descricao = :descricao, tipo = :tipo, srcJogo = :srcJogo where id_jogo = :id_jogo");
            $stmt->bindValue(":nomeJogo" , $jogo->getNome());
            $stmt->bindValue(":descricao" , $jogo->getDescricao());
            $stmt->bindValue(":tipo" , $jogo->getTipo());
            $stmt->bindValue(":srcJogo" , $jogo->getSrcJogo());
            $stmt->bindValue(":id_jogo" , $jogo->getId_jogo());
            $stmt->execute();
        }

        public function excluir($jogo){
            $stmt = Conexao::getConexao()->prepare("delete from jogo where id_jogo = :id_jogo");
            $stmt->bindValue(":id_jogo" , $jogo->getId_jogo());
            $stmt->execute();
        }

        public function pegarTodos(){
            $stmt = Conexao::getConexao()->prepare("select * from jogo order by nomeJogo");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorNome($nomeJogo){
            $stmt = Conexao::getConexao()->prepare("select * from jogo where nomeJogo like :nomeJogo");
            $stmt->bindValue(":nomeJogo" , "%$nomeJogo%");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorId($id_jogo){
            $stmt = Conexao::getConexao()->prepare("select * from jogo where id_jogo = :id_jogo ");
            $stmt->bindValue(":id_jogo" , $id_jogo);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>