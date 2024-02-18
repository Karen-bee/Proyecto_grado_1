<?php

require_once (__DIR__.'/../../Models/PermisosModel.php');

class PermisosController extends PermisosModel {
    private $permisoModel;
    private $respuesta;

    public function __construct()
    {
        $this->permisoModel = new PermisosModel();
    }

    public function ObtenerPermisoController()
    {
        try{
            $resultados = $this->permisoModel->ObtenerPermisoModel();
            $this->respuesta = array(
                "state" => true,
                "permisos" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function ActualizarPermisosController($datos)
    {
        try{
            $resultados = $this->permisoModel->ActualizarPermisosModel($datos);
            $this->respuesta = array(
                "state" => true,
                "permisos" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function AgregarPermisosController($datos)
    {
        try{
            $resultados = $this->permisoModel->AgregarPermisosModel($datos);
            $this->respuesta = array(
                "state" => true,
                "permisos" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }
}

?>