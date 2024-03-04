<?php

require_once (__DIR__.'/../../App/Controllers/Login/RoleController.php');
$rolesController = new RoleController();
$roles = $rolesController->ObtenerRoleController();

if ($roles['state'] == 1) {
    $roles = $roles['roles'];
} else {
    echo "<script>alert('Error al obtener datos');</script>";
}
?>
<form action="/Literagiando/Routes/UserRouter.php" method="POST">
<div class="modal fade" id="EditRol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Rol</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <input type="text" name="accion" value="editarRol" hidden>

      <input type="text" name="id_usuario" id="Id_usuarioo" hidden>


      <div class="col">
          <label for="idrol"><i class="bi bi-file-person"></i> Rol</label>
          <select name="idrol" id="Idrol"  class="form-control">
              <option value="">---Seleccióne----</option>
              <?php foreach ($roles as $row): ?>
              <option value="<?php echo $row['idrol']; ?>"><?php echo $row['nombre_rol'] ?></option>
              <?php endforeach; ?>
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>

    </div>
    </div>
  </div>
</div>
</form>