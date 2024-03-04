<?php
require_once (__DIR__.'/../../App/Controllers/Login/PermisosController.php');
$permisoController = new PermisosController();
$permisos = $permisoController->ObtenerPermisoController();

require_once (__DIR__.'/../../App/Controllers/Login/RoleController.php');
$rolesController = new RoleController();
$roles = $rolesController->ObtenerRoleController();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $datos = array(
      "idrol" => $_POST["idrol"],
      "nombre_rol" => $_POST["nombre_rol"]
  );

  $rolesController = new RoleController();

  $resultado = $rolesController->EditarRolController($datos);

  // Puedes redirigir a la página principal u otra página después de la edición
  header("Location: index.php");
  exit();
}

if($roles['state']==1){
  $roles = $roles['roles'];
}else{
  alert("error al obtener datos");
}

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;
if($busqueda){

  $searchTerm = strtolower($busqueda); // Convertir el término de búsqueda a minúsculas

  $resultados = array_filter($roles, function ($rol) use ($searchTerm) {
      $nombreRol = strtolower($rol['nombre_rol']);

      return strpos($nombreRol, $searchTerm) !== false ;
  });

  $roles = $resultados;
}

$rolActivo = null;

// Calcular el número total de páginas que se van a mostrar en la paginación

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$rolesPorPagina = 4;
$totalPaginas = ceil(count($roles) / $rolesPorPagina);

$inicio = ($paginaActual - 1) * $rolesPorPagina;
$fin = $rolesPorPagina * $paginaActual;

// Obtener los roles para la página actual
$roles = array_slice($roles, $inicio, $fin - $inicio);

function actualizarPaginacion($totalPaginas,$paginaActual) {
  echo '<ul class="pagination">';
  for ($i = 1; $i <= $totalPaginas; $i++) {
      $class = ($paginaActual && $paginaActual == $i) ? 'page-link active' : 'page-link';
      $queryParams = [];
      $queryParams['pagina'] = $i;
      if (isset($_GET['busqueda'])) {
        $queryParams['busqueda'] = $_GET['busqueda'];
      }
      echo '<li class="page-item"><a class="' . $class . '" data-pagina="' . $i . '" href="?' . http_build_query($queryParams) . '">' . $i . '</a></li>';



  }
  echo '</ul>';
}



include '../Layouts/header.php';
include '../Roles/create.php';
include '../Roles/edit.php';



?>

<title>Admin Roles</title>

<section class="home-section">

<div class="container-miseventos table-responsive">

<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Administración Roles </h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>

<div class="content-search">
<form class="d-flex" role="search" action="" method="GET">
            <input class="form-control" type="search" name="busqueda" placeholder="Search" aria-label="Search">
            <button type="submit" class="btn btn-outline-success"><i class='bx bx-search'></i></button>
          </form>      
</div> 

<h2><?php if(isset($busqueda) && $busqueda !== "")echo "Busqueda de: " . $busqueda ?></h2>
<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre/Rol</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php if(count($roles)>=1){
      foreach ($roles as $role) { ?>
    
    <tr>
      <td><?php echo $role['idrol']  ?></td>
      <td><?php echo $role['nombre_rol'] ?></td>
      <td>
      <a href="?accion=editar&nombre_rol=<?php echo $role['nombre_rol']; ?>&idrol=<?php echo $role['idrol']; ?>" class="btn btn-outline-dark btn-sm">
          <i class='bx bxs-edit'></i>
      </a>  
        <!--<a href="/Routes/RolRouter.php?accion=eliminarPermiso" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>-->
      </td>
    </tr>
   <?php 
   } }else { echo '<h1>No hay nada que mostrar</h1>';}?>
</table>
<div class="content-plus">
  <a href="create.php" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#CrearRol">Agregar</a>
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