<?php
require_once(__DIR__ . '/../App/Controllers/HomeController.php');

function EliminarPersona($id) {
    if ($id === null) {
        echo "ID de evento no proporcionado";
        return;
    }

    $homeController = new HomeController();

    $respuesta = $homeController->EliminarHomeController($id);

    if ($respuesta['state'] === true) {
        echo "Registro Eliminado";
        header("Location: /Literagiando/Views/EventosAdmin/index.php");
        exit;
    } else {
        echo "Error al eliminar el registro";
    }
}



function NuevoEvento() {
    if (
        isset($_POST['nombre']) &&
        isset($_POST['rol']) &&
        isset($_POST['facultad'])
    ) {
        // Validar y filtrar datos según sea necesario

        $homeController = new HomeController();

        $datos = array(
            "nombre" => $_POST['nombre'],
            "rol" => $_POST['rol'],
            "facultad" => $_POST['facultad']
        );

        $respuesta = $homeController->NuevaPersona($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Guardado";
            echo "<pre>";
            print_r($_POST);
            print_r($respuesta['resultado']);
            echo "</pre>";
            header("Location: /Literagiando/Views/HomeAdmin/sobreNosotros.php");
            exit;
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
        echo "<pre>";
            print_r($_POST);
            print_r($respuesta['resultado']);
            echo "</pre>";
    }
}

function editarSobreNosotros($id) {
    if ( $id !== null ) {
        $homeController = new HomeController();

        $datos = $_POST;
        array_shift($datos);

        echo '<script>console.log(${datos});</script>';

        $respuesta = $homeController->editarSobreNosotros($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Editado";
            echo "<pre>";
            print_r($respuesta['resultado']);
            print_r($datos);
            echo "</pre>";
            $pagina_anterior = $_SERVER['HTTP_REFERER'];
            header("Location: $pagina_anterior");
            exit;
        } else {
            echo "Error al editar el registro";
        }
    } else {
        echo "Datos incompletos para editar el registro";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
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
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        Editar($id);
        break;
    
    case 'eliminar':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        Eliminar($id);
        break;

    case 'activar':
        echo activar();
        break;    

    case 'editarSobreNosotros':
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        editarSobreNosotros($id);
        break;

    default:
        echo "Acción no válida";
        break;
}
?>

