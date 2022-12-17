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
            <h1><?php echo $profissional->getNome(); ?></h1>
            <form action="../pgs/profissional_menu.php" method="POST">
                <input type="text" name="busca" placeholder="">
                <input type="submit" value="Buscar"/>
            </form>
            <a href="regis_profissional.php">Novo Profissional</a>
            <?php
                if(empty($_GET['error']) == false){
                    include_once ("../construct/error_del.php");
                }

                include_once ("../dao/profissionalDAO.php");
                $profissionalDAO = new ProfissionalDAO();
                if(empty($_POST["busca"])){
                    $linhas = $profissionalDAO->pegarTodos();
                }else{
                    $linhas = $profissionalDAO->pegarPorNome($_POST["busca"]);
                }
            ?>
            <br/>
            <table style="width: 100%; border: 1;">
                <thead>
                    <tr">
                        <th>Nome</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Registro Crefito</th>
                        <th>Nascimento</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>País</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Número</th>
                        <th>CEP</th>
                        <th>Complemento</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($linhas as $linha){
                        echo "<tr>
                            <td>{$linha["nomeProfissional"]}</td>
                            <td>{$linha["rg"]}</td>
                            <td>{$linha["cpf"]}</td>
                            <td>{$linha["numcrefito"]}</td>
                            <td>{$linha["nascimento"]}</td>
                            <td>{$linha["telefone"]}</td>
                            <td>{$linha["celular"]}</td>
                            <td>{$linha["email"]}</td>
                            <td>{$linha["senha"]}</td>
                            <td>{$linha["cidade"]}</td>
                            <td>{$linha["estado"]}</td>
                            <td>{$linha["pais"]}</td>
                            <td>{$linha["rua"]}</td>
                            <td>{$linha["bairro"]}</td>
                            <td>{$linha["numero"]}</td>
                            <td>{$linha["cep"]}</td>
                            <td>{$linha["complemento"]}</td>
                            <td>";
                        echo"
                                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#{$linha["id_profissional"]}'>Excluir</button>
                                
                                <div class='modal fade' id='{$linha["id_profissional"]}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>{$linha["nomeProfissional"]}</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden'true'>&times;</span>
                                        </button><!--button-->
                                        </div><!--modal-header-->
                                        <div class='modal-body'>
                                            Deseja excluir?
                                        </div><!--modal-body-->
                                        <div class='modal-footer'>
                                            <a title='Excluir' href='../controle/profissionalcontrole.php?id_profissional={$linha["id_profissional"]}&acao=excluir'><input type='button' value='Apagar' /></a>
                                            <a title='Cancelar' href='../pgs/profissional_menu.php'><input type='button' value='Cancelar' /></a>
                                        </div><!--modal-footer-->
                                    </div><!--modal-content-->
                                </div><!--firstdiv-->

                                <a title='Editar' href='../pgs/alter_profissional.php?id_profissional={$linha["id_profissional"]}'><input type='button' value='Editar' /></a>
                            </td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
                <a href="regis_profissional.php">Novo Profissional</a>
                <a href="../util/sair.php">DESLOGAR</a>
        </div><!--container-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>