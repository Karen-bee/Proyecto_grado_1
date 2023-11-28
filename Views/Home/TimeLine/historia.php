<?php include '../header.php'; ?>

<title>Historia</title>


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

<div class="content-historia">
    <div class="col-4">
        <h2>Historia</h2>
        <img src="/Resources/img/Circulo-fondo.png" alt="">
        
    </div>
    <div class="col-8">
        <div class="content-text">
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

<div class="content-slide-historia">

    <div class="card text-bg-dark">
        <img src="/Resources/img/library.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title"><strong>Expertos de marionetas</strong></h5>
            <a href="#"><strong>Leer Más <i class="bi bi-chevron-double-right"> </i></strong></a>
        </div>
    </div>

    <div class="card text-bg-dark">
        <img src="/Resources/img/library.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title"><strong>Actividades en colegios de la localidad</strong></h5>
            <a href="#"><strong>Leer Más <i class="bi bi-chevron-double-right"> </i></strong></a>
        </div>
    </div>

    <div class="card text-bg-dark">
        <img src="/Resources/img/library.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title"><strong>Lectura en leguajes de señas</strong></h5>
            <a href="#"><strong>Leer Más <i class="bi bi-chevron-double-right"> </i></strong></a>
        </div>
    </div>
</div>


<?php include '../footer.php'; ?>