<?php

require_once (__DIR__.'./../Models/Database.php');

class PermisosModel{
    private $conexion;
    
    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerPermisoModel(){
        $consulta = "SELECT * FROM permisos";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    
        
    
}

?>