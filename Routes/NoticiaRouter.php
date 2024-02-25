<?php
require_once(__DIR__ . '/../App/Controllers/NoticiaController.php');

function EliminarNoticia($idnoticias) {
    if ($idnoticias === null) {
        echo "ID de noticia no proporcionado";
        return;
    }

    $noticiaController = new NoticiaController();

    $respuesta = $noticiaController->EliminarNoticiaController($idnoticias);

    if ($respuesta['state'] == true) {
        echo "Registro Eliminado";
        header("Location: /Literagiando/Views/NoticiasAdmin/index.php");
        exit;
    } else {
        echo "Error al eliminar el registro";
    }
}

function EditarNoticia($idnoticias) {
    if (
        $idnoticias !== null &&
        isset($_POST['titulo_noticia']) &&
        isset($_POST['subtitulo_noticias']) &&
        isset($_POST['idusuario']) &&
        isset($_POST['detalle_noticias']) &&
        isset($_POST['idtiponoticia'])
    ) {
        // Validar y filtrar datos según sea necesario

        $noticiaController = new NoticiaController();

        $datos = array(
            "idNoticias" => $idnoticias,
            "titulo_Noticia" => $_POST['titulo_noticia'],
            "subtitulo_noticias" => $_POST['subtitulo_noticias'],
            "idusuario" => $_POST['idusuario'],
            "detalle_Noticia" => $_POST['detalle_noticias'],
            "idtipo_Noticia" => $_POST['idtiponoticia']
        );

        $respuesta = $noticiaController->EditarNoticiaController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Editado";
            echo "<pre>";
            print_r($respuesta['resultado']);
            print_r($_POST);
            echo "</pre>";
            //header("Location: /Literagiando/Views/NoticiasAdmin/index.php");
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

function NuevoNoticia() {
    if (
        isset($_POST['titulo_Noticia']) &&
        isset($_POST['subtitulo_noticias']) &&
        isset($_POST['idusuario']) &&
        isset($_POST['detalle_Noticia']) &&
        isset($_POST['idtipo_Noticia'])
    ) {
        // Validar y filtrar datos según sea necesario

        $noticiaController = new NoticiaController();

        $datos = array(
            "titulo_Noticia" => $_POST['titulo_Noticia'],
            "detalle_Noticia" => $_POST['detalle_Noticia'],
            "idtipo_Noticia" => $_POST['idtipo_Noticia'],
            "subtitulo_noticias" => $_POST['subtitulo_noticias'],
            "idusuario" => $_POST['idusuario']
        );

        $respuesta = $noticiaController->NuevoNoticiaController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Guardado";
            echo "<pre>";
            print_r($_POST);
            print_r($_FILES);
            print_r($respuesta['resultado']);
            echo "</pre>";
        
            header("Location: /Literagiando/Views/NoticiasAdmin/index.php");
            exit;
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}
function activarNoticia()
{
    $noticiaController = new NoticiaController();

    if(
        isset($_POST['estado_noticia']) &&
        isset($_POST['idNoticia'])
    ){
        $activo = $_POST['estado_noticia'];
        //echo "<script>console.log('$activo');</script>";
        if ($activo === 'Activo') {
            $activo = 'Inactivo';
        } else {
            $activo ='Activo';
        }
        $id_Noticia = $_POST['idNoticia'];
        
        $datos = array(
            "idNoticia" => $id_Noticia,
            "estado_noticia" => $activo
        );
        

        $respuesta = $noticiaController->activarNoticia($datos);

        if ($respuesta['state'] === true) {
            echo 'exito';
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
        NuevoNoticia();
        break;
    
    case 'editar':
        $idnoticias = isset($_POST['idnoticias']) ? $_POST['idnoticias'] : null;
        EditarNoticia($idnoticias);
        break;
    
    case 'eliminar':
        $idnoticias = isset($_POST['idnoticias']) ? $_POST['idnoticias'] : null;
        EliminarNoticia($idnoticias);
        break;

    case 'activarNoticia':
        activarNoticia();
        break;

    default:
        echo "Acción no válida" ;
        echo $accion;
        break;
}
?>

