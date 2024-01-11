<?php

require_once (__DIR__.'./../../Models/RoleModel.php');

class RoleController {
    private $roleModel;
    private $respuesta;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }

    public function ObtenerRoleController()
    {
        try{
            $resultados = $this->roleModel->ObtenerRoleModel();
            $this->respuesta = array(
                "state" => true,
                "roles" => $resultados
            );
        }catch (PDOException $pdoEx){
            $this->respuesta = array (
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }
        return $this->respuesta;
    }

    public function ObtenerIdRolController($idrol){
        try {
            $resultados = $this->roleModel->ObtenerRolPorIdModel($idrol);
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

    public function EditarRolController($datos) {
        try {
            $resultados = $this->roleModel->EditarRolModel($datos);
    
            if ($resultados) {
                // Registro actualizado con éxito, redirige al índice
                header("Location: index.php");
                exit();
            } else {
                $this->respuesta = array(
                    "state" => false,
                    "mensaje" => "Error al actualizar el registro."
                );
            }
        } catch (Exception $ex) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $ex->getMessage()
            );
        }
    
        return $this->respuesta;
    }
    
}

?>