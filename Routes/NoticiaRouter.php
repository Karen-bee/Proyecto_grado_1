<?php
require_once (__DIR__ .'./../App/Controllers/NoticiaController.php');


$accion = $_POST['accion'];

switch ($accion) {
    case 'nuevo':
        echo NuevaNoticia();
        break;
    
    case 'editar':
        $idnoticias = $_POST['idnoticias'];
        echo EditarNoticia($idnoticias);
        break;
    
    case 'eliminar': // Add this case for the 'eliminar' action
        $idnoticias = $_POST['idnoticias'];
        echo EliminarNoticia($idnoticias);
        break;

    default:
        break;
}

function EliminarNoticia($idnoticias) {
    $noticiaController = new NoticiaController();

    $respuesta = $noticiaController->EliminarNoticiaController($idnoticias);

    if($respuesta['resultado']==true){
        echo "Registro Eliminado";
        header("Location: ./../Views/NoticiasAdmin/index.php");
    }else{
        echo "Error";
    } 
}

function EditarNoticia($idnoticias)
{
    $noticiaController = new NoticiaController();

    if(isset($_POST['titulo_noticias'])
        && isset($_POST['subtitulo_noticias'])
        && isset($_POST['detalle_noticias'])
        && isset($_POST['idusuario'])
        && isset($_POST['idtiponoticia'])){
        //creamos arreglo de datos
        $datos = array(
            "ideventos" => $idnoticias,
            "titulo_noticias" => $_POST['titulo_noticias'],
            "subtitulo_noticias" => $_POST['subtitulo_noticias'],
            "detalle_noticias" => $_POST['detalle_noticias'],
            "idusuario" => $_POST['idusuario'],


        );

        $respuesta = $noticiaController->EditarNoticiaController($datos);
        
       
        if($respuesta['state']==true){
            echo "Registro Editado";
            header("Location: ./../Views/NoticiasAdmin/index.php");
        }else{
            echo "Error";
        }          

    }
    
}

function NuevaNoticia()
{
    $noticiaController = new NoticiaController();

    if(isset($_POST['titulo_noticias'])
        && isset($_POST['subtitulo_noticias'])
        && isset($_POST['detalle_noticias'])
        && isset($_POST['idusuario'])
        && isset($_POST['idtiponoticia'])){

        //creamos arreglo de datos
        $datos = array(
            "titulo_noticias" => $_POST['titulo_noticias'],
            "subtitulo_noticias" => $_POST['subtitulo_noticias'],
            "detalle_noticias" => $_POST['detalle_noticias'],
            "idusuario" => $_POST['idusuario'],
            "idtiponoticia" => $_POST['idtiponoticia']


        );

        $respuesta = $noticiaController->NuevaNoticiaController($datos);
        
       
        if($respuesta['state']==true){
            echo "Registro Guardado";
            header("Location: ./../Views/NoticiasAdmin/index.php");
        }else{
            echo "Error";
        }          

    }

}

?>