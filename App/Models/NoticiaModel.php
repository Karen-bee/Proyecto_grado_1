<?php

require_once (__DIR__ .'./../Models/Database.php');

class NoticiaModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerNoticiaModel(){
        $consulta = "SELECT e.*, te.tipo_noticia AS tipoevento
        FROM noticias e
        LEFT JOIN tipoevento te ON e.idtiponoticia = te.idtiponoticia";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerNoticiaPorIdModel($idnoticias){
        $consulta = "SELECT * FROM eventos WHERE idnoticias = :prm_ideventos";
        $parametros = array(
            "prm_idnoticias"=>$idnoticias
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    
    public function NuevaNoticiaModel($datos){
        $consulta = "INSERT INTO eventos(titulo_noticias, subtitulo_noticias, detalle_noticias, idusuario, idtiponoticia, imagen_card) 
        VALUES (prm_titulo_noticias, prm_subtitulo_noticias :prm_detalle_noticias, :prm_idusuario, :prm_idtiponoticia, :imagen_card)";
        
        $imageDirectory = '../Storage/img-noticias/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_titulo_evento" => $datos['titulo_noticias'],
                "prm_detalle_evento" => $datos['subtitulo_noticias'],
                "prm_idtipo_evento" => $datos['detalle_noticias'],
                "prm_idusuario" => $datos['idusuario'],
                "prm_idtiponoticia" => $datos['idtiponoticia'],
                "imagen_card" => $imageFilePath 
            );
    
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            $respuesta = array(
                "state" => false,
                "mensaje" => "Error al cargar la Imagen."
            );
            return $respuesta;
        }
    }
    

    public function ModificarNoticiaModel($datos){
        $consulta = "UPDATE noticias 
        SET titulo_noticias = :prm_titulo_noticias, subtitulo_noticias = :prm_subtitulo_noticias, detalle_noticias = :prm_detalle_noticias, idusuario = prm_idusuario, idtiponoticia = prm_idtiponoticia
        WHERE idnoticias = :prm_idnoticias";
        $parametros = array(
            "prm_titulo_evento" => $datos['titulo_noticias'],
            "prm_detalle_evento" => $datos['subtitulo_noticias'],
            "prm_idtipo_evento" => $datos['detalle_noticias'],
            "prm_idusuario" => $datos['idusuario'],
            "prm_idtiponoticia" => $datos['idtiponoticia']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    
    public function EliminarNoticiaModel($idnoticias){
        $consulta = "DELETE FROM noticias WHERE idnoticias = ?(:prm_idnoticias);";
        $parametros = array(
            "prm_ideventos"=>$idnoticias
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }


    public function SelectTipoNoticia(){
        $consulta ="SELECT idtipo_evento, nombre_evento FROM tiponoticia";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
}
?>