

<!-- Modal -->
<form action="/Literagiando/Routes/NoticiaRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="NoticiasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Noticias</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" name="accion" value="nuevo" hidden>
        
        <div class="col">
          <label for="titulo_noticia">Titulo/Noticia</label>
          <input type="text" name="titulo_Noticia" id="titulo_noticia" class="form-control" required>
        </div>

        <div class="col">
          <label for="subtitulo_noticias">Subtitulo</label>
          <input type="text" name="subtitulo_noticias" id="subtitulo_noticias" class="form-control" required>
        </div>

        <div class="col">
          <label for="idtipo_noticia">Tipo/Noticia</label>
          <select name="idtipo_Noticia" id="idtipo_noticia" class="form-control" required>
            <option value="">---Seleccióne---</option>
            <?php foreach ($tiponoticias['tipoNoticias'] as $row): ?>
            <option value="<?php echo $row['idtipo_Noticia']; ?>"><?php echo $row['tipo_noticia'] ?></option>

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
          <label for="detalle_noticias">Detalle/Noticia</label>
          <textarea name="detalle_Noticia" id="detalle_noticias" cols="30" rows="10" class="form-control" required></textarea>
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