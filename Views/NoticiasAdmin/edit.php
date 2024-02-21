

<!-- Modal -->
<form action="/Literagiando/Routes/NoticiaRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="EditarNoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Noticias</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" name="accion" value="editar" hidden>
        
        <div class="col">
          <label for="titulo_noticia">Titulo/Noticia</label>
          <input type="text" name="titulo_noticia" id="titulo_noticia" class="form-control" value="popo">
        </div>

        <div class="col">
          <label for="subtitulo_noticias">Subtitulo</label>
          <input type="text" name="subtitulo_noticias" id="subtitulo_noticias" class="form-control">
        </div>
        
        <div class="col">
          <label for="idtiponoticia">Tipo/Noticia</label>
          <select name="idtiponoticia" id="idtiponoticia" class="form-control">
            <option value="">---Seleccióne---</option>
            <?php foreach ($tiponoticias['tipoNoticias'] as $row): ?>
            <option value="<?php echo $row['idtipo_Noticia']; ?>"><?php echo $row['tipo_noticia'] ?></option>

            <?php endforeach ?>
          </select>
        </div>

        <div class="col">
          <label for="idusuario">Usuario/Create</label>
          <select name="idusuario" id="idusuario" class="form-control">
            <option value="">---Seleccióne---</option>
            <?php foreach ($userss['users'] as $row): ?>
            <option value="<?php echo $row['idusuario']; ?>"><?php echo $row['nombrecompleto_usuario'] ?></option>

            <?php endforeach ?>
          </select>
        </div>

        <div class="col">
          <label for="detalle_noticias">Detalle/Noticia</label>
          <textarea name="detalle_noticias" id="detalle_noticias" cols="30" rows="10" class="form-control"></textarea>
        </div>
    
        <div class="col" style="margin-top: 10px;">
            <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>

        <input type="hidden" id="idnoticias" name="idnoticias" value="">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>