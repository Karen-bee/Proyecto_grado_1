<?php

require_once (__DIR__ ."./../Models/Blog.php");

class BlogController extends Blog {
    private $model;

    public function __construct() {
        $this->model = new Blog();
    }

    public function index(){
        return ($this->model->index()) ? $this->model->index() : false;
    }

    public function guardar($titulo_blog, $subtitulo_blog, $detalle_blog, $id_usuario, $idtipo_blog){
        $idblog = $this->model->insertar($titulo_blog, $subtitulo_blog, $detalle_blog, $id_usuario, $idtipo_blog);
        return ($idblog!=false) ? header("Location: /Views/BlogAdmin/index.php") : header("Location: /Views/BlogAdmin/index.php");
    }

    public function show($idblog){
        
    }

    public function update($idblog,$titulo_blog, $subtitulo_blog, $imagen_blog, $detalle_blog, $id_usuario, $idtipo_blog){
        return ($this->model->update($idblog,$titulo_blog, $subtitulo_blog, $imagen_blog, $detalle_blog, $id_usuario, $idtipo_blog) != false) ? header("Location:edit.php?idblog=".$idblog) : header("Location:/Views/BlogAdmin/index.php");
    }

    public function delete($idblog){
        return ($this->model->delete($idblog)) ? header("Location: /Views/BlogAdmin/index.php") : header("Location:show.php?idblog=".$idblog) ;
    }


}

?>