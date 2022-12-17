<html>
    <head>
        <title>STA</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale= 1.0"/>
        <?php
            include_once("../dao/sessaoDAO.php");
            $sessaoDAO = new SessaoDAO();
            $resultado = $sessaoDAO->pegarPorId($_GET["id_sessao"]);
            $linha = $resultado[0];
            //print_r($_GET);
            //print_r($linha);
        ?>
    </head>
    <body>
        <div class="container">
            <form action="../controle/sessaocontrole.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="acao" value="alterar">
                <input type="hidden" name="id_sessao" id="id" value="<?php echo $linha['id_sessao'] ?>">
                <span>Profissional</span>
                <select name="fk_id_profissional">
                    <option value="<?php echo $linha['fk_id_profissional']?>"><?php echo $linha['nomeProfissional']?></option>
                    <?php
                        include_once("../dao/profissionalDAO.php");
                        $profissionalDAO = new ProfissionalDAO();
                        $linhas = $profissionalDAO->pegarExcetoId($linha["fk_id_profissional"]);

                        foreach($linhas as $profissional){
                            echo "<option value='{$profissional["id_profissional"]}'>{$profissional["nomeProfissional"]}</option>";
                        }
                    ?>
                </select>
                <br>
                <span>Paciente</span>
                <select name="fk_id_paciente">
                <option value="<?php echo $linha['fk_id_paciente']?>"><?php echo $linha['nomePaciente']?></option>
                    <?php
                        include_once("../dao/pacienteDAO.php");
                        $pacienteDAO = new PacienteDAO();
                        $linhas = $pacienteDAO->pegarExcetoId($linha["fk_id_paciente"]);

                        foreach($linhas as $paciente){
                            echo "<option value='{$paciente["id_paciente"]}'>{$paciente["nomePaciente"]}</option>";
                        }
                    ?>
                </select>
                <br>
                <span>Status da sessão</span>
                <input type="text" name="statusSessao" placeholder="Status da sessão" value="<?php echo $linha['statusSessao']?>"/>
                <br/>
                <span>Data da sessão</span>
                <input type="datetime-local" name="dataSessao" placeholder="Dia da sessão" value="<?php echo date('Y-m-d\TH:i:s', strtotime($linha['dataSessao']));?>"/>
                <br/>
                <input type="submit"/>
            </form>
        </div><!--container-->
        <div>
            <?php
                echo "<a title='Excluir' href='../controle/tentativacontrole.php?fk_id_sessao={$linha['id_sessao']}&acao=pegarSessao'><input type='button' value='TESTE' /></a>"
            ?>
        </div>
        <script src="../js/jquery.js"></script>
        <script src="../node_modules/chart.js/dist/chart.js"></script>
        <div>
            <canvas id="graphCanvas"></canvas>
        </div>
        <?php
            include_once ("../dao/tentativaDAO.php");
            $tentativaDAO = new tentativaDAO();
            $rows = $tentativaDAO->pegarPorSessao($_GET["id_sessao"]);
            print_r($rows);
        ?>
        <script>

        $(document).ready(function () {
            showGraph();
        });


        function showGraph(){
        }

        var data = <?php echo json_encode($rows); ?>;
        console.log(data);
        var inicio = [];
        var pontos = [];
        var tempo = [];


        for (var i in data) {
            inicio.push(data[i].inicio);
            pontos.push(data[i].scoreTentativa);
            tempo.push(data[i].tempo);
        }

        var chartdata = {
            labels: inicio,
            datasets: [
                    {
                        label: 'Pontuação',
                        pointBackgroundColor: 'yellow',
                        pointBorderColor: 'black',
                        pointRadius: 6,
                        pointBorderWidth: 2,
                        borderWidth: 4,
                        backgroundColor: '#49e2ff',
                        borderColor: 'red',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        tension: 0.1,
                        data: pontos,
                        borderDash: [4],
                        borderJoinStyle: 'round'
                    }
                ]
            };

        var graphTarget = $("#graphCanvas");

        var barGraph = new Chart(graphTarget, {
            type: 'line',
            data: chartdata
        });

        /**
            const labels = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
            ];
            const data = {
                labels: labels,
                datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
                }]
            };
            const config = {
                type: 'line',
                data: data,
                options: {}
            };
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
            */
        </script>
    </body>
</html>