<?php 
include '../header.php';
include 'timelineInfo.php';


$arrayDividido = $homeController->ObtenerServiciosController();

if($arrayDividido['state'] === true){
    $arrayDividido = $arrayDividido['sobre_nosotros'];
}

?>



<title>Servicios</title>


<div class="container-servicios">

    <?php $i = 0;
    foreach($arrayDividido as $titulo){?>
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo $titulo['tipo_servicios'];?></h5>
                <p class="card-text"><?php echo $titulo['detalle_servicio'];?></p>
            </div>
            <img src="/Literagiando/Resources/img/Libro.png" class="card-img-top" alt="">
        </div>
    <?php  $i++;}?>


    <img src="/Literagiando/Resources/img/mano.png" class="card-img-top" alt="">
    </div>   
    
</div>


<?php include '../footer.php'; ?>