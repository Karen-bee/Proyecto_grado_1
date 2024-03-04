<?php

require_once (__DIR__ .'/Database.php');

class EventoModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerEventoActivoModel(){
        $consulta = "SELECT e.*, te.nombre_evento AS tipoevento
                     FROM eventos e
                     LEFT JOIN tipoevento te ON e.idtipo_evento = te.idtipo_evento WHERE  e.estado_evento='Activo';";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerEventoModel(){
        $consulta = "SELECT e.*, te.nombre_evento AS tipoevento
                     FROM eventos e
                     LEFT JOIN tipoevento te ON e.idtipo_evento = te.idtipo_evento ;";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerEventoPorIdModel($ideventos){
        $consulta = "SELECT e.*, te.nombre_evento AS tipoevento
        FROM eventos e
        LEFT JOIN tipoevento te ON e.idtipo_evento = te.idtipo_evento WHERE ideventos = :prm_ideventos";
        $parametros = array(
            "prm_ideventos"=>$ideventos
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }

    public function ObtenerMisEventosModel($id_usuario){
        $consulta = "SELECT * FROM eventos 
                     JOIN asistencia_eventos ON asistencia_eventos.ideventos = eventos.ideventos 
                     WHERE asistencia_eventos.id_usuario = :id_usuario";
    
        $parametros = array("id_usuario" => $id_usuario);
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
    
        return $respuesta;
    }
    
    
    public function NuevoEventoModel($datos){
        $consulta = "INSERT INTO eventos(titulo_evento, subtitulo_evento, lugar, detalle_evento, idtipo_evento, imagen_eventos,fecha_evento) 
        VALUES (:prm_titulo_evento, :prm_subtitulo_evento, :prm_lugar, :prm_detalle_evento, :prm_idtipo_evento, :imagen_eventos, :fecha_evento)";
        
        $imageDirectory = '../../Literagiando/Storage/img-eventos/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_titulo_evento" => $datos['titulo_evento'],
                "prm_subtitulo_evento" => $datos['subtitulo_evento'],
                "prm_lugar" => $datos['lugar'],
                "prm_detalle_evento" => $datos['detalle_evento'],
                "prm_idtipo_evento" => $datos['idtipo_evento'],
                "fecha_evento" => $datos['fecha_evento'],
                "imagen_eventos" => substr($imageFilePath,2) 
            );
    
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            $parametros = array(
                "prm_titulo_evento" => $datos['titulo_evento'],
                "prm_subtitulo_evento" => $datos['subtitulo_evento'],
                "prm_lugar" => $datos['lugar'],
                "prm_detalle_evento" => $datos['detalle_evento'],
                "prm_idtipo_evento" => $datos['idtipo_evento'],
                "fecha_evento" => $datos['fecha_evento'],
                "imagen_eventos" => '/Literagiando/Storage/img-home/niños.jpeg' 
            );
    
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }
    }
    

    public function ModificarEventoModel($datos){
        $consulta = "UPDATE eventos 
        SET titulo_evento = :prm_titulo_evento, subtitulo_evento = :prm_subtitulo_evento, lugar = :prm_lugar, detalle_evento = :prm_detalle_evento, idtipo_evento = :prm_idtipo_evento, fecha_evento = :fecha_evento, imagen_eventos = :imagen_eventos 
        WHERE ideventos = :prm_ideventos";

        $imageDirectory = '../../Literagiando/Storage/img-eventos/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;

        if (move_uploaded_file($uploadedFile, $imageFilePath)) {

            $parametros = array(
                "prm_titulo_evento" => $datos['titulo_evento'],
                "prm_subtitulo_evento" => $datos['subtitulo_evento'],
                "prm_lugar" => $datos['lugar'],
                "prm_detalle_evento" => $datos['detalle_evento'],
                "prm_idtipo_evento" => $datos['idtipo_evento'],
                "prm_ideventos" => $datos['ideventos'],
                "fecha_evento" => $datos['fecha_evento'],
                "imagen_eventos" => substr($imageFilePath,2) 
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            $consulta = "UPDATE eventos 
            SET titulo_evento = :prm_titulo_evento, subtitulo_evento = :prm_subtitulo_evento, lugar = :prm_lugar, detalle_evento = :prm_detalle_evento, idtipo_evento = :prm_idtipo_evento, fecha_evento = :fecha_evento  
            WHERE ideventos = :prm_ideventos";

            $parametros = array(
                "prm_titulo_evento" => $datos['titulo_evento'],
                "prm_subtitulo_evento" => $datos['subtitulo_evento'],
                "prm_lugar" => $datos['lugar'],
                "prm_detalle_evento" => $datos['detalle_evento'],
                "prm_idtipo_evento" => $datos['idtipo_evento'],
                "prm_ideventos" => $datos['ideventos'],
                "fecha_evento" => $datos['fecha_evento']
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }



    }
    
    public function EliminarEventoModel($ideventos){
        $consulta = "DELETE FROM eventos WHERE ideventos = :prm_ideventos";
        $parametros = array(
            "prm_ideventos"=>$ideventos
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }

    public function activarEventoModel($datos){
        $consulta = "UPDATE Eventos 
        SET estado_evento = :prm_estado_evento
        WHERE ideventos = :prm_idEvento";
        $parametros = array(
            "prm_idEvento"=>$datos['idEvento'],
            "prm_estado_evento" => $datos['estado_evento']
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