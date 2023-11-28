<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Import CSS-->
    <link rel="stylesheet" type="text/css"  href="/Resources/css/App.css">
    <link rel="stylesheet" type="text/css"  href="/Resources/css/Styles.css">
    
    <!---links--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!----links Icons---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

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
          <img src="/Resources/img/erika.png" alt="" class="img-fluid rounded-circle avatar mr-2">
            Erika Lorena Estupiñan
          </a>
          <ul class="dropdown-menu">
            <li><a href="/Views/UserCard/perfil.php" class="dropdown-item" href=""><i class='bx bx-user'></i> Perfil</a></li>
            <li><a href="#" class="dropdown-item" href=""><i class='bx bx-power-off' ></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<div class="sidebar">
  <div class="logo-details">
  <img class="icon" src="/Resources/img/Logo_Literagiando.png" alt="">
    
      <div class="logo_name">Literagiando</div>
      <i class='bx bx-menu' id="btn" ></i>
  </div>
  <ul class="nav-list">
      
  <li>
      <a href="/Views//Dashboard.php">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">Dashboard</span>
      </a>
        <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a href="/Views/MisEventos/index.php">
        <i class='bx bx-calendar' ></i>
        <span class="links_name">Mis Eventos</span>
      </a>
      <span class="tooltip">Mis Eventos</span>
    </li>
    <li>
      <a href="/Views/SliderAdmin/index.php">
        <i class='bx bx-slideshow'></i>
        <span class="links_name">Admin Slider Home</span>
      </a>
      <span class="tooltip">Admin Slider Home</span>
    </li>
    <li>
      <a href="/Views/BlogAdmin/index.php">
        <i class='bx bxl-blogger' ></i>
        <span class="links_name">Administrador Blog</span>
      </a>
      <span class="tooltip">Administrador BLog</span>
    </li>
    <li>
      <a href="/Views//NoticiasAdmin/index.php">
        <i class='bx bx-chat' ></i>
        <span class="links_name">Administrador Noticias</span>
      </a>
      <span class="tooltip">Administrador Noticias</span>
    </li>
    <li>
      <a href="/Views//EventosAdmin/index.php">
        <i class='bx bx-calendar-edit'></i>
        <span class="links_name">Administrador Eventos</span>
      </a>
      <span class="tooltip">Administrador Eventos</span>
    </li>
    <li>
      <a href="/Views/UserAdmin/index.php">
        <i class='bx bx-user' ></i>
        <span class="links_name">Administrador Usuario</span>
      </a>
      <span class="tooltip">Administrador Usuario</span>
    </li>
  </ul>
</div>

