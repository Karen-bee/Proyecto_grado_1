<?php

require_once (__DIR__ .'./../Models/BlogModel.php');

class BlogController extends BlogModel{

    private $blogModel;
    private $respuesta;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    public function ObtenerBlogController()
    {
        try{
            $resultados = $this->blogModel->ObtenerBlogModel();
            $this->respuesta =array(
                "state" => true,
                "blog" => $resultados
            );
        }catch(PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function NuevoBlogController($datos){
        try {
            $resultados = $this->blogModel->ObtenerBlogPorIdModel($datos);
            $this->respuesta = array(
                "state" => true,
                "resultado" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function EditarBlogController($datos){
        try{
            $resultados = $this->blogModel->ModificarBlogModel($datos);
            $this->respuesta = array(
                "state" => true,
                "resultado" => $resultados
            );
        }catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;

    }

    public function EliminarBlogController($idblog){
        try {
            $resultados = $this->blogModel->EliminarBlogModel($idblog);
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
        try{
            $resultados = $this->blogModel->SelectTipoBlog();
            $this->respuesta = array(
                "tipoeventos" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }
}
?>