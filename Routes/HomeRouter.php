<?php
require_once(__DIR__ . '/../App/Controllers/HomeController.php');

function EliminarPersona($id) {
    if ($id === null) {
        echo "ID de evento no proporcionado";
        return;
    }

    $homeController = new HomeController();

    $respuesta = $homeController->EliminarPersona($id);

    if ($respuesta['state'] === true) {
        echo "Registro Eliminado";
        header("Location: /Literagiando/Views/HomeAdmin/sobreNosotros.php");
        exit;
    } else {
        echo "Error al eliminar el registro";
    }
}



function NuevoEvento() {
    if (
        isset($_POST['nombre']) &&
        isset($_POST['cargo']) &&
        isset($_POST['facultad'])
    ) {
        // Validar y filtrar datos según sea necesario

        $homeController = new HomeController();

        $datos = array(
            "nombre" => $_POST['nombre'],
            "cargo" => $_POST['cargo'],
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
        echo "</pre>";
        //header("Location: /Literagiando/Views/HomeAdmin/sobreNosotros.php");

    }
}

function NuevaEntrada() {
    unset($_POST['accion']);
    $datos = $_POST;

    if (
        isset($_POST)){
        // Validar y filtrar datos según sea necesario

        $homeController = new HomeController();

        $respuesta = $homeController->NuevaFila($datos);

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
        print_r($datos);
        echo "</pre>";
            //header("Location: /Literagiando/Views/HomeAdmin/sobreNosotros.php");

    }
}

function borrarEntrada() {
    unset($_POST['accion']);
    $datos = $_POST;

    if (
        isset($_POST)){
        // Validar y filtrar datos según sea necesario

        $homeController = new HomeController();

        $respuesta = $homeController->borrarFila($datos);

        if ($respuesta['state'] == true) {
            echo "Registro eliminado";
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
        print_r($datos);
        echo "</pre>";
            //header("Location: /Literagiando/Views/HomeAdmin/sobreNosotros.php");

    }
}

function editarSobreNosotros($id) {
    if (!empty(array_filter(array_keys($_POST), function($key) {
        return strpos($key, 'id_') !== false;
    }))) {
        $homeController = new HomeController();

        $datos = $_POST;
        unset($datos['accion']);

        $respuesta = $homeController->editarSobreNosotros($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Editado";
            echo "<pre>";
            print_r($respuesta['resultado']);
            print_r($datos);
            print_r($_FILES);
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
        Editar();
        break;
    
    case 'eliminar':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        EliminarPersona($id);
        break;

    case 'activar':
        echo activar();
        break;    

    case 'editarSobreNosotros':
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        editarSobreNosotros($id);
        break;

    case 'crear':
        NuevaEntrada();
        break;

    case 'borrar':
        borrarEntrada();
        break;
    default:
        echo "Acción no válida";
        break;
}
?>

