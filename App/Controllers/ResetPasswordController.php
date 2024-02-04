<?php
include("../Models/Coneccion.php");

$Url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
var_dump($Url); // Cambiado de $url a $Url

if (isset($_POST["reset_password"])) {
    $email =  $_GET["email_consulta"];
    print_r($email);

    //$correo_usuario = $_POST["correo_usuario"];
    $nueva_contraseña = $_POST["nueva_contraseña"];
    $confirmar_contraseña = $_POST["confirmar_contraseña"];

    // Validación de contraseñas
    if ($nueva_contraseña != $confirmar_contraseña) {
        echo "Las contraseñas no coinciden. Por favor, inténtelo de nuevo.";
        exit;
    }

    // Obtener el valor de emailConsulta desde la URL
    $parsedUrl = parse_url($Url);
    parse_str($parsedUrl['query'], $params);
    $emailConsulta = isset($params['email_consulta']) ? $params['email_consulta'] : '';

    // Consultar si el usuario existe
    $sql = "SELECT * FROM usuario WHERE correo_usuario = '$emailConsulta'";
    $resultado_email = mysqli_query($conexion, $sql);
    $cant_duplicidad = mysqli_num_rows($resultado_email);

    if ($cant_duplicidad > 0) {
        // El usuario existe, actualiza la contraseña
        $md5_hash = md5($nueva_contraseña);
        $sha256_hash = hash('sha256', $md5_hash);

        $sql_edit_computer = "UPDATE usuario SET password = '$sha256_hash', Fecha_registro = NOW() WHERE correo_usuario = '$emailConsulta'";
        $resultTotalEdit_computer = $conexion->query($sql_edit_computer);

        if ($resultTotalEdit_computer) {
            echo '<script>
            alert("CONTRASEÑA RESTABLECIDA CORRECTAMENTE");
            window.location= "/Literagiando/Views/Home/index.php"</script>';
        } else {
            echo '<script>
            alert("ERROR AL RESTABLECER CONTRASEÑA");
            window.location= "/Literagiando/Views/Login/reset_password.php"</script>';
        }
    } else {
        echo '<script>
        alert("' . $emailConsulta . '");
        </script>';
    }

    $conexion->close();
}
