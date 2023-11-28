
<!-- Modal -->
<form action="" method="post" enctype="multipart/form-data">
<div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Evento</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="col">
            <label for="">Titulo/Evento</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col">
            <label for="idtipodedocumento"><i class="bi bi-file-person"></i> Tipo/Documento</label>
            <select name="idtipodedocumento" id="idtipodedocumento"  class="form-control">
                <option value="">---Seleccióne----</option>
                <?php foreach ($documents['documents'] as $row): ?>
                <option value="<?php echo $row['idtipodocumento']; ?>"><?php echo $row['nombre_documento'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <label for="">Detalle/Evento</label>
            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        
        <div class="col" style="margin-top: 10px;">
            <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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