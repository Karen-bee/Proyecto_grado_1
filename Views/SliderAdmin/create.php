<!-- Modal -->
<form action="/Literagiando/Routes/SliderRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="exampleAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Imagenes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="input-group">
            <input type="text" name="accion" value="nuevo" hidden>
            <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>