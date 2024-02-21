<?php
require_once(__DIR__ . '/../App/Controllers/SliderController.php');

function EliminarSlider($idsliders) {
    if ($idsliders === null) {
        echo "ID de slider no proporcionado";
        return;
    }

    $sliderController = new SliderController();

    $respuesta = $sliderController->EliminarSliderController($idsliders);

    if ($respuesta['state'] === true) {
        echo "Registro Eliminado";
        header("Location: /Literagiando/Views/SliderAdmin/index.php");
        exit;
    } else {
        echo "Error al eliminar el registro";
    }
}


function NuevoSlider() {
    
        $sliderController = new SliderController();

        $respuesta = $sliderController->NuevoSliderController();

        if ($respuesta['state'] == true) {
            echo "Registro Guardado";

            header("Location: /Literagiando/Views/SliderAdmin/index.php");
            exit;
        } else {
            echo "Error al guardar el registro";
        }
}

function activarSlider()
{
    $sliderController = new SliderController();

    if(
        isset($_POST['estado_slider']) &&
        isset($_POST['idSlider'])
    ){
        $activo = $_POST['estado_slider'];
        //echo "<script>console.log('$activo');</script>";
        if ($activo === 'Activo') {
            $activo = 'Inactivo';
        } else {
            $activo ='Activo';
        }
        $id_Slider = $_POST['idSlider'];
        
        $datos = array(
            "idSlider" => $id_Slider,
            "estado_slider" => $activo
        );
        

        $respuesta = $sliderController->activarSlider($datos);

        if ($respuesta['state'] === true) {
            echo 'exito';

            echo "<pre>";
            print_r($_POST);
            print_r($_FILES);
            print_r($respuesta['resultado']);
            echo "</pre>";

            header("Location: /Literagiando/Views/SliderAdmin/index.php");
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
        NuevoSlider();
        break;
    
    case 'editar':
        $idsliders = isset($_POST['idsliders']) ? $_POST['idsliders'] : null;
        EditarSlider($idsliders);
        break;
    
    case 'eliminar':
        $idslider = isset($_GET['idslider']) ? $_GET['idslider'] : null;
        EliminarSlider($idslider);
        break;

    case 'activarSlider':
        echo activarSlider();
        break;    

    default:
        echo "Acción no válida";
        break;
}
?>

