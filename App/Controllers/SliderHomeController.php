<?php

    require_once __DIR__ . '/../Models/SliderModel.php';

    class SliderHomeController{

        private $sliderModel;
        private $respuesta;

        public function __construct(){
            $this->sliderModel = new SliderModel();
        }

        public function ObtenerSliderController()
        {
            try {
                $resultados = $this->sliderModel->ObtenerSliderModel();
                $this->respuesta = array(
                    "sliders" => $resultados
                );
            } catch (PDOException $pdoEx) {
                $this->respuesta = array(
                    "mensaje" => $pdoEx->getMessage()
                );
            }

            return $this->respuesta;
        }

        public function NuevoSliderController($datos)
        {
            try {
                $resultados = $this->sliderModel->NuevoSliderModel($datos);
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

        public function EliminarSliderModel($id)
        {
            try{
                $resultados = $this->sliderModel->EliminarSliderModel($id);
                $this->respuesta = array(
                    "sliders" => $resultados
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


