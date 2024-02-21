<?php 

require_once (__DIR__ . '/../../../App/Controllers/HomeController.php');
$homeController = new HomeController();
$sobre_nosotros = $homeController->ObtenerProfesoresController();

if($sobre_nosotros['state'] === true){
    $sobre_nosotros = $sobre_nosotros['sobre_nosotros'];
}

?>


<?php include '../header.php'; ?>

<title>Profesores</title>


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

<div class="container-profesores">

    <div class="col-4">
        <div class="title-equipo">
            <h1>Nuestro <p>Equipo</p></h1>
        </div>
    </div>
    
    <div class="col-8">       

        <?php foreach ($sobre_nosotros as $person) { ?>

        <div class="card-info">
            <div class="box">
                <div class="content">
                    <img src="/Literagiando/Resources/img/erika.png" alt="">
                </div>
            </div>

            <div class="content-info">
                <strong><?php echo $person['nombre']  ?></strong>
                <h2><?php echo $person['rol']  ?></h2>
                <h2><?php echo $person['facultad']  ?></h2>
            </div>
        </div>

        <?php } ?>




    </div>

       
</div>


<?php include '../footer.php'; ?>