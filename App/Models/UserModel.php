<?php

require_once (__DIR__ .'./../Models/Database.php');

class UserModel{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerUserModel(){
        $consulta = "SELECT * FROM usuario";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    


    public function ObtenerUserIdModel($iduser){
        $consulta = "SELECT * FROM usuario WHERE idusuario = ?";
        $parametros = array(
            "prm_iduser"=>$iduser
        );

        $respuesta = $this->conexion->EjecutarSPSinParams($consulta, $parametros);
        return $respuesta;

    }

    public function NuevoUserModel($datos){
        $hashedPassword = password_hash($datos['password'], PASSWORD_BCRYPT);
        $consulta = "INSERT INTO usuario(documento_usuario, nombrecompleto_usuario, direccion_usuario, telefono_usuario, username, correo_usuario, password, idtipodedocumento) 
                    VALUES (:prm_documento_usuario, :prm_nombrecompleto_usuario, :prm_direccion_usuario, :prm_telefono_usuario, :prm_username, :prm_correo_usuario, :prm_password, :prm_idtipodedocumento)";
        $parametros = array(
            "prm_documento_usuario" => $datos['documento_usuario'],
            "prm_nombrecompleto_usuario" => $datos['nombrecompleto_usuario'],
            "prm_direccion_usuario" => $datos['direccion_usuario'],
            "prm_telefono_usuario" => $datos['telefono_usuario'],
            "prm_username" => $datos['username'],
            "prm_correo_usuario" => $datos['correo_usuario'],
            "prm_password" => $hashedPassword,
            "prm_idtipodedocumento" => $datos['idtipodedocumento']


        );
    
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }


    
    public function ModificarUserModel($datos, $idusuario){
        if (!empty($datos['password'])) {
            $hashedPassword = password_hash($datos['password'], PASSWORD_BCRYPT);
        } else {
            $hashedPassword = $datos['password_actual'];   
        }
        
        $consulta = "UPDATE usuario 
            SET documento_usuario = :prm_documento_usuario, nombrecompleto_usuario = :prm_nombrecompleto_usuario, direccion_usuario = :prm_direccion_usuario,
                telefono_usuario = :prm_telefono_usuario, username = :prm_username, correo_usuario = :prm_correo_usuario,
                password = :prm_password, idtipodedocumento = :prm_idtipodedocumento
            WHERE idusuario = :prm_idusuario";
    
        $parametros = array(
            "prm_documento_usuario" => $datos['documento_usuario'],
            "prm_nombrecompleto_usuario" => $datos['nombrecompleto_usuario'],
            "prm_direccion_usuario" => $datos['direccion_usuario'],
            "prm_telefono_usuario" => $datos['telefono_usuario'],
            "prm_username" => $datos['username'],
            "prm_correo_usuario" => $datos['correo_usuario'],
            "prm_password" => $hashedPassword,
            "prm_idtipodedocumento" => $datos['idtipodedocumento'],
            "prm_idusuario" => $idusuario
        );
    
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }
    
    
    
    public function SelectTipoDocumento(){
        $consulta ="SELECT idtipodocumento, nombre_documento FROM tipodocumento";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    

    
}


?>