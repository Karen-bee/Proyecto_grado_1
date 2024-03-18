<?php 
require_once (__DIR__ . '/../../App/Controllers/EventoController.php');
$eventoController = new EventoController();

$vistaActual = 9;

include '../Layouts/header.php';


$eventos = $eventoController->ObtenerMisEventosController($row['id_usuario']);


if($eventos['state']==1){
  $eventos = $eventos['eventos'];
}else{
  echo '<script>alert("error al obtener datos")</script>';
}

if($eventos==''){
  echo '<script>alert("error al obtener datos")</script>';
}

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;
if($busqueda){

  $searchTerm = strtolower($busqueda); // Convertir el término de búsqueda a minúsculas

  $resultados = array_filter($eventos, function ($evento) use ($searchTerm) {
      $nombreEvento = strtolower($evento['titulo_evento']);

      return strpos($nombreEvento, $searchTerm) !== false ;
  });

  $eventos = $resultados;
}


// Calcular el número total de páginas que se van a mostrar en la paginación

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$eventosPorPagina = 5;
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

if (isset($_POST["idEvento"])) {

  if(isset($_POST["accion"])){
    desinscribirEvento($row['id_usuario'], $_POST["idEvento"],$_POST["accion"]);
    
  }
} 

?>

<title>Mis Eventos</title>

<section class="home-section">

<div class="container-eventos">

<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Mis Eventos </h1></div>
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
      <th scope="col">Codigo</th>
      <th scope="col">Evento</th>
      <th scope="col">Fecha</th>
      <th scope="col">Asistencia</th>
      <th scope="col">Cancelar</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    
    <?php foreach ($eventos as $evento) { ?>
    <tr>
      <th scope="row"><?php echo $evento['ideventos']?></th>
      <td><?php echo $evento['titulo_evento']?></td>
      <td><?php echo formatfecha($evento['fecha_evento']);?></td>
      <td>
        <form action="" method="POST">
          <input type="hidden" name="idEvento" value="<?php echo $evento['ideventos']; ?>">
          <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
          <input type="hidden" name="accion" value="<?php echo $evento['asiste']; ?>">
          <input type="checkbox" class="isActive" onclick="this.form.submit()" <?php echo $evento['asiste'] === 'si' ? 'checked' : ''; ?>>
          <?php echo $evento['asiste']; ?>
        </form>
      </td>
      <td>
        <form action="" method="POST">
          <input type="hidden" name="idEvento" value="<?php echo $evento['ideventos']; ?>">
          <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']; ?>">
          <input type="hidden" name="accion" value="borrar">
          <button type="submit" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></button>
        </form>
      </td>
    </tr>
    <?php }?>

  </tbody>
</table>
</div>
<div class="peg-button-arrow">
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



<?php include '../Layouts/footer.php' ?>