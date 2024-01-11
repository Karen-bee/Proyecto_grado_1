<?php

require_once (__DIR__ . './../Models/Conexion.php');

class Blog extends db {

    private $PDO;

    public function __construct() {
        $con = New db();
        $this->PDO = $con->conexion();
    }

    public function index(){
        $stament = $this->PDO->prepare("SELECT * FROM blog");
        return ($stament->execute()) ? $stament->fetchAll() : false;
    }

    public function insertar($titulo_blog, $subtitulo_blog, $detalle_blog, $id_usuario, $idtipo_blog){
        $stament = $this->PDO->prepare("INSERT INTO blog VALUES(null,:titulo_blog, :subtitulo_blog, :imagen_blog, :detalle_blog, :id_usuario, :idtipo_blog)");
        
        $imageDirectory = '../Storage/img-eventos/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;

        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
        
            $stament->bindParam(":titulo_blog",$titulo_blog);
            $stament->bindParam(":subtitulo_blog",$subtitulo_blog);
            $stament->bindParam(":imagen_blog",$imageFilePath);
            $stament->bindParam(":detalle_blog",$detalle_blog);
            $stament->bindParam(":id_usuario",$id_usuario);
            $stament->bindParam(":idtipo_blog",$idtipo_blog);
            
            return ($stament->execute()) ? $this->PDO->lastInsertId() : false ;
        }
    }

    public function show($idblog){
        $stament = $this->PDO->prepare("SELECT * FROM blog where idblog = :idblog limit 1");
        $stament->bindParam(":idblog",$idblog);
        return ($stament->execute()) ? $stament->fetch() : false ;
    }

    public function update($idblog,$titulo_blog, $subtitulo_blog, $imagen_blog, $detalle_blog, $id_usuario, $idtipo_blog){
        $stament = $this->PDO->prepare("UPDATE blog SET titulo_blog = :titulo_blog, subtitulo_blog = :subtitulo_blo, imagen_blog = :imagen_blog, id_usuario = :id_usuario, idtipo_blog = :idtipo_blog WHERE idblog = :idblog");
        $stament->bindParam(":titulo_blog",$titulo_blog);
        $stament->bindParam(":subtitulo_blog",$subtitulo_blog);
        $stament->bindParam(":imagen_blog",$imagen_blog);
        $stament->bindParam(":detalle_blog",$detalle_blog);
        $stament->bindParam(":id_usuario",$id_usuario);
        $stament->bindParam(":idtipo_blog",$idtipo_blog);
        $stament->bindParam(":idblog",$idblog);
        return ($stament->execute()) ? $idblog : false;
    }

    public function delete($idblog){
        $stament = $this->PDO->prepare("DELETE FROM blog WHERE idblog = :idblog");
        $stament->bindParam(":idblog",$idblog);
        return ($stament->execute()) ? true : false;
    }

    public function select(){
        $stament = $this->PDO->prepare("SELECT idtipo_blog, nombre_blog FROM tipoevento");
        return ($stament->execute()) ? $stament->fetchAll() : false ;
        
    }

    
}


?>