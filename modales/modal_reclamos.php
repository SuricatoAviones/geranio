
<div class="modal fade" id="exampleModal<?php echo $value['id_reclamo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Advertencia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
        <a class="btn btn-danger" href="controlador/c_reclamos.php?id=<?php echo $value['id_reclamo']; ?>&accion=eliminar">Confirmar</a>
      </div>
    </div>
  </div>
</div>