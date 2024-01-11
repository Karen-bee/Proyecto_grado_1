<?php
require_once(__DIR__ . '/../App/Controllers/EventoController.php');

function EliminarEvento($ideventos) {
    if ($ideventos === null) {
        echo "ID de evento no proporcionado";
        return;
    }

    $eventoController = new EventoController();

    $respuesta = $eventoController->EliminarEventoController($ideventos);

    if ($respuesta['resultado'] == true) {
        echo "Registro Eliminado";
        header("Location: ./../Views/EventosAdmin/index.php");
        exit;
    } else {
        echo "Error al eliminar el registro";
    }
}

function EditarEvento($ideventos) {
    if (
        $ideventos !== null &&
        isset($_POST['titulo_evento']) &&
        isset($_POST['detalle_evento']) &&
        isset($_POST['idtipo_evento'])
    ) {
        // Validar y filtrar datos según sea necesario

        $eventoController = new EventoController();

        $datos = array(
            "ideventos" => $ideventos,
            "titulo_evento" => $_POST['titulo_evento'],
            "detalle_evento" => $_POST['detalle_evento'],
            "idtipo_evento" => $_POST['idtipo_evento']
        );

        $respuesta = $eventoController->EditarEventoController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Editado";
            header("Location: ./../Views/EventosAdmin/index.php");
            exit;
        } else {
            echo "Error al editar el registro";
        }
    } else {
        echo "Datos incompletos para editar el registro";
    }
}

function NuevoEvento() {
    if (
        isset($_POST['titulo_evento']) &&
        isset($_POST['detalle_evento']) &&
        isset($_POST['idtipo_evento'])
    ) {
        // Validar y filtrar datos según sea necesario

        $eventoController = new EventoController();

        $datos = array(
            "titulo_evento" => $_POST['titulo_evento'],
            "detalle_evento" => $_POST['detalle_evento'],
            "idtipo_evento" => $_POST['idtipo_evento']
        );

        $respuesta = $eventoController->NuevoEventoController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Guardado";
            header("Location: ./../Views/EventosAdmin/index.php");
            exit;
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
    }
}

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

switch ($accion) {
    case 'nuevo':
        NuevoEvento();
        break;
    
    case 'editar':
        $ideventos = isset($_POST['ideventos']) ? $_POST['ideventos'] : null;
        EditarEvento($ideventos);
        break;
    
    case 'eliminar':
        $ideventos = isset($_POST['ideventos']) ? $_POST['ideventos'] : null;
        EliminarEvento($ideventos);
        break;

    default:
        echo "Acción no válida";
        break;
}
?>

