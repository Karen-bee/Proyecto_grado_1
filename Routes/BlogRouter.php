<?php
require_once(__DIR__ . '/../App/Controllers/BlogController.php');

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

switch ($accion) {
    case 'nuevo':
        echo NuevoBlog();
        break;
    
    case 'activarBlog':
        echo activarBlog();
        break;

    case 'eliminar':
        $idblog = isset($_POST['idblog']) ? $_POST['idblog'] : null;
        EliminarBlog($idblog);
        break;

    case 'editar':
        $idblog = isset($_POST['idblog']) ? $_POST['idblog'] : null;
        EditarBlog($idblog);
        break;

    default:
        echo "Acción no válida";
        break;
}


function EliminarBlog($idblog) {
    if ($idblog === null) {
        echo "ID de blog no proporcionado";
        return;
    }

    $blogController = new BlogController();

    $respuesta = $blogController->EliminarBlogController($idblog);

    if ($respuesta['state'] == true) {
        echo "Registro Eliminado";
        header("Location: /Literagiando/Views/BlogAdmin/index.php");
        exit;
    } else {
        echo "Error al eliminar el registro";
    }
}

function EditarBlog($idblog) {
    if (
        $idblog !== null &&
        isset($_POST['titulo_blog']) &&
        isset($_POST['subtitulo_blog']) &&
        isset($_POST['id_usuario']) &&
        isset($_POST['detalle_blog']) &&
        isset($_POST['idtipoblog'])
    ) {
        // Validar y filtrar datos según sea necesario

        $blogController = new BlogController();

        $datos = array(
            "idBlog" => $idblog,
            "titulo_Blog" => $_POST['titulo_blog'],
            "subtitulo_blog" => $_POST['subtitulo_blog'],
            "id_usuario" => $_POST['id_usuario'],
            "detalle_Blog" => $_POST['detalle_blog'],
            "idtipo_Blog" => $_POST['idtipoblog']
        );

        $respuesta = $blogController->EditarBlogController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Editado";
            echo "<pre>";
            print_r($_POST);
            print_r($respuesta['resultado']);
            echo "</pre>";
            //header("Location: /Literagiando/Views/BlogAdmin/index.php");
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

function NuevoBlog()
{
    $blogController = new BlogController();

    if (
        isset($_POST['titulo_blog']) &&
        isset($_POST['subtitulo_blog']) &&
        isset($_POST['detalle_Blog']) &&
        isset($_POST['id_usuario']) &&
        isset($_POST['idtipo_blog'])
    ) {
        //creamos arreglo de datos
        $datos = array(
            "titulo_blog" => $_POST['titulo_blog'],
            "subtitulo_blog" => $_POST['subtitulo_blog'],
            "detalle_blog" => $_POST['detalle_Blog'],
            "id_usuario" => $_POST['id_usuario'],
            "idtipo_blog" => $_POST['idtipo_blog']
        );

        $respuesta = $blogController->NuevoBlogController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Guardado";

            echo "<pre>";
            print_r($respuesta['resultado']);
            print_r($_POST);
            echo "</pre>";
            header("Location: /Literagiando/Views/BlogAdmin/index.php");
            exit; // Add exit after header to stop script execution
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
        echo "<pre>";
        //print_r($respuesta['resultado']);
        print_r($_POST);
        echo "</pre>";
    }
}
function activarBlog()
{
    $blogController = new BlogController();

    if(
        isset($_POST['estado_blog']) &&
        isset($_POST['idBlog'])
    ){
        $activo = $_POST['estado_blog'];
        //echo "<script>console.log('$activo');</script>";
        if ($activo === 'Activo') {
            $activo = 'Inactivo';
        } else {
            $activo ='Activo';
        }
        $id_BLog = $_POST['idBlog'];
        
        $datos = array(
            "idBlog" => $id_BLog,
            "estado_blog" => $activo
        );
        

        $respuesta = $blogController->activarBlog($datos);

        if ($respuesta['state'] === true) {
            echo 'exito';
            header("Location: /Literagiando/Views/BlogAdmin/index.php");
            exit; 
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
    }
}
?>