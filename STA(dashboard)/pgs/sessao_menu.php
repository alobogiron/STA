<?php
    session_start();
    include_once("../modelo/profissional.php");
    
    if(!isset($_SESSION["proflogado"])){
        header("location: ../index.php");
    }
    
    $profissional = unserialize($_SESSION["proflogado"]);
    $id_profissional = $profissional->getId_profissional();
?>
<html>
    <head>
        <title>STA</title>
        <link rel="stylesheet" href="../css/alertify.min.css" />
        <link rel="stylesheet" href="../css/themes/default.min.css" />
        <link rel="stylesheet" type="text/css" href="../scss/styles.css"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale= 1.0"/>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../css/alertify.min.js"></script>

        <?php include_once("../construct/header.php");?>

        <?php
            //print_r($_POST);
            //print_r($_GET);
            //Sempre que o status sessão muda, preciso enviar o valor de status sessão para a página menu
            //Fazer algo mais prático depois
            if(empty($_GET['error']) == false){
                if($_GET['error'] == 'del'){
                    include_once ("../construct/error_del.php");
                }else if($_GET['error'] == 'sessaoFechada'){
                    include_once ("../construct/error_sessaoFechada.php");
                }
            }

            if(empty($_GET['statusSessao']) == false){
                if($_GET['statusSessao'] == "Aguardando"){
                    include_once ("../construct/status_Change.php");
                }else if($_GET['statusSessao'] == "Disponível"){
                    include_once ("../construct/status_Cancel.php");
                }
            }

            include_once ("../dao/sessaoDAO.php");
            $sessaoDAO = new SessaoDAO();
            if(empty($_POST["busca"])){
                $linhas = $sessaoDAO->pegarTodosUser($id_profissional);
            }else{
                $linhas = $sessaoDAO->pegarPorNome($_POST["busca"], $profissional->getId_profissional());
            }
        ?>

        <section class="content">
            <div class="container">
            <h1>Gerenciamento de consultas</h1>
                <div class="row">
                    <div class="col-7">
                        <div class="row justify-content-around head">
                            <div class="col">
                                <h3>Consultas:</h3>
                            </div>
                            <div class="col">
                                <form action="../pgs/sessao_menu.php" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="busca" class="form-control" placeholder="Nome" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <input class="btn btn-outline-secondary" type="submit" value="Procurar" id="button-addon1"></input>
                                    </div>
                                </form><!--input-group-->
                            </div>
                        </div><!--row-->
                        <hr>
                        <div class="container-table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">PACIENTE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">CONSULTA</th>
                                    <th scope="col">DATA</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($linhas as $linha){
                                            echo"
                                                <tr>
                                                    <td>
                                                        <a href='../pgs/alter_paciente.php?id_paciente={$linha["fk_id_paciente"]}'>
                                                        {$linha["nomePaciente"]}
                                                        </a>
                                                    </td>
                                                    <td>{$linha["statusSessao"]}</td>
                                                    <td>
                                                        <a title='IniciarSessao' href='../controle/sessaocontrole.php?codSessao={$linha["codSessao"]}&statusSessao=Aguardando&acao=updateStatus'><input type='button' class='btn btn-outline-info' value=' Iniciar ' /></a>
                                                    </td>
                                                    <td>
                                                        {$linha["dataSessao"]}
                                                    </td>
                                                    <td>
                                                        <a class='link-danger func' href='' data-bs-toggle='modal' data-bs-target='#i{$linha["id_sessao"]}'><i class='bi bi-pencil-square'></i></a>
                                                        "; ?>
                                                        <div class="modal fade" id='<?php echo "i{$linha["id_sessao"]}"?>' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info text-white">
                                                                        <h4 class='modal-title' id='exampleModalLabel'>Alterar consulta</h5>
                                                                    </div><!--modal-header-->
                                                                    <div class="modal-body">
                                                                        <form action="../controle/sessaocontrole.php" method="POST" enctype="multipart/form-data">
                                                                            <input type="hidden" name="acao" value="alterar">
                                                                            <input type="hidden" name="id_sessao" value="<?php echo $linha['id_sessao'] ?>">
                                                                            <div class="modal-input">
                                                                                <span>Profissional</span>
                                                                                <br>
                                                                                <select name="fk_id_profissional">
                                                                                    <option value="<?php echo $profissional->getId_profissional();?>"><?php echo $profissional->getNome();?></option>
                                                                                    <?php
                                                                                        include_once("../dao/profissionalDAO.php");
                                                                                        $profissionalDAO = new ProfissionalDAO();
                                                                                        $rows = $profissionalDAO->pegarExcetoId($profissional->getId_profissional());
                                                        
                                                                                        foreach($rows as $row){
                                                                                            echo "<option value='{$row["id_profissional"]}'>{$row["nomeProfissional"]}</option>";
                                                                                        }
                                                                                    ?>
                                                                                </select><!--select-->
                                                                            </div><!--modal-input-->
                                                                            <div class="modal-input">
                                                                                <span>Paciente</span>
                                                                                <br>
                                                                                <select name="fk_id_paciente">
                                                                                    <option value="<?php echo $linha['id_paciente']?>"><?php echo $linha['nomePaciente']?></option>
                                                                                    <?php
                                                                                        include_once("../dao/pacienteDAO.php");
                                                                                        $pacienteDAO = new PacienteDAO();
                                                                                        $rows = $pacienteDAO->pegarExcetoId($linha['id_paciente']);
                                                                                        foreach($rows as $row){
                                                                                        echo "<option value='{$row["id_paciente"]}'>{$row["nomePaciente"]}</option>";
                                                                                        }
                                                                                    ?>
                                                                                </select><!--select-->
                                                                            </div><!--modal-input-->
                                                                            <div class="modal-input">
                                                                                <span>Data da sessão</span>
                                                                                <br>
                                                                                <?php
                                                                                    include_once("../dao/sessaoDAO.php");
                                                                                    $sessaoDAO = new SessaoDAO();
                                                                                    $rows = $sessaoDAO->pegarPorId($linha['id_sessao']);
                                                                                    foreach($rows as $row){
                                                                                        ?>
                                                                                            <input type="datetime-local" name="dataSessao" placeholder="Dia da sessão" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['dataSessao']));?>"/>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </div><!--modal-input-->
                                                                            <div class="footer-form">
                                                                                <input type="submit" class="btn btn-primary" value="Salvar"/>
                                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div><!--modal-body-->
                                                                </div><!--modal-content-->
                                                            </div><!--modal-dialog-->
                                                        </div><!--modal-fade-->
                                                        <?php
                                                        echo"
                                                        <br>
                                                        <br>
                                                        <a class='link-secondary func' href='../pgs/tentativa_menu.php?id_sessao={$linha["id_sessao"]}' id='{$linha["dataSessao"]}'><i class='bi bi-eye'></i></a>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div><!--container-table-->
                        <a href="regis_paciente.php"><button type="button" class="btn btn-outline-primary last">Add paciente</button></a>
                        <?php
                            echo"                            
                            <button type='button' class='btn btn-outline-secondary last' data-bs-toggle='modal' data-bs-target='#form-register'>
                            Agendar Sessão
                            </button>

                            <div class='modal fade ' id='form-register' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header bg-info text-white'>
                                            <h4 class='modal-title' id='exampleModalLabel'>Cadastro de consulta</h5>
                                        </div>
                                        <div class='modal-body'>";?>
                                            <form action="../controle/sessaocontrole.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="acao" value="inserir">
                                                <div class="modal-input">
                                                    <span>Profissional</span>
                                                    <br>
                                                    <select name="fk_id_profissional">
                                                    <option value="<?php echo $profissional->getId_profissional();?>"><?php echo $profissional->getNome();?></option>
                                                    <?php
                                                        $rows = $profissionalDAO->pegarExcetoId($profissional->getId_profissional());
                        
                                                        foreach($rows as $row){
                                                            echo "<option value='{$row["id_profissional"]}'>{$row["nomeProfissional"]}</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div><!--modal-input-->
                                                <div class="modal-input">
                                                    <span>Paciente</span>
                                                    <br>
                                                    <select name="fk_id_paciente">
                                                    <option disabled selected value>Escolha uma opção</option>
                                                        <?php
                                                            $rows = $pacienteDAO->pegarTodos();
                                                            foreach($rows as $row){
                                                            echo "<option value='{$row["id_paciente"]}'>{$row["nomePaciente"]}</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div><!--modal-input-->
                                                <div class="modal-input">
                                                    <span>Data da sessão</span>
                                                    <br>
                                                    <input id="data" type="datetime-local" name="dataSessao" placeholder="Dia da sessão"/>
                                                </div><!--modal-input-->
                                                <div class="footer-form">
                                                    <input type="submit" class="btn btn-primary" value="Cadastrar"/>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                </div>
                                            </form><!--form-->
                                        <?php 
                                        echo"
                                        </div>
                                    </div>
                                </div>
                            </div>"?>
                    </div><!--col-->
                    <div class="col-4">
                        <div class="insights">
                            <h3>Insights</h3>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-person-plus-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Nova:</span>
                                    <?php
                                        $insights = $sessaoDAO->pegarLastId($id_profissional);
                                        foreach ($insights as $row){
                                    ?>
                                            <a href="../pgs/alter_paciente.php?id_paciente=<?php echo $row['id_paciente'] ?>"><span id="next-patient"><?php echo $row['nomePaciente'] ?></span></a>
                                            <span> (<?php echo $row['dataSessao'] ?>)</span>
                                    <?php
                                        }
                                    ?>
                                </li> 
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi bi-arrow-right-circle-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Próximo:</span>
                                    <?php
                                        $insights = $sessaoDAO->pegarNextSessao($id_profissional);
                                        foreach ($insights as $row){
                                    ?>
                                            <a href="../pgs/alter_paciente.php?id_paciente=<?php echo $row['id_paciente'] ?>"><span id="next-patient"><?php echo $row['nomePaciente'] ?></span></a>
                                            <span> (<?php echo $row['dataSessao'] ?>)</span>
                                    <?php
                                        }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <div class="icon-li">   
                                        <i class="bi bi-clock-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Anterior:</span>
                                    <?php
                                        $insights = $sessaoDAO->pegarLastSessao($id_profissional);
                                        foreach ($insights as $row){
                                    ?>
                                            <a href="../pgs/alter_paciente.php?id_paciente=<?php echo $row['id_paciente'] ?>"><span id="next-patient"><?php echo $row['nomePaciente'] ?></span></a>
                                            <span> (<?php echo $row['dataSessao'] ?>)</span>
                                    <?php
                                        }
                                    ?>
                                    
                                </li>
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Registrado:</span>
                                    <?php
                                        $insights = $sessaoDAO->pegarRegistradas($id_profissional);
                                        foreach ($insights as $row){
                                    ?>
                                            <span id="registered-patients"><?php echo $row['countRegistered'] ?> consulta(s)</span>
                                    <?php
                                        }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Concluído:</span>
                                    <?php
                                        $insights = $sessaoDAO->pegarConcludedSessao($id_profissional);
                                        foreach ($insights as $row){
                                    ?>
                                            <span id="unregiste-patients"><?php echo $row['countConcluded'] ?> consulta(s)</span>
                                    <?php
                                        }
                                    ?>
                                </li>
                            </ul><!--list-group-->
                        </div><!--lista-->
                    </div><!--col-->
                </div><!--row-->
            </div><!--container-->
        </section><!--content-->

        <script src="../js/jquery.js"></script>
        <script src="../js/functions.js"></script>
    </body>
</html>