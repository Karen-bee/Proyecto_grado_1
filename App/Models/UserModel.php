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

    public function autenticarUsuario($correo, $password) {
        global $conexion;
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo_usuario = ?");
        $stmt->execute([$correo]);
        $email = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($email && password_verify($password, $email['password'])) {
            return $email;
        } else {
            return false;
        }
    }
    
    
    public function SelectTipoDocumento(){
        $consulta ="SELECT idtipodocumento, nombre_documento FROM tipodocumento";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    

    
}


?>