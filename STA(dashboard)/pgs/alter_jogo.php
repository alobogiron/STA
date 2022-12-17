<html>
    <head>
        <title>STA</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale= 1.0"/>
        <?php
            include_once("../dao/jogoDAO.php");
            $jogoDAO = new JogoDAO();
            $resultado = $jogoDAO->pegarPorId($_GET["id_jogo"]);
            $linha = $resultado[0];
        ?>
    </head>
    <body>
        <div class="container">
            <form action="../controle/jogocontrole.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="acao" value="alterar">
                <input type="hidden" name="id_jogo" value="<?php echo $linha['id_jogo'] ?>">
                <span>Nome</span>
                <input type="text" name="nomeJogo" placeholder="Nome do Jogo" value="<?php echo $linha['nomeJogo']?>"/>
                <br/>
                <span>Tipo</span>
                <input type="text" name="tipo" placeholder="Tipo do Jogo" value="<?php echo $linha['tipo']?>"/>
                <br/>
                <span>Descrição</span>
                <input type="text" name="descricao" placeholder="Descrição" value="<?php echo $linha['descricao']?>"/>
                <br/>
                <span>Jogo</span>
                <input type="text" name="srcJogo" placeholder="srcJogo" value="<?php echo $linha['srcJogo']?>"/>
                <br/>
                <input type="submit"/>
            </form>
        </div><!--container-->
    </body>
</html>