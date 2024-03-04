<?php

require_once (__DIR__ .'/../Models/Database.php');

class NoticiaModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerNoticiasActivasModel(){
        $consulta = "SELECT e.*, te.tipo_noticia AS tipoNoticia, usuario.nombre_completo as usuarioN
        FROM Noticias e
        LEFT JOIN tipoNoticia te ON e.idtipo_Noticia = te.idtipo_Noticia JOIN usuario ON usuario.id_usuario = e.id_usuario WHERE e.estado_noticia='Activo';";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    public function ObtenerNoticiasModel(){
        $consulta = "SELECT e.*, te.tipo_noticia AS tipoNoticia, usuario.nombre_completo as usuarioN
        FROM Noticias e
        LEFT JOIN tipoNoticia te ON e.idtipo_Noticia = te.idtipo_Noticia JOIN usuario ON usuario.id_usuario = e.id_usuario ;";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerUltimaNoticiaModel(){
        $consulta = "SELECT e.*, te.tipo_noticia AS tipoNoticia, usuario.nombre_completo as usuarioN
        FROM Noticias e
        LEFT JOIN tipoNoticia te ON e.idtipo_Noticia = te.idtipo_Noticia
        JOIN usuario ON usuario.id_usuario = e.id_usuario WHERE e.estado_noticia='Activo'
        ORDER BY fecha_publicacion DESC
        LIMIT 1;";

        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerNoticiaPorIdModel($idNoticias){
        $consulta = "SELECT e.*, te.tipo_noticia AS tipoNoticia, usuario.nombre_completo as usuarioN
        FROM Noticias e
        LEFT JOIN tipoNoticia te ON e.idtipo_Noticia = te.idtipo_Noticia JOIN usuario ON usuario.id_usuario = e.id_usuario WHERE idNoticias = :prm_idNoticias";
        $parametros = array(
            "prm_idNoticias"=>$idNoticias
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }

    
    public function NuevoNoticiaModel($datos){
        $consulta = "INSERT INTO Noticias(nombre_Noticia , id_usuario, detalle_noticias, idtipo_Noticia, imagen_card, subtitulo_noticias) 
        VALUES (:prm_titulo_Noticia, :prm_id_usuario, :prm_detalle_Noticia, :prm_idtipo_Noticia, :imagen_Noticias,:prm_subtitulo_noticias)";
        
        $imageDirectory = '../../Literagiando/Storage/img-Noticias/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
        
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_titulo_Noticia" => $datos['titulo_Noticia'],
                "prm_id_usuario" => $datos['id_usuario'],
                "prm_detalle_Noticia" => $datos['detalle_Noticia'],
                "prm_idtipo_Noticia" => $datos['idtipo_Noticia'],
                "prm_subtitulo_noticias" => $datos['subtitulo_noticias'],
                "imagen_Noticias" => substr($imageFilePath,2) 
            );
    
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            $consulta = "INSERT INTO Noticias(nombre_Noticia , id_usuario, detalle_noticias, idtipo_Noticia, imagen_card, subtitulo_noticias) 
                VALUES (:prm_titulo_Noticia, :prm_id_usuario, :prm_detalle_Noticia, :prm_idtipo_Noticia, :imagen_Noticias,:prm_subtitulo_noticias)";
            $parametros = array(
                "prm_titulo_Noticia" => $datos['titulo_Noticia'],
                "prm_id_usuario" => $datos['id_usuario'],
                "prm_detalle_Noticia" => $datos['detalle_Noticia'],
                "prm_idtipo_Noticia" => $datos['idtipo_Noticia'],
                "prm_subtitulo_noticias" => $datos['subtitulo_noticias'],
                "imagen_Noticias" => "/Literagiando/Storage/img-noticias/noticia.png"
            );
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }
    }
    

    public function ModificarNoticiaModel($datos){
        $consulta = "UPDATE Noticias 
        SET nombre_Noticia = :prm_titulo_Noticia, subtitulo_noticias = :prm_subtitulo_noticias, detalle_noticias = :prm_detalle_Noticia, id_usuario = :prm_id_usuario, idtipo_Noticia = :prm_idtipo_Noticia, imagen_card = :imagen_Noticias 
        WHERE idnoticias = :prm_idNoticias";
        

        $imageDirectory = '../../Literagiando/Storage/img-Noticias/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
        
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_idNoticias"=>$datos['idNoticias'],
                "prm_titulo_Noticia" => $datos['titulo_Noticia'],
                "prm_subtitulo_noticias" => $datos['subtitulo_noticias'],
                "prm_detalle_Noticia" => $datos['detalle_Noticia'],
                "prm_idtipo_Noticia" => $datos['idtipo_Noticia'],
                "prm_id_usuario" => $datos['id_usuario'],
                "imagen_Noticias" => substr($imageFilePath,2) 
            );
    
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            echo "entroo a aqui";
            $consulta = "UPDATE Noticias 
            SET nombre_Noticia = :prm_titulo_Noticia, subtitulo_noticias = :prm_subtitulo_noticias, detalle_noticias = :prm_detalle_Noticia, id_usuario = :prm_id_usuario, idtipo_Noticia = :prm_idtipo_Noticia
            WHERE idnoticias = :prm_idNoticias";

            $parametros = array(
                "prm_idNoticias"=>$datos['idNoticias'],
                "prm_titulo_Noticia" => $datos['titulo_Noticia'],
                "prm_subtitulo_noticias" => $datos['subtitulo_noticias'],
                "prm_detalle_Noticia" => $datos['detalle_Noticia'],
                "prm_id_usuario" => $datos['id_usuario'],
                "prm_idtipo_Noticia" => $datos['idtipo_Noticia']
            );
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }

    }
    
    public function EliminarNoticiaModel($idNoticias){
        $consulta = "DELETE FROM Noticias WHERE idNoticias = :prm_idNoticias";
        $parametros = array(
            "prm_idNoticias"=>$idNoticias
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }



    public function SelectTipoNoticia(){
        $consulta ="SELECT idtipo_Noticia, tipo_noticia FROM tipoNoticia";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function activarNoticiaModel($datos){
        $consulta = "UPDATE Noticias
        SET estado_noticia = :prm_estado_noticia
        WHERE idnoticias = :prm_idNoticia";
        $parametros = array(
            "prm_idNoticia"=>$datos['idNoticia'],
            "prm_estado_noticia" => $datos['estado_noticia']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
}

?>