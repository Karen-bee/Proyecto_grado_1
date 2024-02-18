<?php

require_once (__DIR__ .'/../Models/Database.php');

class SliderModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerSliderModel(){
        $consulta = "SELECT * FROM `imagenes_home`WHERE  activo = 'Activo'";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    public function ObtenerAllSliderModel(){
        $consulta = "SELECT * FROM `imagenes_home`";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    public function ObtenerSliderPorIdModel($id){
        $consulta = "SELECT * FROM imagenes_home WHERE id = :prm_id";
        $parametros = array(
            "prm_id"=>$id
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }
    
    public function NuevoSliderModel() {
        $consulta = "INSERT INTO imagenes_home(nombre, tipo, tamano, activo, ruta) VALUES (:prm_titulo_slider, :prm_tipo, :prm_tamano, :activo, :imagen_sliders)";
        
        $imageDirectory = '../../Literagiando/Storage/img-home/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;

        // Verifica si la imagen se cargó correctamente
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
            $parametros = array(
                "prm_titulo_slider" => $_FILES['imagen']['name'],
                "prm_tipo" => $_FILES['imagen']['type'],
                "prm_tamano" => $_FILES['imagen']['size'],
                "activo" => "activo",
                "imagen_sliders" => substr($imageFilePath, 2)
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            // Manejo de error si la imagen no se cargó correctamente
            return "Error al cargar la imagen";
        }
    }

    


    
    public function EliminarSliderModel($id){
        $consulta = "DELETE FROM imagenes_home WHERE id = :prm_id";
        $parametros = array(
            "prm_id"=>$id
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }

    public function activarSliderModel($datos){
        $consulta = "UPDATE Imagenes_home 
        SET activo = :prm_estado_slider
        WHERE id = :prm_idSlider";
        $parametros = array(
            "prm_idSlider"=>$datos['idSlider'],
            "prm_estado_slider" => $datos['estado_slider']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }



}

?>