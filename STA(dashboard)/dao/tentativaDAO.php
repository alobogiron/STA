<?php
    include_once("../util/conexao.php");

    class TentativaDAO{

        public function inserir($tentativa){
            $stmt = Conexao::getConexao()->prepare("insert into tentativa (dtInicioTentativa, dtFimTentativa, scoreTentativa, statusTentativa, fk_id_sessao, fk_id_jogo) values (:dtInicioTentativa, :dtFimTentativa, :scoreTentativa, :statusTentativa, :fk_id_sessao, :fk_id_jogo");
            $stmt->bindValue(":dtInicioTentativa" , $tentativa->getDtInicioTentativa());
            $stmt->bindValue(":dtFimTentativa" , $tentativa->getDtFimTentativa());
            $stmt->bindValue(":scoreTentativa" , $tentativa->getScoreTentativa());
            $stmt->bindValue(":statusTentativa" , $tentativa->getStatusTentativa());
            $stmt->bindValue(":fk_id_sessao" , $tentativa->getFk_id_sessao());
            $stmt->bindValue(":fk_id_jogo" , $tentativa->getFk_id_jogo());
            
            $stmt->execute();

            return Conexao::getConexao()->lastInsertId();
        }

        public function alterar($tentativa){
            $stmt = Conexao::getConexao()->prepare("update tentativa set dtInicioTentativa = :dtInicioTentativa, dtFimTentativa = :dtFimTentativa, scoreTentativa = :scoreTentativa, statusTentativa = :statusTentativa, fk_id_sessao = :fk_id_sessao, fk_id_jogo = :fk_id_jogo where id_tentativa = :id_tentativa");
            $stmt->bindValue(":dtInicioTentativa" , $tentativa->getDtInicioTentativa());
            $stmt->bindValue(":dtFimTentativa" , $tentativa->getDtFimTentativa());
            $stmt->bindValue(":scoreTentativa" , $tentativa->getScoreTentativa());
            $stmt->bindValue(":statusTentativa" , $tentativa->getStatusTentativa());
            $stmt->bindValue(":fk_id_sessao" , $tentativa->getFk_id_sessao());
            $stmt->bindValue(":fk_id_jogo" , $tentativa->getFk_id_jogo());
            $stmt->bindValue(":id_tentativa" , $tentativa->getId_tentativa());

            $stmt->execute();
        }

        public function excluir($tentativa){
            $stmt = Conexao::getConexao()->prepare("delete from tentativa where id_tentativa = :id_tentativa");
            $stmt->bindValue(":id_tentativa" , $tentativa->getId_tentativa());
            

            $stmt->execute();

        }

        public function pegarTodos(){
            $stmt = Conexao::getConexao()->prepare("select * from tentativa inner join sessao on tentativa.fk_id_sessao = sessao.id_sessao inner join jogo on tentativa.fk_id_jogo = jogo.id_jogo inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorNome($nome){
            $stmt = Conexao::getConexao()->prepare("select * from tentativa inner join sessao on tentativa.fk_id_sessao = sessao.id_sessao inner join jogo on tentativa.fk_id_jogo = jogo.id_jogo inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where nomePaciente like :nome");
            $stmt->bindValue(":nome" , "%$nome%");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorId($id_tentativa){
            $stmt = Conexao::getConexao()->prepare("select * from tentativa inner join sessao on tentativa.fk_id_sessao = sessao.id_sessao inner join jogo on tentativa.fk_id_jogo = jogo.id_jogo inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where id_tentativa like :id_tentativa");
            $stmt->bindValue(":id_tentativa" , $id_tentativa);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorSessao($fk_id_sessao){
            $stmt = Conexao::getConexao()->prepare("select id_tentativa, time_to_sec(timediff(dtFimTentativa, dtInicioTentativa)) as tempo, date_format(dtInicioTentativa, '%H:%i:%S') as inicio, scoreTentativa, fk_id_sessao, fk_id_jogo, statusSessao, nomeJogo, statusTentativa from tentativa inner join sessao on tentativa.fk_id_sessao = sessao.id_sessao inner join jogo on tentativa.fk_id_jogo = jogo.id_jogo inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where id_sessao = :fk_id_sessao order by inicio");
            $stmt->bindValue(":fk_id_sessao" , $fk_id_sessao);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarExcetoId($id_tentativa){
            $stmt = Conexao::getConexao()->prepare("select * from tentativa inner join sessao on tentativa.fk_id_sessao = sessao.id_sessao inner join jogo on tentativa.fk_id_jogo = jogo.id_jogo inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where id_tentativa != :id_tentativa");
            $stmt->bindValue(":id_tentativa" , $id_tentativa);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>