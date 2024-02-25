<?php 
include '../header.php';
include 'timelineInfo.php';



$arrayDividido = $homeController->ObtenerObjetivosController();

if($arrayDividido['state'] === true){
    $arrayDividido = $arrayDividido['sobre_nosotros'];
}
foreach ($arrayDividido as $key => $values) {
    if (isset($values['activo']) && $values['activo'] == '0') {
        unset($arrayDividido[$key]);
    }
}
?>


<title>Objetivos</title>


<div class="container-objetivos">


<?php $i = 0;
    foreach($arrayDividido as $titulo){ if($i%2 === 0){?>
        <div id="card-1" class="card mb-3" style="max-width: 840px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <strong class="title-1"><?php echo $titulo['titulo_objetivos'];?></strong>
                <img src="/Literagiando/Resources/img/Circulo-fondo.png" class="img-fluid rounded-start"  alt="">
                </div>
                <div class="col-md-8">
                <div class="card-body " style="height: 288px;">
                    <p><?php echo $titulo['detalle_objetivos'];?></p>
                </div>
                </div>
            </div>
        </div>
<?php }else{?>
    <div id="card-2" class="card mb-3" style="max-width: 840px;">
        <div class="row g-0">
            <div class="col-md-8">
            <div class="card-body" style="height: 288px;">
                <p ><?php echo $titulo['detalle_objetivos'];?></p>
            </div>
            </div>
            <strong class="title-2"><?php echo $titulo['titulo_objetivos'];?></strong>
            <div class="col-md-4">
            <img src="/Literagiando/Resources/img/Circulo-fondo.png" class="img-fluid rounded-start" alt="...">
            </div>
        </div>
        </div>

    <?php } $i++;}?>
   
</div>


<?php include '../footer.php'; ?>