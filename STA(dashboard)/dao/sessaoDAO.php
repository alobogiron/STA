<?php
    include_once("../util/conexao.php");

    class SessaoDAO{

        public function inserir($sessao){
            $stmt = Conexao::getConexao()->prepare("insert into sessao (fk_id_profissional, fk_id_paciente, statusSessao, dataSessao, codSessao) values (:fk_id_profissional, :fk_id_paciente, :statusSessao, :dataSessao, LEFT(UUID(), 8))");
            $stmt->bindValue(":fk_id_profissional" , $sessao->getFk_id_profissional());
            $stmt->bindValue(":fk_id_paciente" , $sessao->getFk_id_paciente());
            $stmt->bindValue(":statusSessao" , "Disponível");
            $stmt->bindValue(":dataSessao" , $sessao->getDataSessao());

            $stmt->execute();

            return Conexao::getConexao()->lastInsertId();
        }

        public function alterar($sessao){
            $stmt = Conexao::getConexao()->prepare("update sessao set fk_id_profissional = :fk_id_profissional, fk_id_paciente = :fk_id_paciente, dataSessao = :dataSessao where id_sessao = :id_sessao");
            $stmt->bindValue(":fk_id_profissional" , $sessao->getFk_id_profissional());
            $stmt->bindValue(":fk_id_paciente" , $sessao->getFk_id_paciente());
            $stmt->bindValue(":dataSessao" , $sessao->getDataSessao());
            $stmt->bindValue(":id_sessao" , $sessao->getId_sessao());
            
            $stmt->execute();
        }

        public function excluir($sessao){
            $stmt = Conexao::getConexao()->prepare("delete from sessao where id_sessao = :id_sessao");
            $stmt->bindValue(":id_sessao" , $sessao->getId_sessao());
            
            $stmt->execute();
        }

        public function pegarTodos(){
            $stmt = Conexao::getConexao()->prepare("select *, date_format(dataSessao, '%d/%c-%H:%ih') as dataSessao from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarTodosUser($fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select *, date_format(dataSessao, '%d/%c-%H:%ih') as dataSessao from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where (fk_id_profissional = :fk_id_profissional)");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorNome($nome, $fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select * from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where nomePaciente like :nome AND fk_id_profissional = :fk_id_profissional");
            $stmt->bindValue(":nome" , "%$nome%");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPorId($id_sessao){
            $stmt = Conexao::getConexao()->prepare("select * from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where id_sessao = :id_sessao;");
            $stmt->bindValue(":id_sessao" , $id_sessao);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarExcetoId($id_sessao){
            $stmt = Conexao::getConexao()->prepare("select * from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where id_sessao != :id_sessao");
            $stmt->bindValue(":id_sessao" , $id_sessao);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function trocaStatus($sessao){
            $stmt = Conexao::getConexao()->prepare("Update sessao, paciente set sessao.statusSessao = :statusSessao where sessao.fk_id_paciente = paciente.id_paciente and sessao.codSessao = :codSessao;");
            $stmt->bindValue(":codSessao" , $sessao->getCodSessao());
            $stmt->bindValue(":statusSessao" , $sessao->getStatusSessao());
            
            $stmt->execute();
        }

        public function verificaStatus($codSessao){
            $stmt = Conexao::getConexao()->prepare("select * from sessao where codSessao = :codSessao LIMIT 1;");
            $stmt->bindValue(":codSessao" , $codSessao);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarLastId($fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select id_paciente, nomePaciente, date_format(dataSessao, '%d/%c %H:%i') as dataSessao from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where (fk_id_profissional = :fk_id_profissional) ORDER BY id_sessao DESC LIMIT 1");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarNextSessao($fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select id_paciente, statusSessao, nomePaciente, date_format(dataSessao, '%d/%c %H:%i') as dataSessao from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where (fk_id_profissional = :fk_id_profissional) AND (statusSessao != 'Fechada') AND (dataSessao - current_timestamp()) > 0 ORDER BY (dataSessao - current_timestamp()) ASC LIMIT 1");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarLastSessao($fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select id_paciente, nomePaciente, date_format(dataSessao, '%d/%c %H:%i') as dataSessao from sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente inner join profissional on sessao.fk_id_profissional = profissional.id_profissional where (fk_id_profissional = :fk_id_profissional) AND (statusSessao = 'Fechada') ORDER BY (dataSessao - current_timestamp()) DESC LIMIT 1;");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarRegistradas($fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select count(*) as countRegistered FROM sta.sessao where (fk_id_profissional = :fk_id_profissional)");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarConcludedSessao($fk_id_profissional){
            $stmt = Conexao::getConexao()->prepare("select count(*) as countConcluded FROM sta.sessao where (fk_id_profissional = :fk_id_profissional) and (statusSessao = 'Fechada')");
            $stmt->bindValue(":fk_id_profissional" , $fk_id_profissional);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarInsightSessao($dataSessao, $fk_id_paciente){
            $stmt = Conexao::getConexao()->prepare("select
            *,
            (SELECT
                SUM(scoreTentativa)
            FROM
                tentativa
            WHERE
                tentativa.fk_id_sessao = sessao.id_sessao) AS pontoSessao,
                (SELECT
                    time_format(sec_to_time(SUM(time_to_sec(timediff(dtFimTentativa, dtInicioTentativa)))), '%H:%i:%s')
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tempoSessao,
                (SELECT
                    count(id_tentativa)
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tentativaSessao
            FROM
                sessao
            WHERE
                (dataSessao <= :dataSessao) and (fk_id_paciente = :fk_id_paciente)
            ORDER BY dataSessao DESC LIMIT 2");
            $stmt->bindValue(":dataSessao" , $dataSessao);
            $stmt->bindValue(":fk_id_paciente" , $fk_id_paciente);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarInsightPaciente($id_paciente){
            $stmt = Conexao::getConexao()->prepare("select count(id_tentativa) as tentativaPaciente, sum(scoreTentativa) as pontosPaciente, time_format(sec_to_time(SUM(time_to_sec(timediff(dtFimTentativa, dtInicioTentativa)))), '%H:%i:%s') as tempoPaciente, id_paciente, nomePaciente from sessao inner join tentativa on sessao.id_sessao = tentativa.fk_id_sessao inner join paciente on sessao.fk_id_paciente = paciente.id_paciente where (fk_id_paciente = :fk_id_paciente) and (statusSessao = 'Fechada')");
            $stmt->bindValue(":fk_id_paciente" , $id_paciente);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarPercentPaciente($id_paciente){
            $stmt = Conexao::getConexao()->prepare("select
            *,
            (SELECT
                SUM(scoreTentativa)
            FROM
                tentativa
            WHERE
                tentativa.fk_id_sessao = sessao.id_sessao) AS pontoSessao,
                (SELECT
                    time_format(sec_to_time(SUM(time_to_sec(timediff(dtFimTentativa, dtInicioTentativa)))), '%H:%i:%s')
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tempoSessao,
                (SELECT
                    count(id_tentativa)
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tentativaSessao
            FROM
                sessao
            WHERE
                (fk_id_paciente = :fk_id_paciente) and (statusSessao = 'Fechada')
            ORDER BY dataSessao DESC LIMIT 2;");
            $stmt->bindValue(":fk_id_paciente" , $id_paciente);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function pegarSessaoPaciente($id_paciente){
            $stmt = Conexao::getConexao()->prepare("select
            *,date_format(dataSessao, '%d/%c-%H:%ih') as horaSessao,
            (SELECT
                SUM(scoreTentativa)
            FROM
                tentativa
            WHERE
                tentativa.fk_id_sessao = sessao.id_sessao) AS pontoSessao,
                (SELECT
                    ROUND(SUM(time_to_sec(timediff(dtFimTentativa, dtInicioTentativa)) / 60), 1)
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tempoSessao,
                (SELECT
                    count(id_tentativa)
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tentativaSessao
            FROM
                sessao
            WHERE
                (fk_id_paciente = :fk_id_paciente) and (statusSessao = 'Fechada')
                order by dataSessao asc");
            $stmt->bindValue(":fk_id_paciente" , $id_paciente);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function pegarSessaoPacienteData($id_paciente, $dt1, $dt2){
            $stmt = Conexao::getConexao()->prepare("select
            *,date_format(dataSessao, '%d/%c-%H:%ih') as horaSessao,
            (SELECT
                SUM(scoreTentativa)
            FROM
                tentativa
            WHERE
                tentativa.fk_id_sessao = sessao.id_sessao) AS pontoSessao,
                (SELECT
                    ROUND(SUM(time_to_sec(timediff(dtFimTentativa, dtInicioTentativa)) / 60), 1)
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tempoSessao,
                (SELECT
                    count(id_tentativa)
                FROM
                    tentativa
                WHERE
                    tentativa.fk_id_sessao = sessao.id_sessao) AS tentativaSessao
            FROM
                sessao
            WHERE
                dataSessao between (:dt1) and (:dt2) and
                (fk_id_paciente = :fk_id_paciente) and (statusSessao = 'Fechada')
                order by dataSessao asc");
            $stmt->bindValue(":fk_id_paciente" , $id_paciente);
            $stmt->bindValue(":dt1" , $dt1);
            $stmt->bindValue(":dt2" , $dt2);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>