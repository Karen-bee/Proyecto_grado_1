<?php

require_once (__DIR__ .'./../Models/Database.php');

class BlogModel {
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }
    public function ObtenerBlogModel(){
        $consulta = "SELECT e.*, te.nombre_blog AS tipoblog
                     FROM blog e 
                     LEFT JOIN tipoblog te ON e.idtipo_blog = te.idtipo_blog";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerBlogPorIdModel($idblog){
        $consulta = "SELECT * FROM blog WHERE idblog = :prm_idblog";
        $parametros = array(
            "prm_idblog"=>$idblog
        );
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta, $parametros);
        return $respuesta;
    }

    public function NuevoBlogModel ($datos){
        $consulta="INSERT INTO blog(titulo_blog, subtitulo_blog, detalle_blog, idtipo_blog, imagen_blog)
        VALUES (:prm_titulo_blog, :prm_subtitulo_blog, :prm_detalle_blog, :prm_idtipo_blog, :prm_imagen_blog)";
        $imageDirectory ='../Storage/img-blogs/';
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath =$imageDirectory . $imageFileName;

        if (move_uploaded_file($uploadedFile, $imageFilePath)){

            $parametros = array(
                "prm_titulo_blog" => $datos ['titulo_blog'],
                "prm_subtitulo_blog" => $datos ['subtitulo_blog'],
                "prm_detalle_blog" => $datos ['detalle_blog'],
                "prm_idtipo_blog" => $datos ['idtipo_blog'],
                "imagen_blog" => $imageFilePath
            );
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }else{
            $respuesta = array(
                "state" => false,
                "mensaje" => "Error al cargar la Imagen."
            );
            return $respuesta;
        }
    }
    public function ModificarBlogModel($datos){
        $consulta = "UPDATE blog 
        SET titulo_blog = :prm_titulo_blog, subtitulo_blog = :prm_subtitulo_blog, idtipo_blog = :prm_idtipo_blog, detalle_blog = :prm_detalle_blog
        WHERE idblog = :prm_idblog";
        $parametros = array(
            "prm_idblog" => $datos ['idblog'],
            "prm_titulo_blog" => $datos ['titulo_blog'],
            "prm_subtitulo_blog" => $datos ['subtitulo_blog'],
            "prm_detalle_blog" => $datos ['detalle_blog'],
            "prm_idtipo_blog" => $datos ['idtipo_blog']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }

    public function EliminarBlogModel($idblog){
        $consulta ="DELETE FROM blog WHERE idblog =?(:prm_idblog);";
        $parametros = array(
            "prm_idblog"=>$idblog
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }

    public function SelectTipoBlog(){
        $consulta ="SELECT idtipo_blog, tipo_blog FROM tipo_blog";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
}
?>