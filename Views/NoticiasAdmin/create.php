

<!-- Modal -->
<form action="/Routes/NoticiaRouter.php" method="post" enctype="multipart/form-data">
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
            <label for="titulo_noticias">Titulo/Noticia</label>
            <input type="text" name="titulo_noticias" id="titulo_noticias" class="form-control">
        </div>

        <div class="col">
            <label for="idusuario">Usuario</label>
            <input type="text" name="idusuario" id="idusuario" class="form-control">
        </div>
       
        <div class="col">
            <label for="idtiponoticia">Tipo/Evento</label>
            <select name="idtiponoticia" id="idtiponoticia" class="form-control">
                <option value="">---Seleccióne---</option>
                <?php foreach ($tiponoticias['tiponoticias'] as $row): ?>
                <option value="<?php echo $row['idtiponoticia']; ?>"><?php echo $row['tipo_noticia'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col">
            <label for="subtitulo_noticias">Detalle/Noticia</label>
            <textarea name="subtitulo_noticias" id="subtitulo_noticias" cols="30" rows="5" class="form-control"></textarea>
        </div>
        
        
        <div class="col" style="margin-top: 10px;">
            <input type="file" class="form-control" name="imagen_card" id="imagen_card" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>