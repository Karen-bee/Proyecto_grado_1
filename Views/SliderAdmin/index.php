<?php 
include_once(__DIR__ . '../../../App/Controllers/SliderController.php');
$sliderController = new SliderController();

$sliders = $sliderController->ObtenerAllSlidersController();

if($sliders['state']==1){
  $sliders = $sliders['sliders'];
}else{
  echo '<script>alert("error al obtener datos")</script>';
}

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$totalPaginas= 1;
$slidersPorPagina = 3;

$totalPaginas= ceil(count($sliders)/$slidersPorPagina);

$inicio = ($paginaActual - 1) * $slidersPorPagina;
$fin = $slidersPorPagina * $paginaActual;

// Obtener los sliders para la página actual
$sliders = array_slice($sliders, $inicio, $fin - $inicio);

function actualizarPaginacion($totalPaginas,$paginaActual) {
  echo '<ul class="pagination">';
  for ($i = 1; $i <= $totalPaginas; $i++) {
      $class = ($paginaActual && $paginaActual == $i) ? 'page-link active' : 'page-link';
      echo '<li class="page-item"><a class="' . $class . '" data-pagina="' . $i . '" href="?pagina=' . $i . '">' . $i . '</a></li>';
  }
  echo '</ul>';
}

$vistaActual = 5;

include '../Layouts/header.php';
include '../SliderAdmin/create.php';

?>


<title>Sliders Admin</title>

    <section class="home-section">
      
      <div class="container-eventos">
        
        <div class="content-evento">
          <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
          <div class="col-4"><h1 id="title-eventos">Administrador Slider Home </h1></div>
          <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
        </div>

        <br>

        <div class="table-evento table-responsive">
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre/Img</th>
                <th>Tipo</th>
                <th>Tamaño</th>
                <th>Ruta</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sliders as $slider) { ?>
              <tr>
                <td><?php echo $slider['id']?></td>
                <td><?php echo $slider['nombre']?></td>
                <td><?php echo $slider['tipo']?></td>
                <td><?php echo $slider['tamano']?></td>
                <td><?php echo $slider['ruta']?></td>
                <td><img src="<?php echo $slider['ruta'] ?>" alt="Imagen"></td>
                <td>
                    <form action="/Literagiando/Routes/SliderRouter.php" method="POST">
                        <input type="hidden" name="idSlider" value="<?php echo $slider['id']; ?>">
                        <input type="hidden" name="estado_slider" value="<?php echo $slider['activo']; ?>">
                        <input type="hidden" name="accion" value="activarSlider">
                        <input type="checkbox" class="isActive" onclick="this.form.submit()" <?php echo $slider['activo'] === 'Activo' ? 'checked' : ''; ?>>
                        <?php echo $slider['activo']; ?>
                    </form>
                </td>
              
                <td>
                  <a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleAgregar" style="display: none;"><i class='bx bxs-edit' ></i></a>
                  <a href="/Literagiando/Routes/SliderRouter.php?accion=eliminar&idslider=<?php echo htmlspecialchars($slider['id']); ?>" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
                </td>
              </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#exampleAgregar">Agregar</a>
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

        <div>
          <br>
        </div>
      </div>

    </section>


<?php include '../Layouts/footer.php' ?>