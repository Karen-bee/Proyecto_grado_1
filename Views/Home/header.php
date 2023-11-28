<?php
    include_once __DIR__ . './../Login/login.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!---Import CSS--->
    <link rel="stylesheet" type="text/css" href="/Resources/css/home.css">
    <link rel="stylesheet" type="text/css" href="/Resources/css/timeline.css">
    <link rel="stylesheet" type="text/css" href="/Resources/css/RegisterLog.css">

    <!---links--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!----links Icons---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

        <div class="content-logo">
            <div class="logo-litera">
                <img src="/Resources/img/Logo_Literagiando.png" alt="Imagen">
            </div>
            <div class="title-litera">
            <strong>Literagiando</strong>
            </div>
            <div class="logo-uni">
                <img src="/Resources/img/Logo-Uni.png" alt="Imagen">
            </div>
        </div>
        
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a id="btn-icon" class="navbar-brand" href="/Views/Home/index.php"><i class='bx bx-home' ></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/Views/Home/TimeLine/historia.php"><strong>Sobre Nosotros</strong></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/Views/Home/Noticias/noticias.php"><strong>Noticias</strong></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/Views/Home/Eventos/eventos.php"><strong>Eventos</strong></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/Views/Home/Blog/blog.php"><strong>Blog</strong></a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>Biblioteca</strong>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>

                </ul>
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#LoginModal"><strong>Iniciar Sesión</strong> <i class='bx bx-user' ></i></a>
                    </li>
                </div>
                </ul>
            </div>
            </nav>

            
        
