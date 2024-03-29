


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
            window.location.href = "/Literagiando/Views/Home/index.php";
        }

        function redireccionarACorreo() {
            window.location.href = "/Literagiando/Views/envio_correo.php";
        }
    </script>
    <!-- Agrega esto en el <head> de tu HTML -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


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
    $consultaEmail = "SELECT * FROM usuario WHERE correo LIKE '%$email_consulta%'";

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
                echo "<script>
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
