<?php

$server = "localhost";
$userRoot = "root";
$password = "";
$db = "literagiando";

$conexion = new mysqli($server, $userRoot, $password, $db);

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

if (isset($_POST["btnSubmit"])) {
    if (empty($_POST["correo_usuario"]) || empty($_POST["password"])) {
        echo '<script>
                alert("CAMPO E-MAIL O CONTRASEÑA VACÍO");
                window.location= "/Views/Home/index.php"</script>';
    } else {
        $correo_usuario = $_POST["correo_usuario"];
        $password = $_POST["password"];

        // Consulta preparada para prevenir inyección SQL
        $stmt = $conexion->prepare("SELECT idrolusuario, password FROM usuario WHERE correo_usuario=?");
        $stmt->bind_param("s", $correo_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($datos = $result->fetch_assoc()) {
            // Verificar la contraseña utilizando password_verify
            if (password_verify($password, $datos['password'])) {
                session_start();

                // Verificar si la sesión ya está iniciada
                if (isset($_SESSION['correo'])) {
                    echo '<script>
                            alert("La sesión ya está iniciada");
                            window.location= "/Views/Dashboard.php"</script>';
                } else {
                    $_SESSION['correo'] = $correo_usuario;
                    $rol = $datos['idrolusuario'];

                    // Validar el rol y redirigir según sea necesario
                    $url = "/Views/Dashboard.php";
                    header("Location: $url");
                    exit(); // Asegurar que el script se detenga después de la redirección
                }
            } else {
                echo '<script>
                        alert("CONTRASEÑA INCORRECTA");
                        window.location= "/Views/Home/index.php"</script>';
            }
        } else {
            echo '<script>
                    alert("Usuario no encontrado");
                    window.location= "/Views/Home/index.php"</script>';
        }

        $stmt->close();
    }
}


?>


