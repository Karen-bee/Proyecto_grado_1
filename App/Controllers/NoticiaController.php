<?php


require_once (__DIR__ .'/../Models/NoticiaModel.php');


class NoticiaController extends NoticiaModel{

    private $eventModel;
    private $respuesta;

    public function __construct()
    {
        $this->eventModel = new NoticiaModel();
    }

    public function ObtenerNoticiasController()
    {
        try{
            $resultados = $this->eventModel->ObtenerNoticiasActivasModel();
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
    public function ObtenerTodasNoticiasController()
    {
        try{
            $resultados = $this->eventModel->ObtenerNoticiasModel();
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

    public function NuevoNoticiaController($datos){
        try {
            $resultados = $this->eventModel->NuevoNoticiaModel($datos);
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

    public function ObtenerIdNoticiaController($idNoticias){
        try {
            $resultados = $this->eventModel->ObtenerNoticiaPorIdModel($idNoticias);
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

    public function ObtenerUltimaNoticiaController(){
        try {
            $resultados = $this->eventModel->ObtenerUltimaNoticiaModel();
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

    public function EditarNoticiaController($datos){
        try {
            $resultados = $this->eventModel->ModificarNoticiaModel($datos);
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

    public function EliminarNoticiaController($idNoticias){
        try {
            $resultados = $this->eventModel->EliminarNoticiaModel($idNoticias);
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
            $resultados = $this->eventModel->SelectTipoNoticia();
            $this->respuesta = array(
                "tipoNoticias" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function activarNoticia($datos){
        try {
            $resultados = $this->eventModel->activarNoticiaModel($datos);
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