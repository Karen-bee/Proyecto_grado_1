<?php

    require_once (__DIR__ . '../../Models/Database.php');

    class SliderModel{

        private $conexion;

        public function __construct(){
            $this->conexion = new Database();
        }

        public function ObtenerSliderModel(){
            $consulta = "SELECT * FROM imagenes_home;";
            $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
            return $respuesta;
        }

        public function ObtenerSliderPorIdModel($idnota){
            $consulta = "CALL SP_Obtener_Slider_Por_Id(:prm_idnota);";
            $parametros = array(
                "prm_idnota"=>$idnota
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;

        }

        public function NuevoSliderModel($datos){
            $consulta = "INSERT INTO(:prm_autor, :prm_nombre, :prm_tipo, :prm_tamano, :prm_ruta);";
            $parametros = array(
                "prm_nombre"=>$datos['name'],
                "prm_tipo"=>$datos['type'],
                "prm_tamano"=>$datos['size'],
                "prm_ruta"=>"../Storage/img-home/"
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;

        }

        public function ModificarNotaModel($datos){
            $consulta = "CALL SP_Modificar_Nota(:prm_idnota, :prm_autor, :prm_titulo, :prm_descripcion);";
            $parametros = array(
                "prm_idnota"=>$datos['idnota'],
                "prm_autor"=>$datos['autor'],
                "prm_titulo"=>$datos['titulo'],
                "prm_descripcion"=>$datos['descripcion']
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;

        }

        public function EliminarSliderModel($id){
            $consulta = "DELETE FROM imagenes_home WHERE id(:prm_id);";
            $parametros = array(
                "prm_id"=>$id
            );

            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;

        }

    }

?>