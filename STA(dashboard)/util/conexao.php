<?php
class Conexao{
    private static $conexao;

    static function getConexao(){
        if( !isset(self::$conexao) ){
            date_default_timezone_set("America/Sao_Paulo");
            try{
                self::$conexao = new PDO("mysql:host=127.0.0.1; port=3306; dbname=STA","root","2020");
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        return self::$conexao;
    }

}

?>