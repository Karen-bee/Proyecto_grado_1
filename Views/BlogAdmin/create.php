

<!-- Modal -->
<form action="/Literagiando/Routes/BlogRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="BlogsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Blogs</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" name="accion" value="nuevo" hidden>
        
        <div class="col">
          <label for="titulo_blog">Titulo/Blog</label>
          <input type="text" name="titulo_blog" id="titulo_blog" class="form-control" required>
        </div>

        <div class="col">
          <label for="subtitulo_blogs">Subtitulo</label>
          <input type="text" name="subtitulo_blog" id="subtitulo_blogs" class="form-control" required>
        </div>

        <div class="col">
          <label for="idtipo_blog">Tipo/Blog</label>
          <select name="idtipo_blog" id="idtipo_blog" class="form-control" required>
            <option value="">---Seleccióne---</option>
            <?php foreach ($tipoblogs['tipoBlogs'] as $row): ?>
            <option value="<?php echo $row['idtipo_blog']; ?>"><?php echo $row['tipo_blog'] ?></option>

            <?php endforeach ?>
          </select>
        </div>
        
        <div class="col">
          <label for="id_usuario">Usuario/Create</label>
          <select name="id_usuario" id="id_usuario" class="form-control" required>
            <option value="">---Seleccióne---</option>
            <?php foreach ($userss['users'] as $row): ?>
            <option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre_completo'] ?></option>

            <?php endforeach ?>
          </select>
        </div>

        <div class="col">
          <label for="detalle_blogs">Detalle/Blog</label>
          <textarea name="detalle_Blog" id="detalle_blog" cols="30" rows="10" class="form-control" required></textarea>
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