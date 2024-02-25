

<!-- Modal -->
<form action="/Literagiando/Routes/HomeRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="Crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Persona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="accion" value="nuevo" hidden>
        
        <div class="col-12">
            <label for="nombre_rol">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="col-12">
            <label for="nombre_rol">Cargo</label>
            <input type="text" name="cargo" class="form-control" required>
        </div>
        <div class="col-12">
            <label for="nombre_rol">Facultad</label>
            <input type="text" name="facultad" class="form-control" required>
        </div>
        <div class="col" style="margin-top: 10px;">
            <input type="file" class="form-control" required name="imagen" id="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>