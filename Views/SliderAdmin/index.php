<?php 
include_once(__DIR__ . '../../../App/Controllers/SliderHomeController.php');



?>

<?php 

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

        <div class="content-search">
          <form class="d-flex" role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class='bx bx-search'></i></button>
          </form>
        </div> 

        <div class="table-evento table-responsive">
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre/Img</th>
                <th>Tipo</th>
                <th>Tamaño</th>
                <th>Activo</th>
                <th>Ruta</th>
                <th>Imagen</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
            
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#exampleAgregar"><i class='bx bxs-edit' ></i></a>
                  <a href="<php  ?" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#exampleAgregar">Agregar</a>
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


<?php include '../Layouts/footer.php' ?>