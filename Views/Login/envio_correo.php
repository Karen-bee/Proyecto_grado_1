


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Literagiando</title>

    <!-- CSS -->
    <!--boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/Literagiando/Storage/img-eventos/Logo_Literagiando.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
                * {
            margin: 0;
            padding: 0;
        }

        body {
            font-size: 20px;
            width: 100%;
            font-family: 'Source Serif Pro', cursive;
        }

        h1 {
            font-family: 'Source Serif Pro', cursive;
            color: #47525E;
        }

        .table {
            font-family: 'Source Serif Pro', cursive;
            color: #47525E;

        }

        hr {
            border-width: 4px;
            border-color: #ff9d00;
            background-color: #FFD185;
        }

        .contenedor {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
        }

        .btn {
            background-color: #ff9d00;
            color: white;
            border-color: #47525E;
        }

        .btn:hover {
            background-color: #ff9d00;
            color: white !important;
            box-shadow: 0 4px 16px #ff9d00;
            transition: all 0.2s ease;
        }

        .btn3 {
            background-color: #ff9d00;
            color: white;
            border-color: #ff9d00;
            border-radius: 12px;
            padding: 4px;
        }

        .btn3:hover {
            background-color: #ff9d00;
            color: white !important;
            box-shadow: 0 4px 16px #ff9d00;
            transition: all 0.2s ease;
        }

        .btn2 {
            border: none;
        }

        .botones {
            display: flex;
            justify-content: center;
        }


        .seccion2 {
            width: 80%;
            background: url(/Literagiando/Storage/Imagenes/login_literagiando.jpeg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: contain;
            padding: 15%;
        }

        .formulario {
            width: 113%;
            display: flex;
            justify-content: right;
            align-items: right;
            font-family: 'Source Serif Pro', cursive;
        }

        p2 {
            font-size: 30px;
            color: #F59A35;
            text-align: center;
            font-weight: bold;
            font-family: 'Source Serif Pro', cursive;
        }

        p {
            font-family: 'Source Serif Pro', cursive;
        }

        .enlace1 {
            color: #F59A35;
            font-size: 14px;
            display: flex;
            justify-content: right;
            align-items: right;
            font-family: 'Source Serif Pro', cursive;
        }

        .pregistro {
            font-family: 'Source Serif Pro', cursive;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 6px;
            margin-bottom: 0px;
        }

        .enlace2 {
            color: #F59A35;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Source Serif Pro', cursive;
        }

        .bloque {
            display: flex;
            width: 100%;
        }

        .elemento {
            padding: 3px;
            border: 1px solid black;
            width: 100%;
        }

        .titulo_grande {
            text-align: center;
            margin-top: 5px;
        }

        /* LETRA POP UP */

        .letraPop {
            font-family: 'Source Serif Pro', sans-serif;
            color: black;
            font-size: 16px;
            font-weight: 400;
            position: relative;
            left: 20px;
        }

        .titlePop {
            font-family: 'Source Serif Pro', sans-serif;
            color: black;
            font-size: 20px;
        }

        /* responsive */

        @media(max-width: 1100px) {
            body {
                font-size: 15px;
            }
        }

        @media(max-width: 1194px) {
            .seccion2 {
                width: 50%;
                background: url(/Literagiando/Storage/Imagenes/login_literagiando2.jpeg);
                background-position: center center;
                background-repeat: no-repeat;
                background-size: contain;
                padding: 10%;
            }

            .formulario {
                width: 80%;
                display: flex;
                justify-content: right;
                align-items: right;
                font-family: 'Source Serif Pro', cursive;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <div class="seccion2">
            <div class="formulario">
                <form id="formEmail" method="post" action="envio_correo.php">
                    <div class="bloque">
                        <div>
                            <hr class="elemento">
                        </div>
                        <div class="elemento2">
                            <img src="/Literagiando/Storage/Icon/reset_password.png" alt="Resest Password" width="46px">
                        </div>
                        <div>
                            <hr class="elemento">
                        </div>
                    </div>

                    <p2>Recupera tu cuenta</p2>
                    <p>Se enviara un correo para realizar el cambio <br> de contraseña.</p>
                    <div class="mb-3">
                        <label for="lb_email" class="form-label">Correo Electronico</label>
                        <input type="email" class="form-control" id="txt_email" name="correo" placeholder="Ingrese el correo electronico">
                        <a class="enlace1" href="/Literagiando/Views/login.php"><strong>Volver a inicio de sesión</strong></a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn3" name="Enviar_correo" id="btnCorreo"><strong>Enviar Correo<strong></button>
                    </div>
                    <p class="pregistro">¿No te has registrado?.</p>
                    <a class="enlace2" href="/Literagiando/Views/Registro.php" onclick="abrirPopup">Registrate aqui.</a>
                </form>
            </div>
        </div>
    </div>
    <!-- POP UP ENVIO CORREO -->

    <!-- Agrega esto en tu HTML antes del cierre de la etiqueta </body> -->
    <div class="modal fade" id="correoEnviadoModal" tabindex="-1" role="dialog" aria-labelledby="correoEnviadoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="titlePop" id="correoEnviadoModalLabel"><strong>Correo Enviado</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bi bi-x-square-fill"></i></span>
                    </button>
                </div>
                <div class="letraPop ">
                    Se le ha enviado un correo con éxito. Revise su bandeja de entrada para seguir las instrucciones.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn3" data-dismiss="modal" onclick="redireccionarALogin()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- POP UP NO SE ENVIO -->
    <div class="modal fade" id="NOcorreoEnviadoModal" tabindex="-1" role="dialog" aria-labelledby="correoEnviadoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="titlePop" id="correoEnviadoModalLabel"><strong>Correo no enviado<strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="bi bi-x-square-fill"></i></span>
                    </button>
                </div>
                <div class="letraPop">
                    El correo ingresado no existe en nuestra base de datos.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn3" data-dismiss="modal" onclick="redireccionarACorreo()">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redireccionarALogin() {
            window.location.href = "/Literagiando/Views/login.php";
        }

        function redireccionarACorreo() {
            window.location.href = "/Literagiando/Views/envio_correo.php";
        }
    </script>
    <!-- Agrega esto en el <head> de tu HTML -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>


<?php
include '../../App/Models/Conexion.php';


// -- Tomar los datos provenientes de los campos del Formulario

if (isset($_POST["Enviar_correo"])) {

    echo "ENtrooooo";

    $con = New db();
    $conexion = $con->conexion();

    if (!$conexion) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    $email_consulta = $_POST['correo'];
    $consultaEmail = "SELECT * FROM usuario WHERE correo_usuario LIKE '%$email_consulta%'";

    $stmt = $conexion->prepare($consultaEmail);
    $stmt->execute();
    $resultado_email = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $row = 0;
    if ($resultado_email !== false) {
        $row = count($resultado_email);

    } else {
        echo 'Error en la consulta a la base de datos: ' . mysqli_error($conexion);
    }

    //session_start(); // Inicia la sesión para almacenar datos del usuario
    //$_SESSION['correo'] = $email_consulta; // Almacena el nombre de usuario en la sesión

    if ($row !== 0) {
        $miDisenoHTML1 = '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recuperar Cuenta</title>
            <style>
                body {
                    font-family: Source Serif Pro, sans-serif;
                    background-color: #f2f2f2;
                    margin: 0;
                    padding: 0;
                }
        
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
        
                .header {
                    background-color: #EB8600;
                    color: #fff;
                    text-align: center;
                    padding: 20px;
                }
        
                .content {
                    padding: 20px;
                }
        
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #EB8600;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                }
        
                .button:hover {
                    background-color: #0056b3;
                }
        
                .footer {
                    text-align: center;
                    padding-top: 20px;
                }
            </style>
        </head>
        
        <body>
            <div class="container">
                <div class="header">
                    <h1>Recuperar Cuenta</h1>
                </div>
                <div class="content">
                    <p>Estimado/a Usuario,</p>
                    <p>Recibes este correo porque solicitaste recuperar tu cuenta en Literagiando</p>
                    <p>Estamos aquí para ayudarte a restablecer tu acceso. A continuación, encontrarás un enlace seguro para cambiar tu contraseña:
                    </p>
                    <a href="http://localhost/Literagiando/Views/Login/reset_password.php?email_consulta='. $email_consulta .'" class="button">Recuperar Cuenta</a>
                    <p>Por favor, haz clic en el enlace anterior y sigue las instrucciones para crear una nueva contraseña. Asegúrate de utilizar una contraseña segura que contenga al menos 8 caracteres, incluyendo letras mayúsculas, letras minúsculas, números y símbolos.</p>
                    <p>Si no solicitaste esta recuperación de cuenta o no reconoces esta solicitud, te recomendamos que ignores este correo electrónico y tomes medidas adicionales para proteger tu cuenta. </p>
                    </div>
                <div class="footer">
                    <p>Gracias por confiar en Literagiando.</p>
                </div>
            </div>
        </body>
        
        </html>
        ';

        // Correo
        $to1 =  $email_consulta;
        $subject1 = "Literagiando - Recuperacion de Cuenta";
        $headers1 = "MIME-Version: 1.0" . "\r\n";
        $headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $message1 = $miDisenoHTML1;


        $email_consulta = filter_var($email_consulta, FILTER_SANITIZE_EMAIL);

        if (filter_var($email_consulta, FILTER_VALIDATE_EMAIL)) {
            $mail = mail($to1,$subject1,$message1,$headers1);
            if ($mail) {
                echo '<script>$("#correoEnviadoModal").modal("show");</script>';
                //echo "Correo enviado con éxito";
            } else {
                echo $mail;
                echo "<script language='javascript'>
                    alert('Mensaje enviado, muchas gracias.');
                    window.history.go(-1);                    </script>";

            }
        } else {
            echo '<script>$("#NocorreoEnviadoModal").modal("show");</script>';
        }

    } else {
        echo '<script>$("#NOcorreoEnviadoModal").modal("show");</script>';
    }
}

?>

</body>

</html>