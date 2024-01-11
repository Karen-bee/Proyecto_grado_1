<?php

require_once (__DIR__.'./../Models/Database.php');

class RoleModel {
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerRoleModel(){
        $consulta = "SELECT * FROM roles";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerRolPorIdModel($idrol){
        $consulta = "SELECT * FROM roles WHERE idrol = :prm_idrol";
        $parametros = array(
            "prm_idrol" =>$idrol
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }

    public function EditarRolModel($datos) {
        // Validar y limpiar datos
        $idrol = (int) $datos['idrol'];
        $nombreRol = htmlspecialchars($datos['nombre_rol'], ENT_QUOTES, 'UTF-8');
    
        // Preparar la consulta
        $consulta = "UPDATE roles SET nombre_rol = :prm_nombre_rol WHERE idrol = :prm_idrol";
    
        // Parámetros
        $parametros = array(
            "prm_idrol" => $idrol,
            "prm_nombre_rol" => $nombreRol
        );
    
        // Intentar ejecutar la consulta
        try {
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
    
            if ($respuesta === false) {
                // Manejar el error, por ejemplo, lanzar una excepción o devolver un código de error.
                throw new Exception("Error al actualizar el rol.");
            }
    
            // Todo ha ido bien
            return true;
        } catch (Exception $e) {
            // Manejar la excepción, por ejemplo, loggear el error.
            error_log('Error al actualizar el rol: ' . $e->getMessage());
            return false;
        }
    }
    

}

?>