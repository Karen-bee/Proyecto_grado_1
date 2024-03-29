<?php

require_once (__DIR__ . '/../../App/Controllers/Login/UserController.php');
require_once (__DIR__ . '/../../App/Controllers/Login/RegisterController.php');
$userController = new UserController();

$users = $userController->ObtenerTodosUsersController();

$userController = new RegisterController();
$documents = $userController->ObtenerDocumentsController();


$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;

if($users['state']==1){
  $users = $users['users'];
}else{
  echo $users['mensaje'];

}

if($busqueda){

  $searchTerm = strtolower($busqueda); // Convertir el término de búsqueda a minúsculas

  $resultados = array_filter($users, function ($user) use ($searchTerm) {
      $nombreUser = strtolower($user['nombre_completo']);
      $detalleUser = strtolower($user['usuario']);

      return strpos($nombreUser, $searchTerm) !== false || 
            strpos($detalleUser, $searchTerm) !== false;
  });

  $users = $resultados;
}

// Calcular el número total de páginas que se van a mostrar en la paginación
$usersPorPagina = 8;
$totalPaginas = ceil(count($users) / $usersPorPagina);

$inicio = ($paginaActual - 1) * $usersPorPagina;
$fin = $usersPorPagina * $paginaActual;

// Obtener los users para la página actual
$users = array_slice($users, $inicio, $fin - $inicio);



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

$vistaActual = 8;

include '../Layouts/header.php';
include '../UserAdmin/create.php';
include '../UserAdmin/edit.php';
include '../UserAdmin/editRol.php';
?>

    <title>Administrador Users</title>
    
    <section class="home-section">
      
      <div class="container-eventos">
        
        <div class="content-evento">
          <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
          <div class="col-4"><h1 id="title-eventos">Administrar Usuarios </h1></div>
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
                <th>ID</th>
                <th>N°/Documento</th>
                <th>Tipo/Documento</th>
                <th>Nombre/Completo</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user) { ?>
              <tr>
              <td><?php echo $user['id_usuario'] ?></td>
                <td><?php echo $user['identificacion'] ?></td>
                <td><?php echo $user['nombre_documento'] ?></td>
                <td><?php echo $user['nombre_completo'] ?></td>
                <td><?php echo $user['direccion_usuario'] ?></td>
                <td><?php echo $user['telefono'] ?></td>
                <td><?php echo $user['usuario'] ?></td>
                <td><?php echo $user['correo'] ?></td>
                <td><?php echo $user['nombre_rol']." " ?>
                <a data-id="<?php echo $user['id_usuario']; ?>" href="/Literagiando/Routes/UserRouter.php" class="btn btn-outline-dark btn-sm btn-editar-rol" data-bs-toggle="modal" data-bs-target="#EditRol"><i class='bx bxs-edit' ></i></a>  
               </td>
                <td><form action="/Literagiando/Routes/UserRouter.php" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $user['id_usuario']; ?>">
                        <input type="hidden" name="estado" value="<?php echo $user['estado']; ?>">
                        <input type="hidden" name="accion" value="activarUser">
                        <input type="checkbox" class="isActive" onclick="this.form.submit()" <?php echo $user['estado'] === 1 ? 'checked' : ''; ?>>
                        <?php echo $user['estado']; ?>
                    </form>
                <td>  
                  <a data-id="<?php echo $user['id_usuario']; ?>" href="/Literagiando/Routes/UserRouter.php" class="btn btn-outline-dark btn-sm btn-editar-user" data-bs-toggle="modal" data-bs-target="#EditUser"><i class='bx bxs-edit' ></i></a>
                </td>
                <script>
                  // Asignar user de clic al botón de editar
                  $(`.btn-editar-rol[data-id=<?php echo $user['id_usuario']; ?>]`).on('click', function() {
                      llenarFormularioRol(<?php echo json_encode($user); ?>);
                  });
                  // Asignar user de clic al botón de editar
                  $(`.btn-editar-user[data-id=<?php echo $user['id_usuario']; ?>]`).on('click', function() {
                      llenarFormularioUser(<?php echo json_encode($user); ?>);
                  });
                  // Función para llenar el formulario con los datos de la user
                  function llenarFormularioUser(user) {
                    userSelected = user;
                    console.log(userSelected); 
                    $('#Identificacion').val(user.identificacion).trigger('change'); 
                    $('#Nombre_completo').val(user.nombre_completo); 
                    $('#Direccion_usuario').val(user.direccion_usuario); 
                    $('#Telefono_usuario').val(user.telefono); 
                    $('#Username').val(user.usuario); 
                    $('#Correo').val(user.correo); 
                    $('#Idtipodedocumento').val(user.idtipodedocumento); 
                    $('#Id_usuario').val(user.id_usuario); 
                    $('#password').val(user.password); 
                  }    
                  function llenarFormularioRol(user) {
                    userSelected = user;
                    console.log(userSelected); 
                    $('#Id_usuarioo').val(user.id_usuario); 
                  } 
                </script>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#UserModal" hidden>Agregar</a>
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


