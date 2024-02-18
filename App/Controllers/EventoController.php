<?php


require_once (__DIR__ .'/../Models/EventoModel.php');


class EventoController extends EventoModel{

    private $eventModel;
    private $respuesta;

    public function __construct()
    {
        $this->eventModel = new EventoModel();
    }

    public function ObtenerEventosController()
    {
        try{
            $resultados = $this->eventModel->ObtenerEventoActivoModel();
            $this->respuesta = array(
                "state" => true,
                "eventos" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }
    public function ObtenerTodosEventosController()
    {
        try{
            $resultados = $this->eventModel->ObtenerEventoModel();
            $this->respuesta = array(
                "state" => true,
                "eventos" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function ObtenerMisEventosController($datos)
    {
        try{
            $resultados = $this->eventModel->ObtenerMisEventosModel($datos);
            $this->respuesta = array(
                "state" => true,
                "eventos" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function NuevoEventoController($datos){
        try {
            $resultados = $this->eventModel->NuevoEventoModel($datos);
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

    public function ObtenerIdEventoController($ideventos){
        try {
            $resultados = $this->eventModel->ObtenerEventoPorIdModel($ideventos);
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

    public function EditarEventoController($datos){
        try {
            $resultados = $this->eventModel->ModificarEventoModel($datos);
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

    public function EliminarEventoController($ideventos){
        try {
            $resultados = $this->eventModel->EliminarEventoModel($ideventos);
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


    public function ObtenerSelectEventController(){
        try {
            $resultados = $this->eventModel->SelectTipoEvento();
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

    public function activarEvento($datos){
        try {
            $resultados = $this->eventModel->activarEventoModel($datos);
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