<?php 

include '../Layouts/header.php';

?>

<title>Mis Eventos</title>

<section class="home-section">

<div class="container-miseventos table-responsive">

<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Mis Eventos </h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>

<div class="content-search">
    <form class="d-flex" role="search">
    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit"><i class='bx bx-search'></i></button>
    </form>
</div> 


<table class="table table-striped table-hover">
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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <a href="<php  ?" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>
        <a href="" class="btn btn-outline-danger btn-sm"><i class='bx bx-trash'></i></a>
      </td>
    </tr>
  </tbody>
</table>
<div class="btn-update">
    <a id="btn-actualizar" href="#">Actualizar</a>
</div>
</div>
</section>



<?php include '../Layouts/footer.php' ?>