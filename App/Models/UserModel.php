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
        $consulta = "SELECT * FROM usuario JOIN tipodocumento ON tipodocumento.idtipodocumento = usuario.idtipodedocumento JOIN roles ON roles.idrol = usuario.rol";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    


    public function ObtenerUserIdModel($iduser){
        $consulta = "SELECT * FROM usuario WHERE id_usuario = ?";
        $parametros = array(
            "prm_iduser"=>$iduser
        );

        $respuesta = $this->conexion->EjecutarSPSinParams($consulta, $parametros);
        return $respuesta;

    }

    public function NuevoUserModel($datos){
        $hashedPassword = password_hash($datos['password'], PASSWORD_BCRYPT);
        $consulta = "INSERT INTO usuario(identificacion, nombre_completo, direccion_usuario, telefono, usuario, correo, password, idtipodedocumento) 
                    VALUES (:prm_identificacion, :prm_nombre_completo, :prm_direccion_usuario, :prm_telefono, :prm_usuario, :prm_correo, :prm_password, :prm_idtipodedocumento)";
        $parametros = array(
            "prm_identificacion" => $datos['identificacion'],
            "prm_nombre_completo" => $datos['nombre_completo'],
            "prm_direccion_usuario" => $datos['direccion_usuario'],
            "prm_telefono" => $datos['telefono'],
            "prm_usuario" => $datos['usuario'],
            "prm_correo" => $datos['correo'],
            "prm_password" => $hashedPassword,
            "prm_idtipodedocumento" => $datos['idtipodedocumento']


        );
    
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        if ($respuesta instanceof PDOException) {
            if ($respuesta->getCode() == 23000) {
                return ['error' => 'El correo electrónico o nombre de usuario ya está registrado.'];
            } else {
                return ['error' => 'Error al registrar el usuario.'];
            }
        }
        
            return $respuesta;
        
        
    }


    
    public function ModificarUserModel($datos){

        if (!empty($datos['foto_perfil'])) {
            $consulta = "UPDATE usuario 
            SET foto_perfil = :prm_foto_perfil
            WHERE id_usuario = :prm_id_usuario";
            $parametros = array(
                "prm_foto_perfil" => $datos['foto_perfil'],
                "prm_id_usuario" => $datos['id_usuario']
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } 
        


        if (!empty($datos['password'])) {
            $hashedPassword = password_hash($datos['password'], PASSWORD_BCRYPT);
        }
        
        

        if (!empty($datos['idtipodedocumento'])) {
            $consulta = "UPDATE usuario 
            SET identificacion = :prm_identificacion, nombre_completo = :prm_nombre_completo, direccion_usuario = :prm_direccion_usuario,
                telefono = :prm_telefono, usuario = :prm_usuario, correo = :prm_correo,
                password = :prm_password, idtipodedocumento = :prm_idtipodedocumento
            WHERE id_usuario = :prm_id_usuario";
    
            $parametros = array(
                "prm_identificacion" => $datos['identificacion'],
                "prm_nombre_completo" => $datos['nombre_completo'],
                "prm_direccion_usuario" => $datos['direccion_usuario'],
                "prm_telefono" => $datos['telefono'],
                "prm_usuario" => $datos['usuario'],
                "prm_correo" => $datos['correo'],
                "prm_password" => $hashedPassword,
                "prm_idtipodedocumento" => $datos['idtipodedocumento'],
                "prm_id_usuario" => $datos['id_usuario']
            );
        } else if(!empty($datos['identificacion'])){
            $consulta = "UPDATE usuario 
            SET identificacion = :prm_identificacion, nombre_completo = :prm_nombre_completo, direccion_usuario = :prm_direccion_usuario,
                telefono = :prm_telefono, correo = :prm_correo, usuario = :prm_usuario
            WHERE id_usuario = :prm_id_usuario";
    
            $parametros = array(
                "prm_identificacion" => $datos['identificacion'],
                "prm_nombre_completo" => $datos['nombre_completo'],
                "prm_direccion_usuario" => $datos['direccion_usuario'],
                "prm_usuario" => $datos['usuario'],
                "prm_telefono" => $datos['telefono'],
                "prm_correo" => $datos['correo'],
                "prm_id_usuario" => $datos['id_usuario']
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
        WHERE id_usuario = :prm_idUser";
        $parametros = array(
            "prm_idUser"=>$datos['id_usuario'],
            "prm_estado" => $datos['estado']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    public function editarRolModel($datos){
        $consulta = "UPDATE usuario 
        SET rol = :prm_rol
        WHERE id_usuario = :prm_idUser";
        $parametros = array(
            "prm_idUser"=>$datos['id_usuario'],
            "prm_rol" => $datos['idrol']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    
}


?>