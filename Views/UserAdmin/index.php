<?php 
 
require_once (__DIR__ . './../../App/Controllers/Login/UserController.php');
require_once (__DIR__ . './../../App/Controllers/Login/RegisterController.php');
$userController = new UserController();


$users = $userController->ObtenerUsersController();

$userController = new RegisterController();
$documents = $userController->ObtenerDocumentsController();
?>

<?php 
include '../Layouts/header.php';
include '../UserAdmin/create.php';
?>

    <title>Administrador Usuarios</title>
    
    <section class="home-section">
      
      <div class="container-eventos">
        
        <div class="content-evento">
          <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
          <div class="col-4"><h1 id="title-eventos">Administrar Usuarios</h1></div>
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
              <?php if($users['state']==1){
                foreach ($users['users'] as $user) { ?>
              <tr>
                <td><?php echo $user['idusuario'] ?></td>
                <td><?php echo $user['documento_usuario'] ?></td>
                <td><?php echo $user['idtipodedocumento'] ?></td>
                <td><?php echo $user['nombrecompleto_usuario'] ?></td>
                <td><?php echo $user['direccion_usuario'] ?></td>
                <td><?php echo $user['telefono_usuario'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['correo_usuario'] ?></td>
                <td><?php echo $user['idrolusuario'] ?></td>
                <td><?php echo $user['estado'] ?></td>
                <td>
                  <a href="#" class="btn btn-outline-dark btn-sm"><i class='bx bxs-edit' ></i></a>
                  <a href="<php  ?" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
                </td>
              </tr>
            <?php } } ?>      
            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#UserModal">Agregar</a>
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