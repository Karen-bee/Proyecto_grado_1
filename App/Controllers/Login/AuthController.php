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
    if (empty($_POST["correo"]) || empty($_POST["password"])) {
        echo '<script>
                alert("CAMPO E-MAIL O CONTRASEÑA VACÍO");
                window.location= "/Literagiando/Views/Home/index.php"</script>';
    } else {
        $correo = $_POST["correo"];
        $password = $_POST["password"];

        // Consulta preparada para prevenir inyección SQL
        $stmt = $conexion->prepare("SELECT rol, password, estado, id_usuario FROM usuario WHERE (correo=? ) ");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($datos = $result->fetch_assoc()) {
            if($datos['estado']!=1){
                echo '<script>
                    alert("Usuario inactivo");
                    window.location= "/Literagiando/Views/Home/index.php"</script>';
            }elseif (password_verify($password, $datos['password'])) {
                session_start();

                // Verificar si la sesión ya está iniciada
                if (isset($_SESSION['correo'])) {
				    $_SESSION["id_usuario"] = $datos["id_usuario"];

                    echo '<script>
                            alert("Bienvenid@ de vuelta");
                            window.location= "/Literagiando/Views/Dashboard.php"</script>';
                } else {
                    $_SESSION['correo'] = $correo;
				    $_SESSION["id_usuario"] = $datos["id_usuario"];

                    $rol = $datos['rol'];

                    // Validar el rol y redirigir según sea necesario
                    $url = "/Literagiando/Views/Dashboard.php";
                    header("Location: $url");
                    exit(); // Asegurar que el script se detenga después de la redirección
                }
            } else {
                echo '<script>
                        alert("CONTRASEÑA INCORRECTA");
                        window.location= "/Literagiando/Views/Home/index.php"</script>';
            }
        } else {
            echo '<script>
                    alert("Usuario no encontrado");
                    window.location= "/Literagiando/Views/Home/index.php"</script>';
        }

        $stmt->close();
    }
}

// Verifica si hay una sesión activa
function obtenerDatos($correoU) {
    // Obtiene el correo del usuario actual
    $correo = $_SESSION['correo'];
    global $conexion;

    // Consulta el rol y otros datos del usuario actual
    $sql = "SELECT usuario.* , roles.nombre_rol  FROM usuario JOIN roles  ON roles.idrol = usuario.rol WHERE correo = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si la consulta fue exitosa
        if ($result) {
            $row = $result->fetch_assoc();

            // Obtiene el rol
            $rol = $row['rol'];

            // También puedes obtener otros campos si es necesario
            // $otrosCampos = $row['otros_campos'];
        } else {
            // Handle the error, e.g., log it or show a user-friendly message
            echo "Error executing the query: " . $conexion->error;
        }

        $stmt->close();
    } else {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error preparing the statement: " . $conexion->error;
    }

    $sql_paginas = "SELECT * FROM pagina ORDER by id_pagina";
    $stmt = $conexion->prepare($sql_paginas);

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        $paginas = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
    } else {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error preparing the statement: " . $conexion->error;
    }

    $salida = array(
        'datos' => $row,
        'paginas' => $paginas
    );
    return $salida;
}

function obtenerPaginas() {
    global $conexion;


    $sql_paginas = "SELECT roles_permisos.idrol , pagina.* FROM `roles_permisos` JOIN pagina ON pagina.id_pagina = roles_permisos.id_pagina ";
    $stmt = $conexion->prepare($sql_paginas);

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        $paginas = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
    } else {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error preparing the statement: " . $conexion->error;
    }

    return $paginas;
}

function inscribirEvento($id_usuario, $idEvento) {
    global $conexion;

    $sql = "INSERT INTO `asistencia_eventos` (`ideventos`, `id_usuario`) VALUES (?, ?)";
    
    try {
        $stmt = $conexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ii", $idEvento, $id_usuario);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo '<script>alert("Evento inscrito con éxito")</script>';
            } else {
                echo '<script>alert("Usuario ya inscrito o error en la inscripción")</script>';
            }

            $stmt->close();
        }
    } catch (mysqli_sql_exception $e) {
        // Aquí puedes manejar cómo se informa el error, por ejemplo:
        echo '<script>alert("Usuario ya inscrito en el evento")</script>';
    }
}

function desinscribirEvento($id_usuario, $idEvento, $asistencia) {
    global $conexion;


    if ($asistencia == "borrar") {
        $query = "DELETE FROM asistencia_eventos WHERE ideventos=? AND id_usuario=?";
    } elseif ($asistencia == "si") {
        $query = "UPDATE asistencia_eventos SET asiste ='no' WHERE ideventos=? AND id_usuario=?";
    } else {
        $query = "UPDATE asistencia_eventos SET asiste ='si' WHERE ideventos=? AND id_usuario=?";
    }

    $sql = $query;
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ii", $idEvento, $id_usuario);
        $stmt->execute();

        // Verifica si la inserción fue exitosa
        if ($stmt->affected_rows > 0) {
            echo '<script>alert("Evento actualizado con éxito");window.location= "/Literagiando/Views/MisEventos/index.php"</script>';
        } else {
            // Maneja el caso cuando no se insertó ninguna fila
            echo '<script>alert("'. $stmt->error .'")</script>';
        }

        $stmt->close();
    } else {
        // Handle the error, e.g., log it or show a user-friendly message
        echo "Error preparing the statement: " . $conexion->error;
    }
}


?>


