<?php

require_once (__DIR__ .'/../Models/Database.php');

class HomeModel {

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Database();
    }

    public function ObtenerSobre_nosotros(){
        $consulta = "SELECT * FROM sobrenosotros";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }
    public function ObtenerObjetivos(){
        $consulta = "SELECT * FROM objetivos";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObteneServicios(){
        $consulta = "SELECT * FROM servicios";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerGeneros(){
        $consulta = "SELECT * FROM generos_literarios";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerProfesores(){
        $consulta = "SELECT * FROM Sobre_nosotros";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function ObtenerSobre_nosotrosPorId($idSobre_nosotros){
        $consulta = "SELECT e.*, te.tipo_sobre_nosotros AS tipoSobre_nosotros, usuario.nombrecompleto_usuario as usuarioN
        FROM Sobre_nosotros e
        LEFT JOIN tipoSobre_nosotros te ON e.idtipo_Sobre_nosotros = te.idtipo_Sobre_nosotros JOIN usuario ON usuario.idusuario = e.idusuario WHERE idSobre_nosotros = :prm_idSobre_nosotros";
        $parametros = array(
            "prm_idSobre_nosotros"=>$idSobre_nosotros
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }

    
    public function NuevoSobre_nosotros($datos){
        $consulta = "INSERT INTO Sobre_nosotros(nombre , cargo, facultad, imagen) 
        VALUES (:prm_nombre, :prm_cargo, :prm_facultad, :imagen)";
        
        $imageDirectory = '../../Literagiando/Storage/img-home/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
        
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_nombre" => $datos['nombre'],
                "prm_cargo" => $datos['cargo'],
                "prm_facultad" => $datos['facultad'],
                "imagen" => substr($imageFilePath,2) 
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
    

    
    
    public function editarSobreNosotros($datos){
        $idDatos = 1;
        $nombreID = '';
        $tabla = '';
        //array_shift($datos);

        foreach ($datos as $key => $value) {
            if (strpos($key, 'id_') !== false) {
                $idDatos = $value;
                $nombreID = '`'.$key.'`';
            }elseif($key == 'tabla'){
                $tabla = $value;
            }
        }

        unset($datos['tabla']);
        unset($datos[$nombreID]);
        

        $condiciones = array();

        foreach ($datos as $nombreColumna => $valor) {
            $condiciones[] = '`' . $nombreColumna . '`'  . ' = ' . '"' . $valor . '"';
        }

        $consul = implode(', ', $condiciones);


        $consulta = 'UPDATE  '. $tabla .' 
        SET '. $consul .', imagen = :imagen_banner WHERE '. $nombreID .' = :prm_idsobrenosotros';
        

        if(isset($_FILES['imagen'])){
            $imageDirectory = '../../Literagiando/Storage/img-home/'; 
            $uploadedFile = $_FILES['imagen']['tmp_name'];
            $imageFileName = $_FILES['imagen']['name'];
            $imageFilePath = $imageDirectory . $imageFileName;
            
        
            if (move_uploaded_file($uploadedFile, $imageFilePath)) {
        
                $parametros = array(
                    "prm_idsobrenosotros"=>$idDatos,
                    "imagen_banner" => substr($imageFilePath,2) 
                );
        
                $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
                return $respuesta;
            }else {
                echo "no se pudo mover la imagen";
            }
        } else {
            echo "no hay imagen";
        }

            $consulta = 'UPDATE  '. $tabla .' 
            SET '. $consul .' WHERE '. $nombreID .' = :prm_idsobrenosotros';
            echo  $consulta;
            $parametros = array(
                "prm_idsobrenosotros"=>$idDatos
            );
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;

    }

    public function NuevaFilaModel($datos){
        $tabla = '';
        //array_shift($datos);

        foreach ($datos as $key => $value) {
            if($key == 'tabla'){
                $tabla = $value;
            }
        }

        unset($datos['tabla']);
        

        $columnas = array();
        $valores = array();

        foreach ($datos as $nombreColumna => $valor) {
            $columnas[] = '`' . $nombreColumna . '`';
            $valores[] = '"' . $valor . '"' ;
        }

        $consul1 = implode(', ', $columnas);
        $consul2 = implode(', ', $valores);
        $consul = implode(', ', $columnas);


        $consulta = 'INSERT INTO  `'. $tabla.'` ('.$consul1.') VALUES ('.$consul2.')';
        

        if(isset($_FILES['imagen'])){
            $imageDirectory = '../../Literagiando/Storage/img-home/'; 
            $uploadedFile = $_FILES['imagen']['tmp_name'];
            $imageFileName = $_FILES['imagen']['name'];
            $imageFilePath = $imageDirectory . $imageFileName;
            
        
            if (move_uploaded_file($uploadedFile, $imageFilePath)) {
                $consulta = 'INSERT INTO  `'. $tabla.'` ('.$consul1.', imagen) VALUES ('.$consul2.'  , :imagen )';
                $parametros = array(
                    "imagen" => substr($imageFilePath,2) 
                );
                echo $consulta;
                $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
                return $respuesta;
            }else {
                echo "no se pudo mover la imagen";
            }
        } else {
            echo "no hay imagen";
        }

        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;

    }

    public function borrarFilaModel($datos){
        $tabla = 'xxxxx';
        $idDatos = -1;
        $nombreID = 'xxxxx';
        //array_shift($datos);

        foreach ($datos as $key => $value) {
            if (strpos($key, 'id_') !== false) {
                $idDatos = $value;
                $nombreID = '`'.$key.'`';
            }elseif($key == 'tabla'){
                $tabla = $value;
            }
        }

        unset($datos['tabla']);

        $consulta = 'DELETE FROM  `'. $tabla.'` WHERE '. $nombreID .' = :prm_idsobrenosotros';
        echo  $consulta;
        $parametros = array(
            "prm_idsobrenosotros"=>$idDatos
        );
        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }

    public function EliminarSobre_nosotros($idSobre_nosotros){
        $consulta = "DELETE FROM sobre_nosotros WHERE id = :prm_idSobre_nosotros";
        $parametros = array(
            "prm_idSobre_nosotros"=>$idSobre_nosotros
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;

    }



    public function SelectTipoSobre_nosotros(){
        $consulta ="SELECT idtipo_Sobre_nosotros, tipo_sobre_nosotros FROM tipoSobre_nosotros";
        $respuesta = $this->conexion->EjecutarSPSinParams($consulta);
        return $respuesta;
    }

    public function activarSobre_nosotros($datos){
        $consulta = "UPDATE Sobre_nosotros
        SET estado_sobre_nosotros = :prm_estado_sobre_nosotros
        WHERE idsobre_nosotros = :prm_idSobre_nosotros";
        $parametros = array(
            "prm_idSobre_nosotros"=>$datos['idSobre_nosotros'],
            "prm_estado_sobre_nosotros" => $datos['estado_sobre_nosotros']
        );

        $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
        return $respuesta;
    }
}

?>