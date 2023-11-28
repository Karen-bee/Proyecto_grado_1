<?php

require_once (__DIR__ .'./../../App/Controllers/NoticiaController.php');
$noticiaController = new NoticiaController();
$noticias = $noticiaController->ObtenerNoticiaController();
$tiponoticias = $noticiaController->ObtenerSelectNoticiaController();
?>

<?php 
include '../Layouts/header.php';
include '../NoticiasAdmin/create.php';
include '../NoticiasAdmin/edit.php';
?>

    <title>Administrador Noticias</title>
    
    <section class="home-section">
      
      <div class="container-eventos">
        
        <div class="content-evento">
          <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
          <div class="col-4"><h1 id="title-eventos">Administrar Noticias </h1></div>
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
                <th>Titulo</th>
                <th>Subtitulo</th>
                <th>Detalle</th>
                <th>Tipo/Noticia</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Imagen</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
            <?php if($noticias['state']==1){
                foreach ($noticias['noticias'] as $noticia) { ?>
              <tr>
                <td><?php echo $noticia['idnoticias'] ?></td>
                <td><?php echo $noticia['titulo_noticias'] ?></td>
                <td><?php echo $noticia['subtitulo_noticias'] ?></td>
                <td><?php echo $noticia['detalle_noticias'] ?></td>
                <td><?php echo $descripcionTipoNoticia = $noticia['tiponoticia']; ?></td>
                <td><?php echo $noticia['idusuario'] ?></td>
                <td><?php echo $noticia['estado_noticia'] ?></td>
                <td><img src="<?php echo substr($noticia['imagen_card'], 2) ?>" alt="Imagen"></td>
                <td>
                <a href="" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#NoticiasEditModal"><i class='bx bxs-edit' ></i></a>
                  <a href="<php  ?" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
                </td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#NoticiasModal">Agregar</a>
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