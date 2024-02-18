<?php

require_once (__DIR__ . '/../../App/Controllers/HomeController.php');
$homeController = new HomeController();
$sobre_nosotros = $homeController->ObtenerProfesoresController();


if($sobre_nosotros['state'] == true){
    $profesores = $sobre_nosotros['profesores'];
}

$sobre_nosotros = $homeController->ObtenerSobre_nosotrosController();

if($sobre_nosotros['state'] === true){
  $sobre_nosotros = $sobre_nosotros['sobre_nosotros'][0];
}

$objetivos = $homeController->ObtenerObjetivosController();

if($objetivos['state'] === true){
  $objetivos = $objetivos['sobre_nosotros'];
}

$servicios = $homeController->ObtenerServiciosController();

if($servicios['state'] === true){
  $servicios = $servicios['sobre_nosotros'];
}

$generos = $homeController->ObtenerGenerosController();

if($generos['state'] === true){
  $generos = $generos['sobre_nosotros'];
}

$id = array_shift($sobre_nosotros);



$titulo = $sobre_nosotros;


     

include '../Layouts/header.php';
include 'create.php';


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
        foreach ($titulo as $columnName => $value) {
          echo '<th scope="col">' . $columnName . '</th>';
        }
      ?>
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
    <tr>
    <?php
      // Imprimir valores de las celdas
      foreach ($titulo as $value) {
        echo '<td><span>' . $value . '</span></td>';
      }
    ?>
    </tr>
</table>

</div>

<a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Editar"><i class='bx bxs-edit'></i>  &nbsp;&nbsp;&nbsp;Editar Pagina Sobre Nosotros &nbsp;&nbsp;&nbsp;
  </a>
  <br>

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
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
    <?php
      // Imprimir valores de las celdas
      foreach ($objetivos as $values) {
        echo '<tr>';
        foreach ($values as $value) {
          echo '<td><span>' . $value . '</span></td>';
        }
        echo '</tr>';
      }
    ?>
</table>
</div>

<a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#EditarObjetivos"><i class='bx bxs-edit'></i>  &nbsp;&nbsp;&nbsp;Editar Objetivos &nbsp;&nbsp;&nbsp;
  </a>
  <br>

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
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
    <?php
      // Imprimir valores de las celdas
      foreach ($servicios as $values) {
        echo '<tr>';
        foreach ($values as $value) {
          echo '<td><span>' . $value . '</span></td>';
        }
        ?> 
        <td>  
                  <a data-id="<?php echo $evento['ideventos']; ?>" href="/Literagiando/Routes/EventoRouter.php?accion=editar&idevento=<?php echo $evento['ideventos']; ?>" class="btn btn-outline-dark btn-sm btn-editar-evento" data-bs-toggle="modal" data-bs-target="#EditarEvento"><i class='bx bxs-edit' ></i></a>
                  <a href="/Literagiando/Routes/EventoRouter.php?accion=eliminar&ideventos=<?php echo htmlspecialchars($evento['ideventos']); ?>" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>                
                </td>
        </tr>
        <?php
      }
    ?>
</table>
</div>

<a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#EditarServicios"><i class='bx bxs-edit'></i>  &nbsp;&nbsp;&nbsp;Editar Servicios &nbsp;&nbsp;&nbsp;
  </a>
  <br>

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
      </tr>
      
  </thead>
  <tbody class="table-group-divider">
  <?php
      // Imprimir valores de las celdas
      foreach ($generos as $values) {
        echo '<tr>';
        foreach ($values as $value) {
          echo '<td><span>' . $value . '</span></td>';
        }
        echo '</tr>';
      }
    ?>
</table>
</div>


<a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#EditarServicios"><i class='bx bxs-edit'></i>  &nbsp;&nbsp;&nbsp;Editar Generos &nbsp;&nbsp;&nbsp;
  </a>
  <br>
  <br>
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
      <th scope="col">Rol</th>
      <th scope="col">Facultad</th>
      <th scope="col">imagen</th>
      <th scope="col">accion</th>
    </tr>
</thead>
  <tbody class="table-group-divider">
    <?php foreach ($profesores as $person) { ?>
    
    <tr>
      <td><?php echo $person['id']  ?></td>
      <td><?php echo $person['nombre'] ?></td>
      <td><?php echo $person['rol'] ?></td>
      <td><?php echo $person['facultad'] ?></td>
      <td><img src="<?php echo $person['imagen'] ?>" alt="Imagen"></td>
      <td>
        <a href="" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
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


<!-- Modal -->
<form action="/Literagiando/Routes/HomeRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="Editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Persona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="accion" value="editarSobreNosotros" hidden>
        <input type="text" name="id" value="<?php echo $id; ?>" hidden>

        <?php foreach ($sobre_nosotros as $columnName => $value) { 
          
          if (strpos($value, "/") !== 0) {?>
            <div class="col-12">
                <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                <textarea name="<?php echo $columnName; ?>" cols="30" rows="5" class="form-control" required><?php echo $value; ?></textarea>


            </div>
          <?php
          } else {?>
            <div class="col-12" style="margin-top: 10px;">
              <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
              <input type="file" class="form-control" name="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
          <?php
          }
      }?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn butn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->
<form action="/Literagiando/Routes/HomeRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="EditarObjetivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Persona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="accion" value="editarSobreNosotros" hidden>
        <input type="text" name="id" value="<?php echo $id; ?>" hidden>

        <?php foreach ($objetivos as $values) {
        foreach ($values as $columnName => $value) { 
          
          if (strlen($value) >= 30) {?>
            <div class="col-12">
                <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                <textarea name="<?php echo $columnName; ?>" cols="30" rows="5" class="form-control" required><?php echo $value; ?></textarea>
            </div>
          <?php
          } else {?>
            <div class="col-12">
                <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                <input type="text"  name="<?php echo $columnName; ?>" class="form-control" value="<?php echo $value; ?>" required>
            </div>
          <?php
          }
      }
      }?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn butn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->
<form action="/Literagiando/Routes/HomeRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="EditarServicios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Persona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="accion" value="editarSobreNosotros" hidden>
        <input type="text" name="id" value="<?php echo $id; ?>" hidden>

        <?php foreach ($servicios as $values) {
        foreach ($values as $columnName => $value) { 
          
          if (strlen($value) >= 30) {?>
            <div class="col-12">
                <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                <textarea name="<?php echo $columnName; ?>" cols="30" rows="5" class="form-control" required><?php echo $value; ?></textarea>
            </div>
          <?php
          } else {?>
            <div class="col-12">
                <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                <input type="text"  name="<?php echo $columnName; ?>" class="form-control" value="<?php echo $value; ?>" required>
            </div>
          <?php
          }
      }
      }?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn butn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal -->
<form action="/Literagiando/Routes/HomeRouter.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="EditarGeneros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Persona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" name="accion" value="editarSobreNosotros" hidden>
        <input type="text" name="id" value="<?php echo $id; ?>" hidden>

        <?php foreach ($generos as $values) {
        foreach ($values as $columnName => $value) { 
          
          if (strlen($value) >= 30) {?>
            <div class="col-12">
                <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                <textarea name="<?php echo $columnName; ?>" cols="30" rows="5" class="form-control" required><?php echo $value; ?></textarea>
            </div>
          <?php
          } else {?>
            <div class="col-12">
                <label for="<?php echo $columnName; ?>"><?php echo $columnName; ?></label>
                <input type="text"  name="<?php echo $columnName; ?>" class="form-control" value="<?php echo $value; ?>" required>
            </div>
          <?php
          }
      }
      }?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn butn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn butn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<?php include '../Layouts/footer.php' ?>