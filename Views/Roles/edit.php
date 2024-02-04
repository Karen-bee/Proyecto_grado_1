<?php

require_once (__DIR__.'/../../App/Controllers/Login/PermisosController.php');
$permisoController = new PermisosController();
$permisos = $permisoController->ObtenerPermisoController();

$rolActivo = isset($_GET['idrol']) ? $_GET['idrol'] : 0;

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';
$nombre_rol = isset($_GET['nombre_rol']) ? $_GET['nombre_rol'] : '';


if ($accion) {
    echo '<script>$(document).ready(function() { $("#EditarRol").modal("show"); });</script>';
}


?>

<div class="modal fade" id="EditarRol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario de edición -->
        <form id="formEditarRol" action="/Literagiando/Routes/RolRouter.php" method="post">
          <input type="hidden" name="idrol" id="idrol" value="<?php echo $rolActivo ?>">
          <label for="nombre_rol" class="form-label">Nombre/Rol:</label>
          <input type="text" id="accion" name="action" value="eliminarPermiso" hidden>
          <input type="text" id="idpagina" name="id_pagina"  hidden>
          <input type="text" class="form-control" id="nombre_rol"  value="<?php echo $nombre_rol ?>"required>
          <br>
          <table class="table table-striped table-hover">
            <thead>
                <tr>
                  <th scope="col">Pagina</th>
                  <th scope="col">Habilitar</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
              <?php if($permisos['state']==1){
                $permisos = $permisos['permisos'];  
                foreach ($paginas as $pagina) { ?>
                <tr>
                  
                  <td><?php echo $pagina['nombre_pagina'] ?></td>
                  <td><label class="switch"><input onclick="updateIdPagina(this, <?php echo $pagina['id_pagina']; ?>)" type="checkbox" <?php 
                  foreach($permisos as $permiso){  
                    if($permiso['idrol']==$rolActivo && $permiso ['id_pagina']==$pagina['id_pagina']) {
                        echo 'checked';
                    }
                  }
                  ?>><span class="slider round"></span></label></td>

                </tr>
              <?php  }} ?>
            </table>


          <a href="./index.php" class="btn btn-default">Cancelar</a>
          <button type="submit" class="btn butn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
    function updateIdPagina(checkbox, idPagina) {
        if (checkbox.checked) {
            document.getElementById('accion').value = "crearPermiso";
            document.getElementById('idpagina').value = idPagina;
            document.getElementById('formEditarRol').submit();
        } else {
            document.getElementById('accion').value = "eliminarPermiso";
            document.getElementById('idpagina').value = idPagina;
            document.getElementById('formEditarRol').submit();
        }
    }
</script>

