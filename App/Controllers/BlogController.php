<?php


require_once (__DIR__ .'/../Models/BlogModel.php');


class BlogController extends BlogModel{

    private $eventModel;
    private $respuesta;

    public function __construct()
    {
        $this->eventModel = new BlogModel();
    }

    public function ObtenerBlogsController()
    {
        try{
            $resultados = $this->eventModel->ObtenerBlogsActivosModel();
            $this->respuesta = array(
                "state" => true,
                "blogs" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }
    public function ObtenerAllBlogsController()
    {
        try{
            $resultados = $this->eventModel->ObtenerBlogModel();
            $this->respuesta = array(
                "state" => true,
                "blogs" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function NuevoBlogController($datos){
        try {
            $resultados = $this->eventModel->NuevoBlogModel($datos);
            $this->respuesta = array(
                "state" => true,
                "resultado" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function ObtenerIdBlogController($idBlog){
        try {
            $resultados = $this->eventModel->ObtenerBlogPorIdModel($idBlog);
            $this->respuesta = array(
                "state" => true,
                "resultado" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
    
        return $this->respuesta;
    }

    public function ObtenerUltimaBlogController(){
        try {
            $resultados = $this->eventModel->ObtenerUltimoBlogModel();
            if($resultados){
                $this->respuesta = array(
                    "state" => true,
                    "resultado" => $resultados
                );
            }else{
                $this->respuesta = array(
                    "state" => false,
                    "mensaje" => $resultados . " Vacio"
                );
            }
            
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
    
        return $this->respuesta;
    }

    public function EditarBlogController($datos){
        try {
            $resultados = $this->eventModel->ModificarBlogModel($datos);
            $this->respuesta = array(
                "state" => true,
                "resultado" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function EliminarBlogController($idBlog){
        try {
            $resultados = $this->eventModel->EliminarBlogModel($idBlog);
            $this->respuesta = array(
                "state" => true,
                "resultado" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }


    public function ObtenerSelectBlogController(){
        try {
            $resultados = $this->eventModel->SelectTipoBlog();
            $this->respuesta = array(
                "tipoBlogs" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function activarBlog($datos){
        try {
            $resultados = $this->eventModel->activarBlogModel($datos);
            $this->respuesta = array(
                "state" => true,
                "resultado" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

 


}

?>