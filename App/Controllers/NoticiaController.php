<?php


require_once (__DIR__ .'./../Models/NoticiaModel.php');


class NoticiaController extends NoticiaModel{

    private $noticiaModel;
    private $respuesta;

    public function __construct()
    {
        $this->noticiaModel = new NoticiaModel();
    }

    public function ObtenerNoticiaController()
    {
        try{
            $resultados = $this->noticiaModel->ObtenerNoticiaModel();
            $this->respuesta = array(
                "state" => true,
                "noticias" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function NuevaNoticiaController($datos){
        try {
            $resultados = $this->noticiaModel->NuevaNoticiaModel($datos);
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

    public function ObtenerIdNoticiaController($ideventos){
        try {
            $resultados = $this->noticiaModel->ObtenerNoticiaPorIdModel($ideventos);
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

    public function EditarNoticiaController($datos){
        try {
            $resultados = $this->noticiaModel->ModificarNoticiaModel($datos);
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

    public function EliminarNoticiaController($ideventos){
        try {
            $resultados = $this->noticiaModel->EliminarNoticiaModel($ideventos);
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


    public function ObtenerSelectNoticiaController(){
        try {
            $resultados = $this->noticiaModel->SelectTipoNoticia();
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