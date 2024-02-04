

<!-- Modal -->
<form action="/Literagiando/Routes/RolRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="CrearRol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Rol</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" name="action" value="nuevo" hidden>
        
        <div class="col-12">
            <label for="nombre_rol">Nombre/Rol</label>
            <input type="text" name="nombre_rol" class="form-control">
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