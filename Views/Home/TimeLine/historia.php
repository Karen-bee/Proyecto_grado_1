<?php 
include '../header.php';
include 'timelineInfo.php';


?>



<title>Historia</title>


<div class="container-blog">
<button id="btn-nosotros"><strong>Sobre Nosotros: <p><?php echo $sobre_nosotros['titulo_general'];?></p></strong></button>
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
        <h2><?php echo $sobre_nosotros['titulo_historia'];?></h2>
        <img src="/Literagiando/Resources/img/Circulo-fondo.png" alt="">
        
    </div>
    <div class="col-8">
        <div class="content-text">
            <p><?php echo $sobre_nosotros['detalle_historia'];?></p>
        </div>
    </div>

</div>

<div class="content-slide-historia">

    <div class="card text-bg-dark">
        <img src="/Literagiando/Resources/img/library.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title"><strong>Expertos de marionetas</strong></h5>
        </div>
    </div>

    <div class="card text-bg-dark">
        <img src="/Literagiando/Resources/img/library.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title"><strong>Actividades en colegios de la localidad</strong></h5>
        </div>
    </div>

    <div class="card text-bg-dark">
        <img src="/Literagiando/Resources/img/library.png" class="card-img" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title"><strong>Lectura en leguajes de señas</strong></h5>
        </div>
    </div>
</div>


<?php include '../footer.php'; ?>