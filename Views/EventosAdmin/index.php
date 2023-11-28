<?php

require_once (__DIR__ . './../../App/Controllers/EventoController.php');
$eventoController = new EventoController();
$eventos = $eventoController->ObtenerEventosController();
$tipoeventos = $eventoController->ObtenerSelectEventController();



?>

<?php 
include '../Layouts/header.php';
include '../EventosAdmin/create.php';
include '../EventosAdmin/edit.php';
?>

    <title>Administrador Eventos</title>
    
    <section class="home-section">
      
      <div class="container-eventos">
        
        <div class="content-evento">
          <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
          <div class="col-4"><h1 id="title-eventos">Administrar Eventos </h1></div>
          <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
        </div>

        <div class="content-search">
          <form class="d-flex" role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class='bx bx-search'></i></button>
          </form>
        </div> 

        <div class="table-evento table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Detalle</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php if($eventos['state']==1){
                foreach ($eventos['eventos'] as $evento) { ?>
              <tr>
                <td><?php echo $evento['ideventos'] ?></td>
                <td><?php echo $evento['titulo_evento'] ?></td>
                <td><?php echo $evento['fecha_evento'] ?></td>
                <td><?php echo $descripcionTipoEvento = $evento['tipoevento']; ?></td>
                <td><?php echo $evento['detalle_evento'] ?></td>
                <td><img src="<?php echo substr($evento['imagen_eventos'], 2) ?>" alt="Imagen"></td>
                <td><?php echo $evento['estado_evento'] ?></td>
                <td>  
                  <a href="/Routes/EventoRouter.php?accion=editar&ideventos=<?php echo $ideventos; ?>" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#EditarModal"><i class='bx bxs-edit' ></i></a>
                  
                  <form action="/Routes/EventoRouter.php" method="POST">
                      <input type="text" name="accion" value="eliminar" hidden>
                      <input type="text" name="ideventos" value="<?php echo $evento['ideventos']; ?>" hidden>
                      <button type="submit" class="btn btn-outline-danger btn-sm">
                          <i class='bx bx-trash'></i>
                      </button>
                  </form>

                  
                </td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#EventoModal">Agregar</a>
          </div>

          <div class="col-4" id="arrow">
          <a href="#"><i class='bx bxs-left-arrow'></i></a>
          <a href="#"><i class='bx bxs-right-arrow'></i></a> 
          </div>

          <div class="col-4" id="page">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
            </ul>
          </nav>
          </div>
        </div>
      </div>

    </section>

<?php include '../Layouts/footer.php';?>