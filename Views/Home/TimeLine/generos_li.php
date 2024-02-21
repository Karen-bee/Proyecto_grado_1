<?php 
include '../header.php';
include 'timelineInfo.php';


$arrayDividido = $homeController->ObtenerGenerosController();

if($arrayDividido['state'] === true){
    $arrayDividido = $arrayDividido['sobre_nosotros'];
}

?>

<title>Generos</title>


<div class="content-title-generos">
    <h1><strong>Generos <p>Literarios</p></strong></h1>
</div>

<div class="content-slide-generos">

<?php $i = 0;
    foreach($arrayDividido as $titulo){?>
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><strong><?php echo $titulo['tipo_genero'];?></strong></div>
            <div class="card-body">
                <p class="card-text"><?php echo $titulo['detalle_genero'];?></p>
            </div>
        </div>
<?php  $i++;}?>


</div>



<?php include '../footer.php'; ?>