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
        <script src="../js/jquery.js"></script>
        <script src="../node_modules/chart.js/dist/chart.js"></script>

        <?php include_once("../construct/header.php");?>

        <?php 
            if(empty($_GET['error']) == false){
                include_once ("../construct/error_del.php");
            }

            include_once ("../dao/sessaoDAO.php");
            $sessaoDAO = new SessaoDAO();
            if(empty($_GET) == false){
                $linhas = $sessaoDAO->pegarInsightPaciente($_GET['id_paciente']);
                $id_paciente = $_GET['id_paciente'];
            }else{
                $linhas = $sessaoDAO->pegarInsightPaciente($_POST['id_paciente']);
                $id_paciente = $_POST['id_paciente'];
            }
            //print_r($linhas);
            //1 sessao atual
            //0 sessao anterior

        ?>

        <section class="content">
            <div class="container">
                <h1>Relatórios do paciente</h1>
                <div class="row">
                    <div class="col bg-light preview p-4">
                        <div class="row">
                            <div class="col info">
                                <p class="text-muted">Pontuação</p>
                                <h2 class="fw-bolder">
                                    <?php
                                        foreach ($linhas as $linha){
                                            echo ($linha['pontosPaciente']),' pontos';
                                        }
                                    ?>
                                </h2>
                                <div class="percent1">
                                    <i id="percent-ico1" class=""></i>
                                    <span class="" id="percent1">
                                        <?php
                                            $rows = $sessaoDAO->pegarPercentPaciente($id_paciente);
                                            //print_r($rows);
                                            $percent = 0;
                                            $aux = 0;
                                            foreach ($rows as $row){
                                                if($percent != 0){
                                                    $percent = $percent - $row['pontoSessao'];
                                                    $aux = $row['pontoSessao'];
                                                    if($aux != 0){
                                                        $percent = $percent / $aux;
                                                    }
                                                    break;
                                                }
                                                $percent = $row['pontoSessao'];
                                            }
                                            echo number_format(($percent * 100), 1, '.', ''),'%';
                                        ?>
                                    </span>
                                </div>
                            </div><!--col-->
                            <div class="col-auto img-fluid align-self-end">
                                <img class="" src="../images/Bar Chart_blue.png">
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--col-4-->
                    <div class="col bg-light me-4 ms-4 preview p-4">
                        <div class="row">
                            <div class="col info">
                                <p class="text-muted">Duração</p>
                                <h2 class="fw-bolder">
                                <?php
                                    foreach ($linhas as $linha){
                                        echo ($linha['tempoPaciente']),' h';
                                    }
                                ?>
                                </h2>
                                <div class="percent2">
                                    <i id="percent-ico2" class=""></i>
                                    <span id="percent2">
                                    <?php
                                        $rows = $sessaoDAO->pegarPercentPaciente($id_paciente);
                                        $percent = 0;
                                        $aux = 0;
                                        foreach ($rows as $row){
                                            if($percent != 0){
                                                $percent = $percent - strtotime('1970-01-01 ' . $row['tempoSessao'] . 'GMT');
                                                $aux = strtotime('1970-01-01 ' . $row['tempoSessao'] . 'GMT');
                                                if($aux != 0){
                                                    $percent = $percent / $aux;
                                                }
                                                break;
                                            }
                                            $percent = strtotime('1970-01-01 ' . $row['tempoSessao'] . 'GMT');
                                        }
                                        echo number_format(($percent * 100), 1, '.', ''),'%';
                                    ?>
                                    </span>
                                </div>
                            </div><!--col-->
                            <div class="col-auto img-fluid align-self-end">
                                <img class="" src="../images/Bar Chart_purple.png">
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--col-4-->
                    <div class="col bg-light preview p-4">
                        <div class="row">
                            <div class="col info">
                                <p class="text-muted">Tentativas</p>
                                <h2 class="fw-bolder">
                                <?php
                                    foreach ($linhas as $linha){
                                        echo ($linha['tentativaPaciente']),' tentativas';
                                    }
                                ?>
                                </h2>
                                <div class="percent3">
                                    <i id="percent-ico3" class=""></i>
                                    <span class="" id="percent3">
                                    <?php
                                        $rows = $sessaoDAO->pegarPercentPaciente($id_paciente);
                                        $percent = 0;
                                        $aux = 0;
                                        foreach ($rows as $row){
                                            if($percent != 0){
                                                $percent = $percent - $row['tentativaSessao'];
                                                $aux = $row['tentativaSessao'];
                                                if($aux != 0){
                                                    $percent = $percent / $aux;
                                                }
                                                break;
                                            }
                                            $percent = $row['tentativaSessao'];
                                        }
                                        echo number_format(($percent * 100), 1, '.', ''),'%';
                                    ?>
                                    </span>
                                </div>
                                </div><!--col-->
                            <div class="col-auto img-fluid align-self-end">
                                <img class="" src="../images/Bar Chart_green.png">
                            </div><!--col-->
                        </div><!--row-->
                    </div><!--col-4-->
                </div><!--row-->
                <div class="row">
                    <div class="col bg-light p-4">
                        <h3 class="link-primary">Progressão de tentativas</h3>
                        <?php
                            //verificador
                            include_once ("../dao/tentativaDAO.php");
                            $tentativaDAO = new tentativaDAO();
                            if($percent != 0){
                                if(empty($_POST['data2']) == false){
                                    $dt1 = $_POST['data1'];
                                    $dt2 = $_POST['data2'];
                                    $rows = $sessaoDAO->pegarSessaoPacienteData($id_paciente, $dt1, $dt2);
                                }else{
                                    $rows = $sessaoDAO->pegarSessaoPaciente($id_paciente);
                                    $dt1 = substr($rows[0]['dataSessao'], 0, 10);//primeiro valor
                                    $dt2 = substr($rows[count($rows) - 1]['dataSessao'], 0, 10);//último valor
                                }
                            }
                        ?>
                        <form action="../pgs/rel_paciente.php" method="POST" enctype="multipart/form-data" >
                            <h5 class="text-muted pt-4">Datas da progressão<h5>
                            <input type="hidden" name="id_paciente" value="<?php echo $id_paciente?>">
                            <input type="date" value="<?php echo $dt1; ?>" id="dt1" name="data1" placeholder="">
                            <input type="date" value="<?php echo $dt2; ?>" id="dt2" name="data2">
                            <br>
                            <input type="submit" class="btn btn-primary mt-4" value="Filtrar por data">
                            <a href="../pgs/rel_paciente.php?id_paciente=<?php echo $id_paciente?>" class="btn btn-secondary mt-4 ms-2">Listar todas</a>
                        </form >
                        <canvas id="graphCanvas"></canvas>
                        <script>
                            $(document).ready(function () {
                                showGraph();
                            });


                            function showGraph(){
                            }

                            var graphTarget = document.getElementById('graphCanvas').getContext('2d');
                            var gradient1 = graphTarget.createLinearGradient(0, 0, 0, 700);
                            var gradient2 = graphTarget.createLinearGradient(0, 0, 0, 700);
                            var gradient3 = graphTarget.createLinearGradient(0, 0, 0, 700);
                            gradient1.addColorStop(0, 'rgba(109,222,254,0.8)');
                            gradient1.addColorStop(1, 'rgba(109,222,254,0)');
                            gradient2.addColorStop(0, 'rgba(179, 177, 252,0.8)');
                            gradient2.addColorStop(1, 'rgba(179, 177, 252,0)');
                            gradient3.addColorStop(0, 'rgba(125, 245, 185,0.8)');
                            gradient3.addColorStop(1, 'rgba(125, 245, 185,0)');

                            var data = <?php echo json_encode($rows); ?>;
                            console.log(data);
                            var inicio = [];
                            var pontos = [];
                            var tempo = [];
                            var sessao = [];
                            var tentativa =[];


                            for (var i in data) {
                                inicio.push(data[i].inicio);
                                pontos.push(data[i].pontoSessao);
                                tempo.push(data[i].tempoSessao);
                                tentativa.push(data[i].tentativaSessao);
                                sessao[i] = parseInt(i) + 1;
                            }

                            console.log(tempo);

                            var chartdata = {
                                labels: sessao,
                                datasets: [
                                        {
                                            label: 'Minutos',
                                            pointBackgroundColor: 'white',
                                            pointRadius: 6,
                                            pointBorderWidth: 2,
                                            borderWidth: 4,
                                            backgroundColor: gradient2,
                                            borderColor: '#b3b1fc',
                                            hoverBackgroundColor: '#8d8aff',
                                            hoverBorderColor: '#4a4982',
                                            tension: 0.2,
                                            data: tempo,
                                            borderJoinStyle: 'round',
                                            fill: true,
                                            hoverRadius: 7
                                        },
                                        {
                                            label: 'Pontos',
                                            pointBackgroundColor: 'white',
                                            pointRadius: 6,
                                            pointBorderWidth: 2,
                                            borderWidth: 4,
                                            fill: true,
                                            backgroundColor: gradient1,
                                            borderColor: '#40d5ff',
                                            hoverBackgroundColor: '#00c7ff',
                                            hoverBorderColor: '#2d91ad',
                                            tension: 0.2,
                                            data: pontos,
                                            borderJoinStyle: 'round',
                                            hoverRadius: 7
                                        },
                                        {
                                            label: 'Tentativas',
                                            pointBackgroundColor: 'white',
                                            pointRadius: 6,
                                            pointBorderWidth: 2,
                                            borderWidth: 4,
                                            fill: true,
                                            backgroundColor: gradient3,
                                            borderColor: '#78e6af',
                                            hoverBackgroundColor: '#1ee380',
                                            hoverBorderColor: '#0f6e3f',
                                            tension: 0.2,
                                            data: tentativa,
                                            borderJoinStyle: 'round',
                                            hoverRadius: 7
                                        }
                                    ]
                                };

                            var barGraph = new Chart(graphTarget, {
                                type: 'line',
                                data: chartdata,
                                options: {
                                    plugins: {
                                        legend: {
                                            position: "top",
                                            align: 'end',
                                            labels: {
                                                color: '#43425D'
                                            }
                                        }
                                    },
                                    scales: {
                                        x: {
                                            display: true,
                                            title: {
                                                display: true,
                                                text: 'Tentativa',
                                                color: '#43425D',
                                                font: {
                                                    size: 20,
                                                    lineHeight: 1.2
                                                }
                                            },
                                            ticks: {
                                                font: {
                                                    size: 14
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div><!--col-->
                </div><!--row-->
                <div class="row">
                <div class="col-7">
                        <div class="row justify-content-around head">
                            <h3>Consultas:</h3>
                        </div><!--row-->
                        <hr>
                        <div class="container-table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">DATA</th>
                                    <th scope="col">PONTUAÇÃO</th>
                                    <th scope="col">DURAÇÃO</th>
                                    <th scope="col">TENTATIVA</th>
                                    <th scope="col">AÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $rows = $sessaoDAO->pegarSessaoPaciente($id_paciente);
                                        $count = 0;
                                        foreach ($rows as $row){
                                            $count = $count + 1;
                                            echo"
                                                <tr>
                                                    <td>{$row['horaSessao']}</td>
                                                    <td>{$row["pontoSessao"]} pontos</td>
                                                    <td>
                                                        {$row["tempoSessao"]} min
                                                    </td>
                                                    <td>
                                                        {$row["tentativaSessao"]} tentativas
                                                    </td>
                                                    <td>
                                                        <a class='link-secondary func' href='../pgs/tentativa_menu.php?id_sessao={$row["id_sessao"]}' id='{$row["dataSessao"]}'><i class='bi bi-eye'></i></a>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div><!--container-table-->
                    </div><!--col-->
                    <div class="col-4">
                        <div class="insights">
                            <h3>Informações do paciente</h3>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-person-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Nome do paciente:</span>
                                    <?php
                                        include_once ("../dao/pacienteDAO.php");
                                        $pacienteDAO = new PacienteDAO();
                                        $insights = $pacienteDAO->pegarPorId($id_paciente);
                                        //print_r($insights);
                                        foreach ($insights as $row){
                                    ?>
                                            <a><span><?php echo $row['nomePaciente'] ?></span></a>
                                    <?php
                                        }
                                    ?>
                                </li> 
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-person-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Email: </span>
                                    <span><?php echo $row['email']?></span>
                                </li>
                                <li class="list-group-item">
                                    <div class="icon-li">   
                                        <i class="bi bi-clock-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Data cadastro: </span>
                                    <span>
                                        <?php 
                                            echo date_format(date_create($row['dtPrimeiroCadastro']),"d/m/Y-H:i:s");
                                        ?>
                                    </span>
                                    
                                </li>
                                <li class="list-group-item">
                                    <div class="icon-li">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                    </div><!--icon-->
                                    <span class="text-muted">Status: </span>
                                    <span><?php echo $row['statusPaciente'] ?></span>
                                </li>
                                <li class="list-group-item align-self-center">
                                <!--alterar status ao invés de excluir, possibilitando a exclusão da consulta-->
                                <a class='func btn btn-danger' href='' data-bs-toggle='modal' data-bs-target='#i<?php echo $id_paciente?>'>Excluir</a>
                                <div class="modal fade" id='<?php echo "i{$id_paciente}"?>' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info text-white">
                                                <h4 class='modal-title' id='exampleModalLabel'>Deletar consulta</h5>
                                            </div><!--modal-header-->
                                            <div class="modal-body">
                                                <form>
                                                    <div>
                                                        <h4>Você realmente deseja excluir este paciente?</h3>
                                                    </div>
                                                    <div class="footer-form">
                                                        <a title='Excluir' class="btn btn-outline-danger" href='../controle/pacientecontrole.php?id_paciente=<?php echo $row["id_paciente"] ?>&acao=excluir'>Excluir</a>
                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                    </div>
                                                </form>
                                            </div><!--modal-body-->
                                        </div><!--modal-content-->
                                    </div><!--modal-dialog-->
                                </div><!--modal-fade-->
                                </li>
                            </ul><!--list-group-->
                        </div><!--lista-->
                    </div><!--col-->
                </div><!--row-->
            </div><!--container-->
        </section><!--content-->
        <script src="../js/functions.js"></script>
    </body>
</html>