<?php include '../header.php'; ?>

<title>Objetivos</title>


<div class="container-blog">
<button id="btn-nosotros"><strong>Sobre Nosotros: <p>Literagiando</p></strong></button>

</div>

<div class="line-time">
    <div class="item-nav">
        <div class="icon">
            <a href="../TimeLine/historia.php" id="btn-circle"><i class="bi bi-circle-fill "></i></a>
        </div>
        <div class="title-icon">
            <Strong>Historia</Strong>
        </div>
    </div>
    <h5>----------</h5>
    <div class="item-nav">
        <div class="icon">
            <a href="../TimeLine/objetivos.php" id="btn-circle"><i class="bi bi-circle-fill "></i></a>
        </div>
        <div class="title-icon">
            <Strong>Objetivos</Strong>
        </div>
    </div>
    <h5>----------</h5>
    <div class="item-nav">
        <div class="icon">
            <a href="../TimeLine/servicios.php" id="btn-circle"><i class="bi bi-circle-fill "></i></a>
        </div>
        <div class="title-icon">
            <Strong>Servicios</Strong>
        </div>
    </div>
    <h5>----------</h5>
    <div class="item-nav">
        <div class="icon">
            <a href="../TimeLine/generos_li.php" id="btn-circle"><i class="bi bi-circle-fill "></i></a>
        </div>
        <div class="title-icon">
            <Strong>Géneros <p>Literarios</p></Strong>
        </div>
    </div>
    <h5>----------</h5>
    <div class="item-nav">
        <div class="icon">
            <a href="../TimeLine/profesores.php" id="btn-circle"><i class="bi bi-circle-fill "></i></a>
        </div>
        <div class="title-icon">
            <Strong>Profesores</Strong>
        </div>
    </div>

</div>

<div class="container-objetivos">

<div id="card-1" class="card mb-3" style="max-width: 840px;">
  <div class="row g-0">
    <div class="col-md-4">
        <strong class="title-1">Objetivo <p>Principal</p></strong>
      <img src="/Resources/img/Circulo-fondo.png" class="img-fluid rounded-start" alt="">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <p>
            Sass Bootstrap uses Dart Sass for compiling our Sass source files into CSS 
        files (included in our build process), and we recommend you do the same if 
        you’re compiling Sass using your own asset pipeline. We previously used Node
        Sass for Bootstrap v4, but LibSass and packages built on top of it, including
        Node Sass, are now deprecated.

        Dart Sass uses a rounding precision of 10 and for efficiency reasons does not
        allow adjustment of this value. We don’t lower this precision during further 
        processing of our generated CSS, such as during minification, but if you chose
        to do so we recommend maintaining a precision of at least 6 to prevent issues 
        with browser rounding.
            </p>
      </div>
    </div>
  </div>
</div>

<div id="card-2" class="card mb-3" style="max-width: 840px;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
      <p>
            Sass Bootstrap uses Dart Sass for compiling our Sass source files into CSS 
        files (included in our build process), and we recommend you do the same if 
        you’re compiling Sass using your own asset pipeline. We previously used Node
        Sass for Bootstrap v4, but LibSass and packages built on top of it, including
        Node Sass, are now deprecated.

        Dart Sass uses a rounding precision of 10 and for efficiency reasons does not
        allow adjustment of this value. We don’t lower this precision during further 
        processing of our generated CSS, such as during minification, but if you chose
        to do so we recommend maintaining a precision of at least 6 to prevent issues 
        with browser rounding.
            </p>
      </div>
    </div>
    <strong class="title-2">Objetivo <p>Especificos</p></strong>
    <div class="col-md-4">
      <img src="/Resources/img/Circulo-fondo.png" class="img-fluid rounded-start" alt="...">
    </div>
  </div>
</div>
   
</div>


<?php include '../footer.php'; ?>