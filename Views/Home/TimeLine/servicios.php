<?php 
include '../header.php';
include 'timelineInfo.php';


$sobre_nosotros = array(
    $sobre_nosotros['titulo_servicios'],
    $sobre_nosotros['detalle_servicios']
);

$arrayDividido = array();

foreach ($sobre_nosotros as $elemento) {
    $partes = explode("/", $elemento);
    $arrayDividido[] = $partes;
}

?>



<title>Servicios</title>


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

<div class="container-servicios">

    <?php $i = 0;
    foreach($arrayDividido[0] as $titulo){?>
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo $titulo;?></h5>
                <p class="card-text"><?php echo $arrayDividido[1][$i];?></p>
            </div>
            <img src="/Literagiando/Resources/img/Libro.png" class="card-img-top" alt="">
        </div>
    <?php  $i++;}?>


    <img src="/Literagiando/Resources/img/mano.png" class="card-img-top" alt="">
    </div>   
    
</div>


<?php include '../footer.php'; ?>