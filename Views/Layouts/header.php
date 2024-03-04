<?php

require_once (__DIR__.'/../../App/Controllers/Login/AuthController.php');

require_once (__DIR__.'/../../App/Controllers/Login/PermisosController.php');
$permisoController = new PermisosController();
$permisos = $permisoController->ObtenerPermisoController();

session_start();


if (isset($_SESSION['correo'])) {
  $correo = $_SESSION['correo'];
  $row = obtenerDatos($correo);
  $paginas = $row['paginas'];
  $row = $row['datos'];
  $rol = $row['rol'];
  $paginasPermitidas = obtenerPaginas();


}else{
  $mensaje = "No has iniciado sesión. Por favor, inicia sesión para acceder.";
  echo '<script>alert("' . htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') . '");</script>';
  echo '<script>window.location.href = "/Literagiando/Views/Home/index.php";</script>';
  exit();
}

function formatfecha($fe){
  global $meses;
  global $dias;
  $timestamp = strtotime($fe);
  $fechaFormateada = strftime('%A, %e de %B %Y %H:%M', $timestamp);
  $fechaFormateada = strtr($fechaFormateada, array_merge($meses, $dias));
  
  return $fechaFormateada;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Import CSS-->
    <link rel="stylesheet" type="text/css"  href="/Literagiando/Resources/css/App.css">
    <link rel="stylesheet" type="text/css"  href="/Literagiando/Resources/css/Styles.css">
    <link rel="stylesheet" type="text/css"  href="/Literagiando/Resources/css/checkbox.css">
    <link rel="stylesheet" type="text/css" href="/Literagiando/Resources/css/video-min.css">
    
    <!---links--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!----links Icons---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    
<nav class="navbar navbar-expand-lg" id="dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown ms-auto">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo $row ['foto_perfil'] ?>" alt="" class="img-fluid rounded-circle avatar mr-2">
            <?php  echo $row['nombre_completo']?>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/Literagiando/Views/UserCard/perfil.php" class="dropdown-item" href=""><i class='bx bx-user'></i> Perfil</a></li>
            
            <li><a href="/Literagiando/App/Controllers/Login/LogoutController.php" class="dropdown-item" href=""><i class='bx bx-power-off' ></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var paginas = <?php echo json_encode($paginasPermitidas); ?>;

            // Obtén el ID de rol del usuario actual, ya sea mediante PHP o algún otro método
            var rol = <?php echo $rol; ?>;

            // Filtra las páginas según el ID de rol del usuario actual
            var paginasFiltradas = paginas.filter(function(pagina) {
                return rol == pagina['idrol'];
            });

            // Obtén la lista del panel lateral
            var navList = document.querySelector(".nav-list");

            // Itera sobre las páginas filtradas y agrégalas al panel lateral
            paginasFiltradas.forEach(function(pagina) {
              var listItem = document.createElement("li");
              var link = document.createElement("a");
              var icon = document.createElement("i");
              var spanName = document.createElement("span");
              var spanTooltip = document.createElement("span");

              listItem.appendChild(link);
              link.href = pagina.url_pagina;
              link.id = 'btn'+pagina.nombre_pagina.replace(" ","")+'Video';

              link.appendChild(icon);
              icon.classList.add("bx", pagina.class);

              link.appendChild(spanName);
              spanName.classList.add("links_name");
              spanName.textContent = pagina.nombre_pagina;

              listItem.appendChild(spanTooltip);
              spanTooltip.classList.add("tooltip");
              spanTooltip.textContent = pagina.nombre_pagina;

              navList.appendChild(listItem);
        });
        });
    </script>
<div class="sidebar">
  <div class="logo-details">
  <img class="icon" src="/Literagiando/Resources/img/Logo_Literagiando.png" alt="">
    
      <div class="logo_name">Literagiando</div>
      <i class='bx bx-menu' id="btn" ></i>
  </div>
  <ul class="nav-list">
    
    


  </ul>
</div>

<?php
include_once (__DIR__.'/../Home/Videos/Home.php');
?>
