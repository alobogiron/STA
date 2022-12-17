    <?php
    shell_exec("start C:\Users\Public\Teste2\ShapeGame.application");
    ?>
<script>
    alertify.confirm().set({onshow:function(){
        alertify.message('Aguardando')
        $('.ajs-ok').css('display','none');
        setInterval(function(){ 
            $.ajax({
            url: "../controle/sessaocontrole.php",
            type: "POST",
            data : {
                acao: "verificaStatus",
                codSessao: "<?php echo $_GET['codSessao'] ?>"
            },
            success: function(result){
                if(result > 0){
                    $('.ajs-ok').fadeIn();
                    $('.ajs-cancel').fadeOut();
                    $('.ajs-ok').click(function() {
                        window.location.href = '../pgs/sessao_menu.php';
                    });
                }
            }
        }); 
        }, 5000);
    }});
    alertify.confirm('Alerta', 'O sistema está aguardando a conexão do jogo, utilize este código ao iniciar o jogo para efetuar a conexão: <?php echo $_GET['codSessao'] ?>', '?',
    function(){ 
        window.location.href = '../controle/sessaocontrole.php?codSessao=<?php echo $_GET['codSessao']?>&acao=updateStatus&statusSessao=Disponível';})
        .set({'label': 'Cancelar', 'closable': false});
</script>