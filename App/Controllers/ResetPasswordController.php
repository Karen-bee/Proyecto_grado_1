<?php
include("../Models/Coneccion.php");

$Url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
var_dump($Url); // Cambiado de $url a $Url


function validarContrasena($contrasena) {
    if (strlen($contrasena) >= 8) {
        if (preg_match('/[^a-zA-Z0-9]/', $contrasena)) {
            return "pass";
        } else {
            return "La contrasena debe contener al menos un caracter especial";
        }
    } else {
        return "La contrasena debe tener más de 8 caracteres.";
    }
}

if (isset($_POST["reset_password"]) && isset($_GET["email_consulta"])) {

    //$correo = $_POST["correo"];
    $nueva_contraseña = $_POST["nueva_contraseña"];
    $confirmar_contraseña = $_POST["confirmar_contraseña"];
        // Validación de contraseñas
    $password = validarContrasena($nueva_contraseña);
    if ($password !== "pass") {
        $escapedConsulta = ($password); // Escapa la contraseña
        
        $pagina_anterior = $_SERVER['HTTP_REFERER'];
        
        echo '<script> alert("'.$escapedConsulta.'");window.location= "'.$pagina_anterior.'"</script>'; // Muestra la contraseña escapada en un alert
        
        //header("Location: $pagina_anterior"); // Redirige de vuelta a la página anterior
        
        $conexion->close(); // Cierra la conexión a la base de datos
        
        return ; // Detiene la ejecución del script
    }
    else{
        if ($nueva_contraseña != $confirmar_contraseña) {
            echo '<script>
            alert("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.");
            </script>';

            $pagina_anterior = $_SERVER['HTTP_REFERER'];
            header("Location: $pagina_anterior");

            $conexion->close();

            exit;
        }
    }

    // Obtener el valor de emailConsulta desde la URL
    $parsedUrl = parse_url($Url);
    parse_str($parsedUrl['query'], $params);
    $emailConsulta = isset($params['email_consulta']) ? $params['email_consulta'] : '';

    // Consultar si el usuario existe
    $sql = "SELECT * FROM usuario WHERE correo = '$emailConsulta'";
    $resultado_email = mysqli_query($conexion, $sql);
    $cant_duplicidad = mysqli_num_rows($resultado_email);

    if ($cant_duplicidad > 0) {
        // El usuario existe, actualiza la contraseña
        $hashedPassword = password_hash($nueva_contraseña, PASSWORD_BCRYPT);


        $sql_edit_computer = "UPDATE usuario SET password = '$hashedPassword', Fecha_registro = NOW() WHERE correo = '$emailConsulta'";
        $resultTotalEdit_computer = $conexion->query($sql_edit_computer);

        if ($resultTotalEdit_computer) {
            echo '<script>
            alert("CONTRASEÑA RESTABLECIDA CORRECTAMENTE");
            window.location= "/Literagiando/Views/Home/index.php"</script>';
        } else {
            echo '<script>
            alert("ERROR AL RESTABLECER CONTRASEÑA");
            "</script>';
            $pagina_anterior = $_SERVER['HTTP_REFERER'];
            header("Location: $pagina_anterior");
        }
    } else {
        echo '<script>
        alert("' . $emailConsulta . ' no fue enviado");
        </script>';
    }

    $conexion->close();
}
