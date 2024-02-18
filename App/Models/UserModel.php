<?php

require_once (__DIR__ .'/../Models/Database.php');

class UserModel{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerUserModel(){
        $consulta = "SELECT * FROM usuario WHERE  estado=1";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerAllUserModel(){
        $consulta = "SELECT * FROM usuario JOIN tipodocumento ON tipodocumento.idtipodocumento = usuario.idtipodedocumento JOIN roles ON roles.idrol = usuario.idrolusuario";
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


    
    public function ModificarUserModel($datos){

        if (!empty($datos['foto_usuario'])) {
            $consulta = "UPDATE usuario 
            SET foto_usuario = :prm_foto_usuario
            WHERE idusuario = :prm_idusuario";
            $parametros = array(
                "prm_foto_usuario" => $datos['foto_usuario'],
                "prm_idusuario" => $datos['idusuario']
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } 
        


        if (!empty($datos['password'])) {
            $hashedPassword = password_hash($datos['password'], PASSWORD_BCRYPT);
        }
        
        

        if (!empty($datos['idtipodedocumento'])) {
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
                "prm_idusuario" => $datos['idusuario']
            );
        } else if(!empty($datos['documento_usuario'])){
            $consulta = "UPDATE usuario 
            SET documento_usuario = :prm_documento_usuario, nombrecompleto_usuario = :prm_nombrecompleto_usuario, direccion_usuario = :prm_direccion_usuario,
                telefono_usuario = :prm_telefono_usuario, correo_usuario = :prm_correo_usuario, username = :prm_username
            WHERE idusuario = :prm_idusuario";
    
            $parametros = array(
                "prm_documento_usuario" => $datos['documento_usuario'],
                "prm_nombrecompleto_usuario" => $datos['nombrecompleto_usuario'],
                "prm_direccion_usuario" => $datos['direccion_usuario'],
                "prm_username" => $datos['username'],
                "prm_telefono_usuario" => $datos['telefono_usuario'],
                "prm_correo_usuario" => $datos['correo_usuario'],
                "prm_idusuario" => $datos['idusuario']
            );   
        }
    
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }
    
    
    
    public function SelectTipoDocumento(){
        $consulta ="SELECT idtipodocumento, nombre_documento FROM tipodocumento";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    public function activarUserModel($datos){
        $consulta = "UPDATE usuario 
        SET estado = :prm_estado
        WHERE idusuario = :prm_idUser";
        $parametros = array(
            "prm_idUser"=>$datos['idusuario'],
            "prm_estado" => $datos['estado']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    public function editarRolModel($datos){
        $consulta = "UPDATE usuario 
        SET idrolusuario = :prm_idrolusuario
        WHERE idusuario = :prm_idUser";
        $parametros = array(
            "prm_idUser"=>$datos['idusuario'],
            "prm_idrolusuario" => $datos['idrol']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    
}


?>