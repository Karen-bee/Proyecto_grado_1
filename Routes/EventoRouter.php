<?php
require_once (__DIR__ .'./../App/Controllers/EventoController.php');


$accion = $_POST['accion'];

switch ($accion) {
    case 'nuevo':
        echo NuevoEvento();
        break;
    
    case 'editar':
        $ideventos = $_POST['ideventos'];
        echo EditarEvento($ideventos);
        break;
    
    case 'eliminar': // Add this case for the 'eliminar' action
        $ideventos = $_POST['ideventos'];
        echo EliminarEvento($ideventos);
        break;

    default:
        break;
}

function EliminarEvento($ideventos) {
    $eventoController = new EventoController();

    $respuesta = $eventoController->EliminarEventoController($ideventos);

    if($respuesta['resultado']==true){
        echo "Registro Eliminado";
        header("Location: ./../Views/EventosAdmin/index.php");
    }else{
        echo "Error";
    } 
}

function EditarEvento($ideventos)
{
    $eventoController = new EventoController();

    if(isset($_POST['titulo_evento'])
        && isset($_POST['detalle_evento'])
        && isset($_POST['idtipo_evento'])){

        //creamos arreglo de datos
        $datos = array(
            "ideventos" => $ideventos,
            "titulo_evento" => $_POST['titulo_evento'],
            "detalle_evento" => $_POST['detalle_evento'],
            "idtipo_evento" => $_POST['idtipo_evento']


        );

        $respuesta = $eventoController->EditarEventoController($datos);
        
       
        if($respuesta['state']==true){
            echo "Registro Editado";
            header("Location: ./../Views/EventosAdmin/index.php");
        }else{
            echo "Error";
        }          

    }
    
}

function NuevoEvento()
{
    $eventoController = new EventoController();

    if(isset($_POST['titulo_evento'])
        && isset($_POST['detalle_evento'])
        && isset($_POST['idtipo_evento'])){

        //creamos arreglo de datos
        $datos = array(
            "titulo_evento" => $_POST['titulo_evento'],
            "detalle_evento" => $_POST['detalle_evento'],
            "idtipo_evento" => $_POST['idtipo_evento']


        );

        $respuesta = $eventoController->NuevoEventoController($datos);
        
       
        if($respuesta['state']==true){
            echo "Registro Guardado";
            header("Location: ./../Views/EventosAdmin/index.php");
        }else{
            echo "Error";
        }          

    }

}

?>