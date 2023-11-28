<?php

    require_once __DIR__ . '/../App/Controllers/SliderHomeController.php';

    $accion = $_POST['accion'];

    switch ($accion) {
        case 'nuevo':
            echo NuevaNota();        
            break;
        default:
            break;
    }


    function NuevaNota()
    {
        $sliderController = new SliderHomeController();

        if(isset($_POST['autor'])
            && isset($_POST['titulo'])
            && isset($_POST['descripcion'])){

            //creamos arreglo de datos
            $datos = array(
                "autor" => $_POST['autor'],
                "titulo" => $_POST['titulo'],
                "descripcion" => $_POST['descripcion']
            );

            $respuesta = $sliderController->NuevoSliderController($datos);
           
            if($respuesta['state']==true){
                header("Location: /Views/SliderAdmin/index.php");
            }          

        }
    }

?>