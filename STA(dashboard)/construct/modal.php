<!-- Modal -->
<div class="modal fade" id=" <?php echo"{$linha["id_jogo"]}";?> " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Tem certeza que quer excluir?</h1>
    <?php
    echo"
    <a title='Excluir' href='../controle/jogocontrole.php?id_jogo={$linha["id_jogo"]}&acao=excluir'><input type='button' value='Apagar' /></a>
    ";
    ?>
  </div><!--modal-content-->
</div><!--modal-->