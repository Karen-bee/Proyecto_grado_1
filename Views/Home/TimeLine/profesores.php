<?php 
include '../header.php';
include 'timelineInfo.php';

require_once (__DIR__ . '/../../../App/Controllers/HomeController.php');
$homeController = new HomeController();
$sobre_nosotros = $homeController->ObtenerProfesoresController();

if($sobre_nosotros['state'] === true){
    $sobre_nosotros = $sobre_nosotros['sobre_nosotros'];
}

?>

<title>Profesores</title>



<div class="container-profesores">
    <div class="col-4">
        
    <?php if(count($sobre_nosotros) > 2) { ?>
        <div class="title-equipo">
            <h1>Nuestro &nbsp;Equipo</h1>
        </div>
    <?php } else if(count($sobre_nosotros) == 1) { ?>
        <div class="title-equipo" style="top: 0">
            <h1>Nuestro &nbsp;Equipo</h1>
        </div>
    <?php } else { ?>
        <div class="title-equipo" style="top: 10%">
            <h1>Nuestro &nbsp;Equipo</h1>
        </div>
    <?php } ?>

    </div>
    
    <div class="col-8">       

        <?php foreach ($sobre_nosotros as $person) { ?>

        <div class="card-info">
            <div class="box">
                <div class="content">
                    <img src="<?php echo $person['imagen']  ?>" alt="">
                </div>
            </div>

            <div class="content-info">
                <strong><?php echo $person['nombre']  ?></strong>
                <h2><?php echo $person['cargo']  ?></h2>
                <h2><?php echo $person['facultad']  ?></h2>
            </div>
        </div>

        <?php } ?>




    </div>

       
</div>


<?php include '../footer.php'; ?>