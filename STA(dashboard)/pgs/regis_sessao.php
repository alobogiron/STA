<html>
    <head>
        <title>STA</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale= 1.0"/>
    </head>
    <body>
        <script src="../js/jquery.js"></script>
        <div class="container">
            <form action="../controle/sessaocontrole.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="acao" value="inserir">
                <span>Profissional</span>
                <select name="fk_id_profissional">
                    <option id="sla" disabled selected value>Escolha uma opção</option>
                    <?php
                        include_once("../dao/profissionalDAO.php");
                        $profissionalDAO = new ProfissionalDAO();
                        $linhas = $profissionalDAO->pegarTodos();

                        foreach($linhas as $profissional){
                            echo "<option value='{$profissional["id_profissional"]}'>{$profissional["nomeProfissional"]}</option>";
                        }
                    ?>
                </select>
                <br>
                <span>Paciente</span>
                <select name="fk_id_paciente">
                    <option disabled selected value>Escolha uma opção</option>
                    <?php
                        include_once("../dao/pacienteDAO.php");
                        $pacienteDAO = new PacienteDAO();
                        $linhas = $pacienteDAO->pegarTodos();

                        foreach($linhas as $paciente){
                            echo "<option value='{$paciente["id_paciente"]}'>{$paciente["nomePaciente"]}</option>";
                        }
                    ?>
                </select>
                <br>
                <!--<span>Status da sessão</span>
                <input type="text" name="statusSessao" placeholder="Status da sessão"/>
                <br/>-->
                <span>Data da sessão</span>
                <input id="data" type="datetime-local" name="dataSessao" placeholder="Dia da sessão"/>
                <br/>
                <input type="submit"/>
            </form>
        </div><!--container-->
    </body>
</html>