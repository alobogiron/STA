<?php
    session_start();
    include_once("../modelo/profissional.php");
    
    if(!isset($_SESSION["proflogado"])){
        header("location: ../index.php");
    }
    
    $profissional = unserialize($_SESSION["proflogado"]);
?>
<html>
    <head>
        <title>STA</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/alertify.min.css" />
        <link rel="stylesheet" href="../css/themes/default.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale= 1.0"/>
    </head>
    <body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../css/alertify.min.js"></script>
        <div class="container">
            <h1>Jogos:</h1>
            <form action="../pgs/jogo_menu.php" method="POST">
                <input type="text" name="busca" placeholder="">
                <input type="submit" value="Buscar"/>
            </form>
            <a href="../pgs/regis_jogo.php">Novo Jogo</a>
            <?php
            //print_r($_GET);
                if(empty($_GET['error']) == false){
                    include_once ("../construct/error_del.php");
                }

                include_once ("../dao/jogoDAO.php");
                $jogoDAO = new JogoDAO();
                if(empty($_POST["busca"])){
                    $linhas = $jogoDAO->pegarTodos();
                }else{
                    $linhas = $jogoDAO->pegarPorNome($_POST["busca"]);
                }
            ?>
            <br/>
            <table style="width: 100%; border: 1;">
                <thead>
                    <tr">
                        <th>Nome do Jogo</th>
                        <th>Tipo do Jogo</th>
                        <th>Descrição</th>
                        <th>Caminho</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($linhas as $linha){
                        echo "<tr>
                            <td>{$linha["nomeJogo"]}</td>
                            <td>{$linha["tipo"]}</td>
                            <td>{$linha["descricao"]}</td>
                            <td>{$linha["srcJogo"]}</td>
                            <td>";       
                        echo"
                                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#{$linha["id_jogo"]}'>Excluir</button>
                        
                                <div class='modal fade' id='{$linha["id_jogo"]}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>{$linha["nomeJogo"]}</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden'true'>&times;</span>
                                        </button><!--button-->
                                        </div><!--modal-header-->
                                        <div class='modal-body'>
                                            Deseja excluir?
                                        </div><!--modal-body-->
                                        <div class='modal-footer'>
                                            <a title='Excluir' href='../controle/jogocontrole.php?id_jogo={$linha["id_jogo"]}&acao=excluir'><input type='button' value='Apagar' /></a>
                                            <a title='Cancelar' href='../pgs/jogo_menu.php'><input type='button' value='Cancelar' /></a>
                                        </div><!--modal-footer-->
                                    </div><!--modal-content-->
                                </div><!--firstdiv-->

                                <a title='Editar' href='../pgs/alter_jogo.php?id_jogo={$linha["id_jogo"]}'><input type='button' value='Editar' /></a>
                            </td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
                <a href="../pgs/regis_jogo.php">Novo Jogo</a>
        </div><!--container-->
    </body>
</html>