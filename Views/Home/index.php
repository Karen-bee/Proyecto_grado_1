<?php

require_once (__DIR__ . '/../../App/Controllers/EventoController.php');
$eventoController = new EventoController();
$eventos = $eventoController->ObtenerEventosController();


require_once (__DIR__ . '/../../App/Controllers/sliderController.php');
$sliderController = new SliderController();
$sliders = $sliderController->ObtenerSlidersController();

if($sliders['state'] === true){
    $sliders = $sliders['sliders'];
}
$eventos['eventos'] = array_slice($eventos['eventos'], 0, 5);

?>

<?php include '../Home/header.php' ?>

<title>Home</title>

<div class="container-carousel">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <?php foreach ($sliders as $key => $value) { ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= intval($key) ?>" <?= $key == 0 ? 'class="active"' : '' ?> aria-label="Slide <?= (intval($key) + 1) ?>"></button>

            <?php } ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($sliders as $key => $value) { ?>
                <div class="carousel-item <?= strval($key) == 0 ? 'active' : '' ?>">
                    <img src="<?= $value['ruta'] ?>" alt="" class="d-block mx-auto w-75">
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>





<div class="container-ubicacion">
    <div class="title-ubicacion">Ultimos eventos
    </div>
</div>

<div class="container-slider">
    <?php if($eventos['state']==1){
        foreach ($eventos['eventos'] as $evento) { 
            echo '<picture>';
            echo '<strong id="title"><p>' . $evento['titulo_evento'] . '</p></strong>';
            echo '<img src="' . $evento['imagen_eventos'] . '" class="img-fluid" alt="...">';
            echo '<a id="btn-ver-2" href="/Literagiando/Views/Home/Eventos/evento.php?idevento=' . $evento['ideventos'] . '">Ver más</a>';
            echo '</picture>';
    } } ?>
</div>

<div class="container-ubicacion">
    <div class="title-ubicacion">nos encontrasmos en:
</div>
</div>
<div class="content-info">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.1073881557145!2d-74.0324984263601!3d4.751371741218976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f8f7df50575cd%3A0xd21bdff9aaaa136!2sUniversidad De San Buenaventura%2C Bogotá!5e0!3m2!1ses!2sco!4v1705456116799!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>

<?php include '../Home/footer.php' ?>

