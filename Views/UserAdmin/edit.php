
<form action="/Literagiando/Routes/UserRouter.php" method="POST">
<div class="modal fade" id="EditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuarios</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <input type="text" name="accion" value="editar" hidden>

      <input type="text" name="idusuario" id="Idusuario" hidden>
      <input type="password" name="password_actual" id="password" hidden>


      <div class="col">
          <label for="idtipodedocumento"><i class="bi bi-file-person"></i> Tipo/Documento</label>
          <select name="idtipodedocumento" id="Idtipodedocumento"  class="form-control">
              <option value="">---Seleccióne----</option>
              <?php foreach ($documents['documents'] as $row): ?>
              <option value="<?php echo $row['idtipodocumento']; ?>"><?php echo $row['nombre_documento'] ?></option>
              <?php endforeach; ?>
          </select>
      </div>

      <div class="col">
          <label for="documento_usuario"><i class="bi bi-fingerprint"></i> N°. Documento</label>
          <input type="text" name="documento_usuario" id="Documento_usuario" value="<?php echo isset($user['documento_usuario']) ? $user['documento_usuario'] : ''; ?>" class="form-control">
      </div>

      <div class="col">
          <label for="nombrecompleto_usuario"><i class="bi bi-person"></i> Nombre Completo</label>
          <input type="text" name="nombrecompleto_usuario" id="Nombrecompleto_usuario" class="form-control">
      </div>
      <div class="col">
          <label for="direccion_usuario"><i class="bi bi-geo-alt-fill"></i> Dirección</label>
          <input type="text" name="direccion_usuario" id="Direccion_usuario" class="form-control">
      </div>

      <div class="col">
          <label for="telefono_usuario"><i class="bi bi-telephone"></i> Telefono</label>
          <input type="text" name="telefono_usuario" id="Telefono_usuario" class="form-control">
      </div>

      <div class="col">
          <label for="username"><i class="bi bi-person-bounding-box"></i> Nombre/Usuario</label>
          <input type="text" name="username" id="Username" class="form-control">
      </div>

      <div class="col">
          <label for="correo_usuario"><i class="bi bi-envelope-at"></i> E-mail</label>
          <input type="email" name="correo_usuario" id="Correo_usuario" class="form-control">
      </div>

      <div class="col">
          <label for="password"><i class="bi bi-key"></i> Contraseña</label>
          <input type="password" name="password" class="form-control">
      </div>

      <div class="col">
          <label for="password"><i class="bi bi-key"></i>Confirmar Contraseña</label>
          <input type="password" name="password1" class="form-control">
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>