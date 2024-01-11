<?php

require_once (__DIR__ .'./../Models/Database.php');

class EventoModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerEventoModel(){
        $consulta = "SELECT e.*, te.nombre_evento AS tipoevento
                     FROM eventos e
                     LEFT JOIN tipoevento te ON e.idtipo_evento = te.idtipo_evento";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerEventoPorIdModel($ideventos){
        $consulta = "SELECT * FROM eventos WHERE ideventos = :prm_ideventos";
        $parametros = array(
            "prm_ideventos"=>$ideventos
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    
    public function NuevoEventoModel($datos){
        $consulta = "INSERT INTO eventos(titulo_evento, detalle_evento, idtipo_evento, imagen_eventos) 
        VALUES (:prm_titulo_evento, :prm_detalle_evento, :prm_idtipo_evento, :imagen_eventos)";
        
        $imageDirectory = '../Storage/img-eventos/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_titulo_evento" => $datos['titulo_evento'],
                "prm_detalle_evento" => $datos['detalle_evento'],
                "prm_idtipo_evento" => $datos['idtipo_evento'],
                "imagen_eventos" => $imageFilePath 
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
    

    public function ModificarEventoModel($datos){
        $consulta = "UPDATE eventos 
        SET titulo_evento = :prm_titulo_evento, detalle_evento = :prm_detalle_evento, idtipo_evento = :prm_idtipo_evento
        WHERE ideventos = :prm_ideventos";
        $parametros = array(
            "prm_ideventos"=>$datos['ideventos'],
            "prm_titulo_evento" => $datos['titulo_evento'],
            "prm_detalle_evento" => $datos['detalle_evento'],
            "prm_idtipo_evento" => $datos['idtipo_evento']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    
    public function EliminarEventoModel($ideventos){
        $consulta = "DELETE FROM eventos WHERE ideventos = :prm_ideventos";
        $parametros = array(
            "prm_ideventos"=>$ideventos
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }



    public function SelectTipoEvento(){
        $consulta ="SELECT idtipo_evento, nombre_evento FROM tipoevento";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

}

?>