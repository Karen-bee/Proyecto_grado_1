<?php

require_once (__DIR__ .'/../Models/Database.php');

class BlogModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerBlogsActivosModel(){
        $consulta = "SELECT e.*, te.tipo_blog AS tipoBlog, usuario.nombrecompleto_usuario as usuarioN
        FROM Blog e
        LEFT JOIN tipoBlog te ON e.idtipo_blog = te.idtipo_blog JOIN usuario ON usuario.idusuario = e.idusuario WHERE e.estado_blog = 'Activo'";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerBlogModel(){
        $consulta = "SELECT e.*, te.tipo_blog AS tipoBlog, usuario.nombrecompleto_usuario as usuarioN
        FROM Blog e
        LEFT JOIN tipoBlog te ON e.idtipo_blog = te.idtipo_blog JOIN usuario ON usuario.idusuario = e.idusuario";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerUltimoBlogModel(){
        $consulta = "SELECT e.*, te.tipo_blog AS tipoBlog, usuario.nombrecompleto_usuario as usuarioN
        FROM Blog e
        LEFT JOIN tipoBlog te ON e.idtipo_blog = te.idtipo_blog
        JOIN usuario ON usuario.idusuario = e.idusuario WHERE e.estado_blog = 'Activo'
        ORDER BY fecha_publicacion DESC
        LIMIT 1;";

        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerBlogPorIdModel($idBlog){
        $consulta = "SELECT e.*, te.tipo_blog AS tipoBlog, usuario.nombrecompleto_usuario as usuarioN
        FROM Blog e
        LEFT JOIN tipoBlog te ON e.idtipo_blog = te.idtipo_blog JOIN usuario ON usuario.idusuario = e.idusuario WHERE idBlog = :prm_idBlog";
        $parametros = array(
            "prm_idBlog"=>$idBlog
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }

    
    public function NuevoBlogModel($datos){
        $consulta = "INSERT INTO Blog(titulo_blog , idusuario, detalle_blog, idtipo_blog, imagen_blog, subtitulo_blog) 
        VALUES (:prm_titulo_Blog, :prm_idusuario, :prm_detalle_Blog, :prm_idtipo_blog, :imagen_Blog,:prm_subtitulo_blog)";
        
        $imageDirectory = '../../Literagiando/Storage/img-blogs/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_titulo_Blog" => $datos['titulo_blog'],
                "prm_subtitulo_blog" => $datos['subtitulo_blog'],
                "prm_idusuario" => $datos['id_usuario'],
                "prm_detalle_Blog" => $datos['detalle_blog'],
                "prm_idtipo_blog" => $datos['idtipo_blog'],
                "imagen_Blog" => substr($imageFilePath,2) 
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
    

    public function ModificarBlogModel($datos){
        $consulta = "UPDATE Blog 
        SET titulo_blog = :prm_titulo_Blog, subtitulo_blog = :prm_subtitulo_blog, detalle_blog = :prm_detalle_Blog, idtipo_blog = :prm_idtipo_blog, imagen_Blog = :imagen_Blog
        WHERE idBlog = :prm_idBlog";

        $imageDirectory = '../../Literagiando/Storage/img-blogs/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;

        if (move_uploaded_file($uploadedFile, $imageFilePath)) {

            $parametros = array(
                "prm_idBlog"=>$datos['idBlog'],
                "prm_titulo_Blog" => $datos['titulo_Blog'],
                "prm_subtitulo_blog" => $datos['subtitulo_blog'],
                "prm_detalle_Blog" => $datos['detalle_Blog'],
                "prm_idtipo_blog" => $datos['idtipo_Blog'],
                "imagen_Blog" => substr($imageFilePath,2) 
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            $consulta = "UPDATE Blog 
            SET titulo_blog = :prm_titulo_Blog, subtitulo_blog = :prm_subtitulo_blog, detalle_blog = :prm_detalle_Blog, idtipo_blog = :prm_idtipo_blog
            WHERE idBlog = :prm_idBlog";

            $parametros = array(
                "prm_idBlog"=>$datos['idBlog'],
                "prm_titulo_Blog" => $datos['titulo_Blog'],
                "prm_subtitulo_blog" => $datos['subtitulo_blog'],
                "prm_detalle_Blog" => $datos['detalle_Blog'],
                "prm_idtipo_blog" => $datos['idtipo_Blog']
            );
    
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }

        

    }
    
    public function EliminarBlogModel($idBlog){
        $consulta = "DELETE FROM Blog WHERE idBlog = :prm_idBlog";
        $parametros = array(
            "prm_idBlog"=>$idBlog
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }



    public function SelectTipoBlog(){
        $consulta ="SELECT idtipo_blog, tipo_blog FROM tipoBlog";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function activarBlogModel($datos){
        $consulta = "UPDATE Blog 
        SET estado_blog = :prm_estado_blog
        WHERE idblog = :prm_idBlog";
        $parametros = array(
            "prm_idBlog"=>$datos['idBlog'],
            "prm_estado_blog" => $datos['estado_blog']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }

}

?>