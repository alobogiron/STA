<html>
    <head>
        <title>STA</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale= 1.0"/>
    </head>
    <body>
        <div class="container">
            <form action="../controle/jogocontrole.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="acao" value="inserir">
                <span>Nome</span>
                <input type="text" name="nomeJogo" placeholder="Nome do Jogo"/>
                <br/>
                <span>Tipo</span>
                <input type="text" name="tipo" placeholder="Tipo do Jogo"/>
                <br/>
                <span>Descrição</span>
                <input type="text" name="descricao" placeholder="Descrição"/>
                <br/>
                <span>Jogo</span>
                <input type="text" name="srcJogo" placeholder="srcJogo"/>
                <br/>
                <input type="submit"/>
            </form>
        </div><!--container-->
    </body>
</html>