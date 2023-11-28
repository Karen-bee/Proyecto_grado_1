<?php 



?>

<?php include '../Home/header.php' ?>

<title>Home</title>

<div class="container-carousel">
    <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="/Storage/img-home/Slider 1.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="/Storage/img-home/Slider 2.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="/Storage/img-home/Slider 3.jpeg" class="d-block w-100" alt="...">
        </div>
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

<div class="container-slider">
    <picture>
        <source srcset="/Resources/img/fondo_noticias.png" type="image/svg+xml">
        <strong id="title-1"><p>taller</p><p>infatil</p> </strong>
        <img src="..." class="img-fluid" alt="...">
        <a id="btn-ver-1" href="#">Ver más</a>
    </picture>

    <picture>
        <source srcset="/Resources/img/fondo_noticias.png" type="image/svg+xml">
        <strong id="title-2"><p>libro hecho </p><p>a mano</p> </strong>
        <img src="..." class="img-fluid" alt="...">
        <a id="btn-ver-2" href="#">Ver más</a>
    </picture>

    <picture>
        <source srcset="/Resources/img/fondo_noticias.png" type="image/svg+xml">
        <strong id="title-3"><p>taller de</p><p>señas</p> </strong>
        <img src="..." class="img-fluid" alt="...">
        <a id="btn-ver-3" href="#">Ver más</a>
    </picture>

    <picture>
        <source srcset="/Resources/img/fondo_noticias.png" type="image/svg+xml">
        <strong id="title-4"><p>dibuja con</p><p>literagiando</p> </strong>
        <img src="..." class="img-fluid" alt="...">
        <a id="btn-ver-4" href="#">Ver más</a>
    </picture>
</div>

<div class="container-ubicacion">
    <div class="title-ubicacion"><strong>nos encontrasmos en:</strong></div>
</div>
<div class="content-info">
<div class="video">
<iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
</div>
<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.107418991662!2d-74.03249842537006!3d4
    .751366395223834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f8f7df50575cd%3A0xd21bdff9aaaa136!
    2sUniversidad%20De%20San%20Buenaventura!5e0!3m2!1ses!2sco!4v1689399795917!5m2!1ses!2sco" 
    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>

<?php include '../Home/footer.php' ?>