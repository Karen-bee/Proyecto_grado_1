<?php

require_once (__DIR__ . '/../../App/Controllers/EventoController.php');
$eventoController = new EventoController();
$eventos = $eventoController->ObtenerTodosEventosController();
$tipoeventos = $eventoController->ObtenerSelectEventController();

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;

if($eventos['state']==1){
  $eventos = $eventos['eventos'];
}else{
  alert("error al obtener datos");
}

if($busqueda){

  $searchTerm = strtolower($busqueda); // Convertir el término de búsqueda a minúsculas

  $resultados = array_filter($eventos, function ($evento) use ($searchTerm) {
      $nombreEvento = strtolower($evento['titulo_evento']);
      $detalleEvento = strtolower($evento['detalle_evento']);

      return strpos($nombreEvento, $searchTerm) !== false || 
            strpos($detalleEvento, $searchTerm) !== false;
  });

  $eventos = $resultados;
}

// Calcular el número total de páginas que se van a mostrar en la paginación
$eventosPorPagina = 4;
$totalPaginas = ceil(count($eventos) / $eventosPorPagina);

$inicio = ($paginaActual - 1) * $eventosPorPagina;
$fin = $eventosPorPagina * $paginaActual;

// Obtener los eventos para la página actual
$eventos = array_slice($eventos, $inicio, $fin - $inicio);



function actualizarPaginacion($totalPaginas,$paginaActual) {
  echo '<ul class="pagination">';
  for ($i = 1; $i <= $totalPaginas; $i++) {
      $class = ($paginaActual && $paginaActual == $i) ? 'page-link active' : 'page-link';
      echo '<li class="page-item"><a class="' . $class . '" data-pagina="' . $i . '" href="?pagina=' . $i . '">' . $i . '</a></li>';
  }
  echo '</ul>';
}

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
          
          <form class="d-flex" role="search" action="" method="GET">
            <input class="form-control" type="search" name="busqueda" placeholder="Search" aria-label="Search">
            <button type="submit" class="btn btn-outline-success"><i class='bx bx-search'></i></button>
          </form>
        </div> 

        <div class="table-evento table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Fecha</th>
                <th>Titulo</th>
                <th>Subtitulo</th>
                <th>Lugar</th>
                <th>Detalle</th>
                <th>Tipo</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($eventos as $evento) { ?>
              <tr>
                <td><?php echo $evento['ideventos']?></td>
                <td><?php echo formatfecha($evento['fecha_evento'])?></td>
                <td><?php echo $evento['titulo_evento']?></td>
                <td><?php echo $evento['subtitulo_evento']?></td>
                <td><?php echo $evento['lugar']?></td>
                <td><?php echo $evento['detalle_evento']?></td>
                <td><?php echo $evento['tipoevento']?></td>
                <td><img src="<?php echo $evento['imagen_eventos'] ?>" alt="Imagen"></td>
                <td>
                    <form action="/Literagiando/Routes/EventoRouter.php" method="POST">
                        <input type="hidden" name="idEvento" value="<?php echo $evento['ideventos']; ?>">
                        <input type="hidden" name="estado_evento" value="<?php echo $evento['estado_evento']; ?>">
                        <input type="hidden" name="accion" value="activarEvento">
                        <input type="checkbox" class="isActive" onclick="this.form.submit()" <?php echo $evento['estado_evento'] === 'Activo' ? 'checked' : ''; ?>>
                        <?php echo $evento['estado_evento']; ?>
                    </form>
                </td>
                <td>  
                  <a data-id="<?php echo $evento['ideventos']; ?>" href="/Literagiando/Routes/EventoRouter.php?accion=editar&idevento=<?php echo $evento['ideventos']; ?>" class="btn btn-outline-dark btn-sm btn-editar-evento" data-bs-toggle="modal" data-bs-target="#EditarEvento"><i class='bx bxs-edit' ></i></a>
                  <a href="/Literagiando/Routes/EventoRouter.php?accion=eliminar&ideventos=<?php echo htmlspecialchars($evento['ideventos']); ?>" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>                
                </td>
                <script>
                  // Asignar evento de clic al botón de editar
                  $(`.btn-editar-evento[data-id=<?php echo $evento['ideventos']; ?>]`).on('click', function() {
                      llenarFormularioEvento(<?php echo json_encode($evento); ?>);
                  });
                  // Función para llenar el formulario con los datos de la evento
                  function llenarFormularioEvento(evento) {
                    eventoSelected = evento;
                    console.log(eventoSelected); 
                    $('#tituloEvento').val(evento.titulo_evento).trigger('change'); 
                    $('#Subtitulo_evento').val(evento.subtitulo_evento); 
                    $('#Lugar').val(evento.lugar); 
                    $('#idtipoevento').val(evento.idtipo_evento); 
                    $('#ideventos').val(evento.ideventos); 
                    $('#detalle_eventoE').val(evento.detalle_evento); 
                    $('#Fecha_evento').val(evento.fecha_evento); 
                  }    
                </script>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#EventoModal">Agregar</a>
          </div>

          <div class="col-4" id="arrow">
            <a href='?pagina=<?php echo ($paginaActual-2 + $totalPaginas)%($totalPaginas)+1 ?>'><i class='bx bxs-left-arrow'></i></a>
            <a href='?pagina=<?php echo ($paginaActual)%($totalPaginas)+1 ?>'><i class='bx bxs-right-arrow'></i></a> 
          </div>




          <div class="col-4" id="page">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <?php actualizarPaginacion($totalPaginas,$paginaActual)?>
              </ul>
            </nav>
          </div>
        </div>
      </div>

    </section>



<?php include '../Layouts/footer.php';?>


