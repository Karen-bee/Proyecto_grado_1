<?php


require_once (__DIR__ .'/../Models/HomeModel.php');


class HomeController extends HomeModel{

    private $eventModel;
    private $respuesta;

    public function __construct()
    {
        $this->eventModel = new HomeModel();
    }

    public function ObtenerSobre_nosotrosController()
    {
        try{
            $resultados = $this->eventModel->ObtenerSobre_nosotros();
            $this->respuesta = array(
                "state" => true,
                "sobre_nosotros" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function ObtenerObjetivosController()
    {
        try{
            $resultados = $this->eventModel->ObtenerObjetivos();
            $this->respuesta = array(
                "state" => true,
                "sobre_nosotros" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function ObtenerServiciosController()
    {
        try{
            $resultados = $this->eventModel->ObteneServicios();
            $this->respuesta = array(
                "state" => true,
                "sobre_nosotros" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function ObtenerGenerosController()
    {
        try{
            $resultados = $this->eventModel->ObtenerGeneros();
            $this->respuesta = array(
                "state" => true,
                "sobre_nosotros" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function ObtenerProfesoresController()
    {
        try{
            $resultados = $this->eventModel->ObtenerProfesores();
            $this->respuesta = array(
                "state" => true,
                "sobre_nosotros" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function NuevaPersona($datos){
        try {
            $resultados = $this->eventModel->NuevoSobre_nosotros($datos);
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
    public function NuevaFila($datos){
        try {
            $resultados = $this->eventModel->NuevaFilaModel($datos);
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
    public function borrarFila($datos){
        try {
            $resultados = $this->eventModel->borrarFilaModel($datos);
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

    public function ObtenerIdSobre_nosotrosController($idsobre_nosotros){
        try {
            $resultados = $this->eventModel->ObtenerSobre_nosotrosPorIdModel($idsobre_nosotros);
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

    public function EditarSobre_nosotrosController($datos){
        try {
            $resultados = $this->eventModel->ModificarSobre_nosotros($datos);
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

    public function editarSobreNosotros($datos){
        try {
            $resultados = $this->eventModel->editarSobreNosotros($datos);
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

    public function EliminarPersona($idsobre_nosotros){
        try {
            $resultados = $this->eventModel->EliminarSobre_nosotros($idsobre_nosotros);
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
            $resultados = $this->eventModel->SelectTipoSobre_nosotros();
            $this->respuesta = array(
                "tiposobre_nosotros" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function activarSobre_nosotros($datos){
        try {
            $resultados = $this->eventModel->activarSobre_nosotros($datos);
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