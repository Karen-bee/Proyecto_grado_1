

<!-- Modal -->
<form action="/Literagiando/Routes/EventoRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="EditarEvento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Evento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" name="accion" value="editar" hidden>
        
        <div class="col">
          <label for="titulo_evento">Titulo/Evento</label>
          <input type="text" name="titulo_evento" id="tituloEvento" class="form-control" value="">
        </div>

        <div class="col">
            <label for="subtitulo_evento">Subtitulo</label>
            <input type="text" name="subtitulo_evento" id="Subtitulo_evento" class="form-control" required>
        </div>
        <div class="col">
            <label for="lugar">lugar</label>
            <input type="text" name="lugar" id="Lugar" class="form-control" required>
        </div>
        
        <div class="col">
          <label for="idtipoevento">Tipo/Evento</label>
          <select name="idtipo_evento" id="idtipoevento" class="form-control">
            <option value="">---Seleccióne---</option>
            <?php foreach ($tipoeventos['tipoeventos'] as $row): ?>
            <option value="<?php echo $row['idtipo_evento']; ?>"><?php echo $row['nombre_evento'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="col">
          <label for="detalle_evento">Detalle/Evento</label>
          <textarea name="detalle_evento" id="detalle_eventoE" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="col">
            <label for="fecha_evento">Fecha</label>
            <input type="datetime-local" name="fecha_evento" id="Fecha_evento" class="form-control" required>
        </div>
    
        <div class="col" style="margin-top: 10px;">
            <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>

        <input type="hidden" id="ideventos" name="ideventos" value="">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>