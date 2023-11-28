<?php
require_once (__DIR__ .'./../App/Controllers/BlogController.php');

$accion = $_POST['accion'];

switch($accion){
    case 'nuevo':
        echo NuevoBlog();
        break;
    case 'editar':
        $idblog = $_POST['idblog'];
        echo EditarBlog($idblog);
        break;
    case 'eliminar':
        $idblog = $_POST['idblog'];
        echo EliminarBlog($idblog);
        break;
    default:
        break;
    }

    function EliminarBlog($idblog){
        $blogController = new BlogController();

        $respuesta = $blogController->EliminarBlogController($idblog);

        if($respuesta['resultado']==true){
            echo "Registro Eliminado";
            header("Location: ./../Views/BlogAdmin/index.php");
        }else{
            echo "Error";
        }
    }

    function EditarBlog($idblog){
        $blogController = new BlogController();

        if(isset($_POST['titulo_blog'])
            && isset($_POST['subtitulo_blog'])
            && isset($_POST['idtipo_blog'])
            && isset($_POST['detalle_blog'])){

            $datos = array(
                "idblog" => $idblog,
                "titulo_blog" => $_POST['titulo_blog'],
                "subtitulo_blog" => $_POST['subtitulo_blog'],
                "idtipo_blog" => $_POST['idtipo_blog'],
                "detalle_blog" => $_POST['detalle_blog']
            );

            $respuesta = $blogController->EditarBlogController($datos);

            if($respuesta['state']==true){
                echo "Registro Editado";
                header("Location: ./../Views/BlogAdmin/index.php");
            }else{
                echo "Error";
            }
            }
    }

    function NuevoBlog(){
        $blogController = new BlogController();

        if(isset($_POST['titulo_blog'])
        && isset($_POST['subtitulo_blog'])
        && isset($_POST['idtipo_blog'])
        && isset($_POST['detalle_blog'])){

        $datos = array(
            "titulo_blog" => $_POST['titulo_blog'],
            "subtitulo_blog" => $_POST['subtitulo_blog'],
            "idtipo_blog" => $_POST['idtipo_blog'],
            "detalle_blog" => $_POST['detalle_blog']
        );

        $respuesta = $blogController->NuevoBlogController($datos);

        if($respuesta['state']==true){
            echo "Registro Guardado";
            header("Location: ./../Views/BlogAdmin/idex.php");

        }else{
            echo "Error";
        }
    }
    }
?>