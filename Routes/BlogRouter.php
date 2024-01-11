<?php
require_once(__DIR__ . '/../App/Controllers/BlogController.php');

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

switch ($accion) {
    case 'nuevo':
        echo NuevoBlog();
        break;
    

    default:
        echo "Acción no válida";
        break;
}


function NuevoBlog()
{
    $blogController = new BlogController();

    if (
        isset($_POST['titulo_blog']) &&
        isset($_POST['subtitulo_blog']) &&
        isset($_POST['detalle_blog']) &&
        isset($_POST['id_usuario']) &&
        isset($_POST['idtipo_blog'])
    ) {
        //creamos arreglo de datos
        $datos = array(
            "titulo_blog" => $_POST['titulo_blog'],
            "subtitulo_blog" => $_POST['subtitulo_blog'],
            "detalle_blog" => $_POST['detalle_blog'],
            "id_usuario" => $_POST['id_usuario '],
            "idtipo_blog" => $_POST['idtipo_blog']
        );

        $respuesta = $blogController->NuevoBlogController($datos);

        if ($respuesta['state'] == true) {
            echo "Registro Guardado";
            header("Location: ./../Views/BlogAdmin/index.php");
            exit; // Add exit after header to stop script execution
        } else {
            echo "Error al guardar el registro";
        }
    } else {
        echo "Datos incompletos para guardar el registro";
    }
}
?>