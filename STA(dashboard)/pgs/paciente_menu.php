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
    <body">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../css/alertify.min.js"></script>
        
        <?php include_once("../construct/header.php");?>

        <?php
            if(empty($_GET['error']) == false){
                if($_GET['error'] == 'del'){
                    include_once ("../construct/error_del.php");
                }
            }

            include_once ("../dao/pacienteDAO.php");
            $pacienteDAO = new PacienteDAO();
            if(empty($_POST["busca"])){
                $linhas = $pacienteDAO->pegarTodos();
            }else{
                $linhas = $pacienteDAO->pegarPorNome($_POST["busca"]);
            }
        ?>

        <section class="content">
            <div class="container">
            <h1>Gerenciamento de pacientes</h1>
                <div class="row">
                    <div class="col-7">
                        <div class="row justify-content-around head">
                            <div class="col">
                                <h3>Pacientes:</h3>
                            </div>
                            <div class="col">
                                <form action="../pgs/paciente_menu.php" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="busca" class="form-control" placeholder="Nome do Paciente" aria-label="Example text with button addon" aria-describedby="button-addon1">
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
                                    <th scope="col">NOME</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">CONSULTA</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($linhas as $linha){
                                            echo"
                                                <tr>
                                                <td>
                                                    <a href='../pgs/alter_paciente.php?id_paciente={$linha["id_paciente"]}'>
                                                    {$linha["nomePaciente"]}
                                                    </a>
                                                </td>
                                                <td>{$linha["statusPaciente"]}</td>
                                                <td>
                                                    <button type='button' class='btn btn-outline-info' data-bs-toggle='modal' data-bs-target='#i{$linha["id_paciente"]}'>
                                                    AGENDAR
                                                    </button>

                                                    <div class='modal fade ' id='i{$linha["id_paciente"]}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                                                                                include_once("../dao/profissionalDAO.php");
                                                                                $profissionalDAO = new ProfissionalDAO();
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
                                                                                <option value="<?php echo $linha['id_paciente']?>"><?php echo $linha['nomePaciente']?></option>
                                                                                <?php
                                                                                    $rows = $pacienteDAO->pegarExcetoId($linha['id_paciente']);
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
                                                    </div>
                                                </td>
                                                <td>
                                                    <a class='link-secondary func' href='../pgs/rel_paciente.php?id_paciente={$linha["id_paciente"]}'><i class='bi bi-eye'></i></a>
                                                </td>
                                                </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div><!--container-table-->
                        <a href="regis_paciente.php"><button type="button" class="btn btn-outline-primary last">Add paciente</button></a>
                    </div><!--col-->
                    <div class="col-4">
                        <div class="insights">
                            <h3>Insights</h3>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-person-plus-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Novo:</span>
                                    <?php
                                        $insights = $pacienteDAO->pegarLastId();
                                        foreach ($insights as $row){
                                    ?>
                                            <a href="../pgs/alter_paciente.php?id_paciente=<?php echo $row['id_paciente'] ?>"><span id="new-patient"><?php echo $row['nomePaciente']?></span></a>
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
                                        $insights = $pacienteDAO->pegarNextPaciente($id_profissional);
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
                                    <span class="text-muted">Agendado:</span>
                                    <?php
                                        $insights = $pacienteDAO->pegarAgendados();
                                        foreach ($insights as $row){
                                    ?>
                                            <span id="scheduled-patients"><?php echo $row['countScheduled'] ?> paciente(s)</span>
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
                                        $insights = $pacienteDAO->pegarRegistrados();
                                        foreach ($insights as $row){
                                    ?>
                                            <span id="registered-patients"><?php echo $row['countRegistered'] ?> paciente(s)</span>
                                    <?php
                                        }
                                    ?>
                                </li>
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Sem agendamento:</span>
                                    <?php
                                        $insights = $pacienteDAO->pegarNaoAgendados();
                                        foreach ($insights as $row){
                                    ?>
                                            <span id="unregiste-patients"><?php echo $row['unScheduled'] ?> paciente(s)</span>
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