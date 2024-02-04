<?php

require_once (__DIR__.'/../Models/Database.php');

class PermisosModel{
    private $conexion;
    
    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerPermisoModel(){
        $consulta = "SELECT * FROM roles_permisos";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    
    public function ActualizarPermisosModel($datos){
        $idrol = (int) $datos['idrol'];
        $id_pagina = (int) $datos['id_pagina'];
        $consulta = "DELETE FROM roles_permisos WHERE `idrol` = :idrol AND `id_pagina` = :id_pagina";
        $parametros = array(
            "idrol" => $idrol,
            "id_pagina" => $id_pagina
        );
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }

    public function AgregarPermisosModel($datos){
        $idrol = (int) $datos['idrol'];
        $id_pagina = (int) $datos['id_pagina'];
        $consulta = "INSERT INTO roles_permisos VALUES( :idrol , :id_pagina)";
        $parametros = array(
            "idrol" => $idrol,
            "id_pagina" => $id_pagina
        );
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }
        
    
}

?>