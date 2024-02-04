<?php 
include '../header.php';
include 'timelineInfo.php';


$sobre_nosotros = array(
    $sobre_nosotros['titulo_generos'],
    $sobre_nosotros['detalle_generos']
);


$arrayDividido = array();

foreach ($sobre_nosotros as $elemento) {
    $partes = explode("/", $elemento);
    $arrayDividido[] = $partes;
}


?>

<title>Nosotros</title>


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

<div class="content-title-generos">
    <h1><strong>Generos <p>Literarios</p></strong></h1>
</div>

<div class="content-slide-generos">

<?php $i = 0;
    foreach($arrayDividido[0] as $titulo){?>
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong><?php echo $titulo;?></strong></div>
            <div class="card-body">
                <p class="card-text"><?php echo $arrayDividido[1][$i];?></p>
            </div>
        </div>
<?php  $i++;}?>


</div>



<?php include '../footer.php'; ?>