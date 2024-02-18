<?php
require_once(__DIR__ . '/../App/Controllers/EventoController.php');

function EliminarEvento($ideventos) {
    if ($ideventos === null) {
        echo "ID de evento no proporcionado";
        return;
    }

    $eventoController = new EventoController();

    $respuesta = $eventoController->EliminarEventoController($ideventos);

    if ($respuesta['state'] === true) {
        echo "Registro Eliminado";
        header("Location: /Literagiando/Views/EventosAdmin/index.php");
        exit;
    } else {
        echo "Error al eliminar el registro";
    }
}

function EditarEvento($ideventos) {
    if (
        $ideventos !== null &&
        isset($_POST['titulo_evento']) &&
        isset($_POST['subtitulo_evento']) &&
        isset($_POST['lugar']) &&
        isset($_POST['detalle_evento']) &&
        isset($_POST['fecha_evento']) &&
        isset($_POST['idtipo_evento'])
    ) {
        // Validar y filtrar datos según sea necesario

        $eventoController = new EventoController();

        $datos = array(
            "ideventos" => $ideventos,
            "titulo_evento" => $_POST['titulo_evento'],
            "subtitulo_evento" => $_POST['subtitulo_evento'],
            "lugar" => $_POST['lugar'],
            "detalle_evento" => $_POST['detalle_evento'],
            "fecha_evento" => $_POST['fecha_evento'],
            "idtipo_evento" => $_POST['idtipo_evento']
        );

        $respuesta = $eventoController->EditarEventoController($datos);

        if ($respuesta['state'] === true) {
            echo "Registro Editado";

            echo "<pre>";
            print_r($_POST);
            print_r($_FILES);
            print_r($respuesta['resultado']);
            echo "</pre>";

            header("Location: /Literagiando/Views/EventosAdmin/index.php");
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
        isset($_POST['subtitulo_evento']) &&
        isset($_POST['lugar']) &&
        isset($_POST['detalle_evento']) &&
        isset($_POST['fecha_evento']) &&
        isset($_POST['idtipo_evento'])
    ) {
        // Validar y filtrar datos según sea necesario

        $eventoController = new EventoController();

        $datos = array(
            "titulo_evento" => $_POST['titulo_evento'],
            "subtitulo_evento" => $_POST['subtitulo_evento'],
            "lugar" => $_POST['lugar'],
            "detalle_evento" => $_POST['detalle_evento'],
            "fecha_evento" => $_POST['fecha_evento'],
            "idtipo_evento" => $_POST['idtipo_evento']
        );

        $respuesta = $eventoController->NuevoEventoController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Guardado";
            echo "<pre>";
            print_r($_POST);
            print_r($respuesta['resultado']);
            echo "</pre>";
            header("Location: /Literagiando/Views/EventosAdmin/index.php");
            exit;
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
    }
}

function activarEvento()
{
    $eventoController = new EventoController();

    if(
        isset($_POST['estado_evento']) &&
        isset($_POST['idEvento'])
    ){
        $activo = $_POST['estado_evento'];
        //echo "<script>console.log('$activo');</script>";
        if ($activo === 'Activo') {
            $activo = 'Inactivo';
        } else {
            $activo ='Activo';
        }
        $id_Evento = $_POST['idEvento'];
        
        $datos = array(
            "idEvento" => $id_Evento,
            "estado_evento" => $activo
        );
        

        $respuesta = $eventoController->activarEvento($datos);

        if ($respuesta['state'] === true) {
            echo 'exito';
            header("Location: /Literagiando/Views/EventosAdmin/index.php");
            exit; 
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
    }
}

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
if($accion === ''){
    $accion = isset($_GET['accion']) ? $_GET['accion'] : '';
}

switch ($accion) {
    case 'nuevo':
        NuevoEvento();
        break;
    
    case 'editar':
        $ideventos = isset($_POST['ideventos']) ? $_POST['ideventos'] : null;
        EditarEvento($ideventos);
        break;
    
    case 'eliminar':
        $ideventos = isset($_GET['ideventos']) ? $_GET['ideventos'] : null;
        EliminarEvento($ideventos);
        break;

    case 'activarEvento':
        echo activarEvento();
        break;    

    default:
        echo "Acción no válida";
        break;
}
?>

