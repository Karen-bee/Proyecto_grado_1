<?php

require_once (__DIR__.'/../../App/Controllers/Login/PermisosController.php');
$permisoController = new PermisosController();
$permisos = $permisoController->ObtenerPermisoController();
?>
<?php 

$vistaActual = 8;

include '../Layouts/header.php';

?>

<title>Permisos</title>

<section class="home-section">

<div class="container-miseventos table-responsive">

<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Asignar Permisos </h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>



<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Pagina</th>
      <th scope="col">Crear</th>
      <th scope="col">Editar</th>
      <th scope="col">Actualizar</th>
      <th scope="col">Eliminar</th>
      <th scope="col">Ver</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php if($permisos['state']==1){
      foreach ($permisos['permisos'] as $permiso) { ?>
    
    <tr>
      <th scope="row"><?php echo $permiso['idpermisos']?></th>
      <td><?php echo $permiso['Paginas'] ?></td>
      <td><label class="switch"><input type="checkbox" <?php echo $permiso['Crear'] == 1 ? 'checked' : '' ?>><span class="slider round"></span></label></td>
      <td><label class="switch"><input type="checkbox" <?php echo $permiso['Editar'] == 1 ? 'checked' : '' ?>><span class="slider round"></span></label></td>
      <td><label class="switch"><input type="checkbox" <?php echo $permiso['Actualizar'] == 1 ? 'checked' : '' ?>><span class="slider round"></span></label></td>
      <td><label class="switch"><input type="checkbox" <?php echo $permiso['Eliminar'] == 1 ? 'checked' : '' ?>><span class="slider round"></span></label></td>
      <td><label class="switch"><input type="checkbox" <?php echo $permiso['Ver'] == 1 ? 'checked' : '' ?>><span class="slider round"></span></label></td>

    </tr>
   <?php } }?>
</table>
<div class="btn-update">
    <a id="btn-actualizar" href="#">Guardar</a>
</div>
</div>
</section>



<?php include '../Layouts/footer.php' ?>