<?php

require_once (__DIR__ .'./../Models/Database.php');

class BlogModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerBlogModel(){
        $consulta = "SELECT * FROM blog";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerEventoPorIdModel($ideventos){
        $consulta = "SELECT * FROM blogs WHERE ideventos = :prm_ideventos";
        $parametros = array(
            "prm_ideventos"=>$ideventos
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }
    
    public function NuevoBlogModel($datos){
        $consulta = "INSERT INTO blog(titulo_blog, subtitulo_blog, detalle_blog, idtipo_blog, id_usuario, imagen_blog) 
        VALUES (:prm_titulo_blog, :prm_subtitulo_blog, :prm_detalle_blog, :prm_idtipo_blog, :prm_id_usuario, :imagen_blog);";
        
        $imageDirectory = '../Storage/img-blogs/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_titulo_blog" => $datos['titulo_blog'],
                "prm_subtitulo_blog" => $datos['subtitulo_blog'],
                "prm_detalle_blog" => $datos['detalle_blog'],
                "prm_idtipo_blog" => $datos['idtipo_blog'],
                "prm_id_usuario" => $datos['id_usuario'],
                "imagen_blog" => $imageFilePath
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
        $consulta = "DELETE FROM eventos WHERE ideventos = ?";
        $parametros = array(
            "prm_ideventos"=>$ideventos
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }



    public function SelectTipoBlog(){
        $consulta ="SELECT idtipo_blog, nombre_blog FROM tipoblog";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

}

?>