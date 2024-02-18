


<?php
    include_once __DIR__ . '/../Login/login.php';
    include_once (__DIR__.'/../Home/Videos/Home.php');


    require_once (__DIR__.'/../../App/Controllers/Login/AuthController.php');

    session_start();


    if (isset($_SESSION['correo'])) {
        $correo = $_SESSION['correo'];
        $row = obtenerDatos($correo);
        $paginas = $row['paginas'];
        $row = $row['datos'];
        $idrolusuario = $row['idrolusuario'];
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <!---Import CSS--->
    <link rel="stylesheet" type="text/css" href="/Literagiando/Resources/css/home.css">
    <link rel="stylesheet" type="text/css" href="/Literagiando/Resources/css/timeline.css">
    <link rel="stylesheet" type="text/css" href="/Literagiando/Resources/css/RegisterLog.css">
    <link rel="stylesheet" type="text/css" href="/Literagiando/Resources/css/video-min.css">

    <script src="/Literagiando/Resources/js/script-videos.js" defer></script>

    <!---links--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!----links Icons---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

        <div class="content-logo" onclick="window.location.href='/Literagiando/Views/Home/index.php';" style="cursor: pointer;" role="button">
            <div class="logo-litera">
                <img src="/Literagiando/Resources/img/Logo_Literagiando.png" alt="Imagen">
            </div>
            <div class="title-litera">
            <strong>Literagiando</strong>
            </div>
            <div class="logo-uni">
                <img src="/Literagiando/Resources/img/Logo-Uni.png" alt="Imagen">
            </div>
        </div>
        
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a id="btnInicio" class="navbar-brand" href="/Literagiando/Views/Home/index.php" class="boton-modal"><i class='bx bx-home' ></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a id="btnSobreNosotros" class="nav-link active" aria-current="page" href="/Literagiando/Views/Home/TimeLine/historia.php"><strong>Sobre Nosotros</strong></a>
                    </li>
                    <li class="nav-item">
                    <a id="btnNoticias" class="nav-link" href="/Literagiando/Views/Home/Noticias/noticias.php"><strong>Noticias</strong></a>
                    </li>
                    <li class="nav-item">
                    <a id="btnEventos" class="nav-link" href="/Literagiando/Views/Home/Eventos/eventos.php"><strong>Eventos</strong></a>
                    </li>
                    <li class="nav-item">
                    <a id="btnBlog" class="nav-link" href="/Literagiando/Views/Home/Blog/blogs.php"><strong>Blogs</strong></a>
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
                <?php if (!isset($idrolusuario)) { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#LoginModal">
                                <strong>Iniciar Sesión</strong> <i class='bx bx-user'></i>
                            </a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown ms-auto">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $row['foto_usuario'] ?>" alt="" class="img-fluid rounded-circle avatar mr-2">
                                <?php echo $row['nombrecompleto_usuario'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/Literagiando/Views/UserCard/perfil.php" class="dropdown-item"><i class='bx bx-user'></i> Perfil</a></li>
                                <li><a href="/Literagiando/App/Controllers/Login/LogoutController.php" class="dropdown-item"><i class='bx bx-power-off'></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>

            </div>
        </nav>

            
        
