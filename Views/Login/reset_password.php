<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literagiando</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/Literagiando/Resources/Css/style_cambiocontra.css">
    <!--boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <?php
    $email =  $_GET["email_consulta"];
    ?>
    <div class="contenido">
        <div class="contenedor">
            <div class="seccion2">
                <div class="formulario">
                    <form action="/Literagiando/App/Controllers/ResetPasswordController.php?email_consulta=<?php echo $email; ?>" method="post">
                        <div class="bloque">
                            <div>
                                <hr class="elemento">
                            </div>
                            <div><img class="elemento2" src="/Literagiando/Storage/Icon/reset_password.png" alt=""></div>
                            <div>
                                <hr class="elemento">
                            </div>
                        </div>

                        <p2>Cambio de contraseña</p2>
                        <p>Asegurese de que las contraseñas
                            coincidan.</p>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="nueva_contraseña" name="nueva_contraseña" placeholder="Ingrese la contraseña">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmacion de contraseña</label>
                            <input type="password" class="form-control" id="confirmar_contraseña" name="confirmar_contraseña" placeholder="Conforme su contraseña">

                            <a class="enlace1" href="login.php">Volver a inicio de sesión</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="reset_password" class="btn3">Cambiar Contraseña</button>
                        </div>
                        <p class="pregistro">¿No te has registrado?.</p>
                        <a class="enlace2" href="register_user.php">Registrate aqui.</a>

                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>