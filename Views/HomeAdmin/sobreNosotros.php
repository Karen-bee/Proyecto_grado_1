<?php
$vistaActual = 10;

include '../Layouts/header.php';

require_once (__DIR__ . '/../../App/Controllers/HomeController.php');
$homeController = new HomeController();

function obtenerDatosHome($controller, $metodo) {
  $resultado = $controller->$metodo();
  if($resultado['state'] === true) {
      return $resultado['sobre_nosotros'];
  }
  return null; // O manejar el error según sea necesario
}

// Utilizando la función para obtener los datos necesarios
$profesores = obtenerDatosHome($homeController, 'ObtenerProfesoresController');
$sobre_nosotros = obtenerDatosHome($homeController, 'ObtenerSobre_nosotrosController'); 
$objetivos = obtenerDatosHome($homeController, 'ObtenerObjetivosController');
$servicios = obtenerDatosHome($homeController, 'ObtenerServiciosController');
$generos = obtenerDatosHome($homeController, 'ObtenerGenerosController');

//$id = array_shift($sobre_nosotros[0]);


// Para el modal de 'Sobre Nosotros'
generarEditModal('Editar', 'Editar Sobre Nosotros', 'editarSobreNosotros', 'sobrenosotros', $sobre_nosotros);
generarEditModal('EditarObjetivos', 'Editar Objetivos', 'editarSobreNosotros', 'objetivos', $objetivos);
generarEditModal('EditarServicios', 'Editar Servicios', 'editarSobreNosotros', 'servicios', $servicios);
generarEditModal('EditarGeneros', 'Editar Generos', 'editarSobreNosotros', 'generos_literarios', $generos);


generarCreateModal('CrearObjetivos', 'Agregar Objetivo', 'crear', 'objetivos', $objetivos);
generarCreateModal('CrearServicios','Agregar Servicio','crear', 'servicios', $servicios);
generarCreateModal('CrearGenero','Agregar Género','crear', 'generos_literarios', $generos);


$titulo = $sobre_nosotros;


     

include 'create.php';
include 'edit.php';


?>

<title>Admin Sobre Nosotros</title>

<section class="home-section">

<div class="container-eventos">

<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Administración Titulo</h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>

<div class="table-evento table-responsive">

<table class="table table-bordered table-sm">
  <thead>
      <tr>
      <?php
        // Imprimir títulos de las columnas
        foreach ($titulo[0] as $columnName => $value) {
          echo '<th scope="col">' . $columnName . '</th>';
        }
      ?>
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
    <?php
      // Imprimir valores de las celdas
      foreach ($titulo as $values) {
        echo '<tr>';
        foreach ($values as $columnName => $value) {
          if($columnName == 'activo'){
            echo '<td><span>' . ($value == '1' ?  "Sí" : "No") . '</span></td>';
          }elseif($columnName == 'imagen'){
            echo '<td><img src="'.$value.'" width=50 height=50 alt="Imagen del servicio"/></td>';
          }else{
            echo '<td><span>' . $value . '</span></td>';
          }
        }
        echo '</tr>';
      }
    ?>
</table>

</div>


<a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Editar"><i class='bx bxs-edit'></i>&nbsp;Editar Pagina Sobre Nosotros</a>
<br>
<br>
</div>
  <div class="container-eventos">
<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Administración Objetivos</h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>

<div class="table-evento table-responsive">

<table class="table table-bordered table-sm">
  <thead>
      <tr>
      <?php
        
        // Imprimir títulos de las columnas
        foreach ($objetivos[0] as $columnName => $value) {
          echo '<th scope="col">' . $columnName . '</th>';
        }
      ?>
      <th>Acción</th>
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
    <?php
      // Imprimir valores de las celdas
      foreach ($objetivos as $values) {
        echo '<tr>';
        foreach ($values as $columnName => $value) {
          if($columnName == 'activo'){
            echo '<td><span>' . ($value == '1' ?  "Sí" : "No") . '</span></td>';
          }else{
            echo '<td><span>' . $value . '</span></td>';
          }
        }
        ?> 
        <td>  
            <a href="#" class="btn btn-outline-dark btn-sm editar" data-bs-toggle="modal" data-bs-target="#EditarObjetivos"><i class='bx bxs-edit'></i></a>
            <form action="/Literagiando/Routes/HomeRouter.php" method="post">
                <input type="hidden" name="accion" value="borrar">
                <input type="hidden" name="tabla" value="objetivos">
                <input type="hidden" name="id_objetivo" value="<?php echo htmlspecialchars($values['id_objetivo']); ?>">
                <button type="submit" class="btn btn-outline-danger btn-sm" ><i class='bx bx-trash'></i></button>
            </form>            
        </td>
        </tr>
    <?php  }    ?>
</table>
</div>
<div class="peg-button-arrow">
<div class="col-4" id="agregar">
  <a class="butn" id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#CrearObjetivos">Agregar</a>
  </div>
  </div>
<br>
</div>
<div class="container-eventos">

<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Administración Servicios </h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>

<div class="table-evento table-responsive">

<table class="table table-bordered table-sm">
  <thead>
      <tr>
      <?php
        
        // Imprimir títulos de las columnas
        foreach ($servicios[0] as $columnName => $value) {
          echo '<th scope="col">' . $columnName . '</th>';
        }
      ?>
      <th>Acción</th>
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
    <?php
      // Imprimir valores de las celdas
      foreach ($servicios as $values) {
        echo '<tr>';
        foreach ($values as $columnName => $value) {
          if($columnName == 'activo'){
            echo '<td><span>' . ($value == '1' ?  "Sí" : "No") . '</span></td>';
          }elseif($columnName == 'imagen'){
            echo '<td><img src="'.$value.'" width=50 height=50 alt="Imagen del servicio"/></td>';
          }else{
            echo '<td><span>' . $value . '</span></td>';
          }
        }
        ?> 
        <td>  
            <a href="#" class="btn btn-outline-dark btn-sm editar" data-bs-toggle="modal" data-bs-target="#EditarServicios"><i class='bx bxs-edit'></i></a>
            <form action="/Literagiando/Routes/HomeRouter.php" method="post">
                <input type="hidden" name="accion" value="borrar">
                <input type="hidden" name="tabla" value="servicios">
                <input type="hidden" name="id_servicios" value="<?php echo htmlspecialchars($values['id_servicios']); ?>">
                <button type="submit" class="btn btn-outline-danger btn-sm" ><i class='bx bx-trash'></i></button>
            </form>                
        </td>
        </tr>
    <?php  }    ?>
</table>
</div>
<div class="peg-button-arrow">
<div class="col-4" id="agregar">
  <a class="butn" id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#CrearServicios">Agregar</a>
  </div>
  </div>
<br>
</div>
<div class="container-eventos">
<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Administración Generos </h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>

<div class="table-evento table-responsive">

<table class="table table-bordered table-sm">
  <thead>
      <tr>
      <?php
        
        // Imprimir títulos de las columnas
        foreach ($generos[0] as $columnName => $value) {
          echo '<th scope="col">' . $columnName . '</th>';
        }
      ?>
      <th>Acción</th>
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
    <?php
      // Imprimir valores de las celdas
      foreach ($generos as $values) {
        echo '<tr>';
        foreach ($values as $columnName => $value) {
          if($columnName == 'activo'){
            echo '<td><span>' . ($value == '1' ?  "Sí" : "No") . '</span></td>';
          }else{
            echo '<td><span>' . $value . '</span></td>';
          }
        }
        ?> 
        <td>  
            <a href="#" class="btn btn-outline-dark btn-sm editar" data-bs-toggle="modal" data-bs-target="#EditarGeneros"><i class='bx bxs-edit'></i></a>
            <form action="/Literagiando/Routes/HomeRouter.php" method="post">
                <input type="hidden" name="accion" value="borrar">
                <input type="hidden" name="tabla" value="generos_literarios">
                <input type="hidden" name="id_generos" value="<?php echo htmlspecialchars($values['id_generos']); ?>">
                <button type="submit" class="btn btn-outline-danger btn-sm" ><i class='bx bx-trash'></i></button>
            </form>                  
        </td>
        </tr>
    <?php  }    ?>
</table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var botonesEditar = document.querySelectorAll(".editar");

        botonesEditar.forEach(function(boton) {
            boton.addEventListener("click", function(event) {
                // Obtener la fila actual
                var fila = event.target.closest("tr");
                
                // Obtener todos los elementos <td> de la fila
                var celdas = fila.querySelectorAll("td");


                // Iterar sobre los elementos de la fila
                celdas.forEach(function(celda, index) {
                    // Obtener el nombre de la columna desde el encabezado de la tabla
                    var nombreColumna = fila.closest("table").querySelector("th:nth-child(" + (index + 1) + ")").textContent;

                   if (nombreColumna == "ID"){
                      var valorCelda = celda.querySelector("span").textContent;
                      document.getElementById('idProfe').value = valorCelda;
                      return;
                   }
                   if (nombreColumna == "Nombre"){
                      var valorCelda = celda.querySelector("span").textContent;
                      document.getElementById('nombreProfe').value = valorCelda;
                      return;
                   }
                   if (nombreColumna == "Cargo"){
                      var valorCelda = celda.querySelector("span").textContent;
                      document.getElementById('cargoProfe').value = valorCelda;
                      return;
                   }
                   if (nombreColumna == "Facultad"){
                      var valorCelda = celda.querySelector("span").textContent;
                      document.getElementById('facuProfe').value = valorCelda;
                      return;
                   }

                    if(nombreColumna == 'activo' || nombreColumna == 'Acción' ||  nombreColumna == 'imagen'){
                      //document.getElementById(nombreColumna).value = valorCelda;
                    }else{
                       // Obtener el valor de la celda
                      console.log(nombreColumna);
                      var valorCelda = celda.querySelector("span").textContent;
                      document.getElementById(nombreColumna).value = valorCelda;
                    }

                    
                });
            });
        });
    });
</script>

<div class="peg-button-arrow">
<div class="col-4" id="agregar">
  <a class="butn" id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#CrearGenero">Agregar</a>
  </div>
  </div>
<br>
</div>

</div>


<div class="container-eventos">


<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Administración Profesores </h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>


<div class="table-evento table-responsive">
<table class="table table-bordered table-sm">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Cargo</th>
      <th scope="col">Facultad</th>
      <th scope="col">Imagen</th>
      <th scope="col">Accion</th>
    </tr>
</thead>
  <tbody class="table-group-divider">
    <?php foreach ($profesores as $person) { ?>
    
    <tr>
      <td><span><?php echo $person['id']  ?></span></td>
      <td><span><?php echo $person['nombre'] ?></span></td>
      <td><span><?php echo $person['cargo'] ?></span></td>
      <td><span><?php echo $person['facultad'] ?></span></td>
      <td><img src="<?php echo $person['imagen'] ?>" alt="Imagen"></td>
      <td>
      <a href="#" class="btn btn-outline-dark btn-sm editar" data-bs-toggle="modal" data-bs-target="#EditarProfe"><i class='bx bxs-edit'></i></a>
      <a href="/Literagiando/Routes/HomeRouter.php?accion=eliminar&id=<?php echo htmlspecialchars($person['id']); ?>" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a> 
      </td>
    </tr>
   <?php }?>
</table>
</div>
<div class="content-plus">
  <a href="create.php" class="btn butn-primary" data-bs-toggle="modal" data-bs-target="#Crear">Agregar</a>
</div> 

<br>  
</div>

</section>


<?php
// Función para generar un modal
function generarEditModal($idModal, $tituloModal, $accion, $tabla, $datosM) {
    ?>
    <form action="/Literagiando/Routes/HomeRouter.php" method="post" enctype="multipart/form-data">

    <div class="modal fade" id="<?php echo $idModal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $tituloModal; ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
              <input type="text" name="accion" value="<?php echo $accion; ?>" hidden>
              <input type="text" name="tabla" value="<?php echo $tabla; ?>" hidden>
              <?php
              foreach ($datosM[0] as $columnName => $value) {
                if (strpos($columnName, 'id_') !== false) {
                  echo "<input type='text' id='$columnName' name='$columnName' class='form-control' value='$value' hidden>";
                    continue;
                }
                $label = ucfirst(str_replace('_', ' ', $columnName));
                echo "<div class='mb-3'><label for='$columnName' class='form-label'>$label</label>";
                if ( $columnName == 'imagen') {
                  // Campo de archivo
                  echo "<input type='file' class='form-control' name='$columnName'>";
                } elseif ($columnName == 'activo'){
                  echo "&nbsp;&nbsp;";
                  echo '<input type="hidden" name="activo" value="0">';
                  echo '<input type="checkbox" value="1" name="activo" id=col_'.$columnName.' class="isActive"'. ($value == "1" ? "checked" : ""). ' >'; 
                }else{
                  // Campo de texto o textarea
                  $inputType = strlen($value) >= 30 ? 'textarea' : 'text';
                  if ($inputType == 'textarea') {
                    echo "<textarea name='$columnName' id='$columnName' cols='30' rows='5' class='form-control' required>$value</textarea>";
                  } else {
                    echo "<input type='$inputType' id='$columnName' name='$columnName' class='form-control' value='$value' required>";
                  }
                }
                echo "</div>";
              }
              ?>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn butn-primary">Guardar</button>
              </div>
           
          </div>
        </div>
      </div>
    </div>
    </form>
    <?php
}
function generarCreateModal($idModal, $tituloModal, $accion, $tabla, $datosM) {
  ?>
  <form action="/Literagiando/Routes/HomeRouter.php" method="post" enctype="multipart/form-data">

  <div class="modal fade" id="<?php echo $idModal; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $tituloModal; ?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <input type="text" name="accion" value="<?php echo $accion; ?>" hidden>
            <input type="text" name="tabla" value="<?php echo $tabla; ?>" hidden>
            <?php
            foreach ($datosM[0] as $columnName => $value) {
              if (strpos($columnName, 'id_') !== false) {
                echo "<input type='text' id='$columnName' class='form-control' hidden>";
                  continue;
              }
              $label = ucfirst(str_replace('_', ' ', $columnName));
              echo "<div class='mb-3'><label for='$columnName' class='form-label'>$label</label>";
              if ( $columnName == 'imagen') {
                echo "<input type='file' class='form-control' name='$columnName'>";
              } elseif ($columnName == 'activo'){
                  echo "&nbsp;&nbsp;";
                  echo '<input type="hidden" name="activo" value="0">';
                  echo '<input type="checkbox" value="1" name="activo" id=col_'.$columnName.' class="isActive"'. ($value == "1" ? "checked" : ""). ' >'; 
              }else{
                // Campo de texto o textarea
                $inputType = strlen($value) >= 30 ? 'textarea' : 'text';
                if ($inputType == 'textarea') {
                  echo "<textarea name='$columnName' id='$columnName' cols='30' rows='5' class='form-control' required></textarea>";
                } else {
                    echo "<input type='$inputType' id='$columnName' name='$columnName' class='form-control' required>";
                }
              }
              echo "</div>";
            }
            ?>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn butn-primary">Guardar</button>
            </div>
         
        </div>
      </div>
    </div>
  </div>
  </form>
  <?php
}
include '../Layouts/footer.php' ?>