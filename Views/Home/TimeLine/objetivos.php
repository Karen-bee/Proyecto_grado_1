<?php 
include '../header.php';
include 'timelineInfo.php';


$sobre_nosotros = array(
    $sobre_nosotros['titulo_objetivos'],
    $sobre_nosotros['detalle_objetivos']
);

$arrayDividido = array();

foreach ($sobre_nosotros as $elemento) {
    $partes = explode("/", $elemento);
    $arrayDividido[] = $partes;
}

?>


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


<?php $i = 0;
    foreach($arrayDividido[0] as $titulo){ if($i%2 === 0){?>
        <div id="card-1" class="card mb-3" style="max-width: 840px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <strong class="title-1"><?php echo $titulo;?></strong>
                <img src="/Literagiando/Resources/img/Circulo-fondo.png" class="img-fluid rounded-start"  alt="">
                </div>
                <div class="col-md-8">
                <div class="card-body " style="height: 288px;">
                <p ><?php echo $arrayDividido[1][$i];?></p>
                </div>
                </div>
            </div>
        </div>
<?php }else{?>
    <div id="card-2" class="card mb-3" style="max-width: 840px;">
        <div class="row g-0">
            <div class="col-md-8">
            <div class="card-body">
            <p><?php echo $arrayDividido[1][$i];?></p>
            </div>
            </div>
            <strong class="title-2"><?php echo $titulo;?></strong>
            <div class="col-md-4">
            <img src="/Literagiando/Resources/img/Circulo-fondo.png" class="img-fluid rounded-start" alt="...">
            </div>
        </div>
        </div>

    <?php } $i++;}?>
   
</div>


<?php include '../footer.php'; ?>