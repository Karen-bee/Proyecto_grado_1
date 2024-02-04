<?php


require_once (__DIR__ .'/../Models/SliderModel.php');


class SliderController extends SliderModel{

    private $eventModel;
    private $respuesta;

    public function __construct()
    {
        $this->eventModel = new SliderModel();
    }

    public function ObtenerSlidersController()
    {
        try{
            $resultados = $this->eventModel->ObtenerSliderModel();
            $this->respuesta = array(
                "state" => true,
                "sliders" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }
    public function ObtenerAllSlidersController()
    {
        try{
            $resultados = $this->eventModel->ObtenerAllSliderModel();
            $this->respuesta = array(
                "state" => true,
                "sliders" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function NuevoSliderController(){
        try {
            $resultados = $this->eventModel->NuevoSliderModel();
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

    public function ObtenerIdSliderController($idsliders){
        try {
            $resultados = $this->eventModel->ObtenerSliderPorIdModel($idsliders);
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

    public function EditarSliderController($datos){
        try {
            $resultados = $this->eventModel->ModificarSliderModel($datos);
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

    public function EliminarSliderController($idsliders){
        try {
            $resultados = $this->eventModel->EliminarSliderModel($idsliders);
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
            $resultados = $this->eventModel->SelectTipoSlider();
            $this->respuesta = array(
                "tiposliders" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function activarSlider($datos){
        try {
            $resultados = $this->eventModel->activarSliderModel($datos);
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