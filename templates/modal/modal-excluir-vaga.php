<!-- Modal -->
<div class="modal fade" id="ex<?php echo $row->cd_vaga; ?>" tabindex="-1" role="dialog" aria-labelledby="titulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="titulo">Você tem certeza que deseja excluir?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="../../apply/apply_excluir_vaga.php">
      	<center class="mt-4"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success" name="confirmar" value="<?php echo $row->cd_vaga; ?>">Confirmar</button></center>
        </form>
      </div>
    </div>
  </div>
</div>