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
        $consulta = "INSERT INTO Sobre_nosotros(nombre , rol, facultad, imagen) 
        VALUES (:prm_nombre, :prm_rol, :prm_facultad, :imagen)";
        
        $imageDirectory = '/Literagiando/Storage/img-home/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
        
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_nombre" => $datos['nombre'],
                "prm_rol" => $datos['rol'],
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
    

    public function ModificarSobre_nosotros($datos){
        $consulta = "UPDATE Sobre_nosotros 
        SET nombre_Sobre_nosotros = :prm_titulo_Sobre_nosotros, subtitulo_sobre_nosotros = :prm_subtitulo_sobre_nosotros, detalle_sobre_nosotros = :prm_detalle_Sobre_nosotros, idusuario = :prm_idusuario, idtipo_Sobre_nosotros = :prm_idtipo_Sobre_nosotros, imagen_card = :imagen_Sobre_nosotros 
        WHERE idsobre_nosotros = :prm_idSobre_nosotros";
        

        $imageDirectory = '/Literagiando/Storage/img-home/'; 
        $uploadedFile = $_FILES['imagen']['tmp_name'];
        $imageFileName = $_FILES['imagen']['name'];
        $imageFilePath = $imageDirectory . $imageFileName;
        
    
        if (move_uploaded_file($uploadedFile, $imageFilePath)) {
    
            $parametros = array(
                "prm_idSobre_nosotros"=>$datos['idSobre_nosotros'],
                "prm_titulo_Sobre_nosotros" => $datos['titulo_Sobre_nosotros'],
                "prm_subtitulo_sobre_nosotros" => $datos['subtitulo_sobre_nosotros'],
                "prm_detalle_Sobre_nosotros" => $datos['detalle_Sobre_nosotros'],
                "prm_idtipo_Sobre_nosotros" => $datos['idtipo_Sobre_nosotros'],
                "prm_idusuario" => $datos['idusuario'],
                "imagen_Sobre_nosotros" => substr($imageFilePath,2) 
            );
    
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        } else {
            echo "entroo a aqui";
            $consulta = "UPDATE Sobre_nosotros 
            SET nombre_Sobre_nosotros = :prm_titulo_Sobre_nosotros, subtitulo_sobre_nosotros = :prm_subtitulo_sobre_nosotros, detalle_sobre_nosotros = :prm_detalle_Sobre_nosotros, idusuario = :prm_idusuario, idtipo_Sobre_nosotros = :prm_idtipo_Sobre_nosotros
            WHERE idsobre_nosotros = :prm_idSobre_nosotros";

            $parametros = array(
                "prm_idSobre_nosotros"=>$datos['idSobre_nosotros'],
                "prm_titulo_Sobre_nosotros" => $datos['titulo_Sobre_nosotros'],
                "prm_subtitulo_sobre_nosotros" => $datos['subtitulo_sobre_nosotros'],
                "prm_detalle_Sobre_nosotros" => $datos['detalle_Sobre_nosotros'],
                "prm_idusuario" => $datos['idusuario'],
                "prm_idtipo_Sobre_nosotros" => $datos['idtipo_Sobre_nosotros']
            );
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }

    }
    
    public function editarSobreNosotros($datos){
        $idDatos = array_shift($datos);

        $nombresColumnas = implode(', ', array_keys($datos));

        $condiciones = array();

        foreach ($datos as $nombreColumna => $valor) {
            $condiciones[] = '`' . $nombreColumna . '`'  . ' = ' . '"' . $valor . '"';
        }

        $consul = implode(', ', $condiciones);


        $consulta = "UPDATE sobrenosotros 
        SET ". $consul .", imagen_banner = :imagen_banner WHERE idsobrenosotros = :prm_idsobrenosotros";
        

        if(isset($_FILES['imagen'])){
        $imageDirectory = '/Literagiando/Storage/img-home/'; 
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
            $consulta = "UPDATE sobrenosotros 
            SET ". $consul ." WHERE idsobrenosotros = :prm_idsobrenosotros";

            $parametros = array(
                "prm_idsobrenosotros"=>$idDatos
            );
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }
        } else {
            echo "no hay imagen";
            $consulta = "UPDATE sobrenosotros 
            SET ". $consul ." WHERE idsobrenosotros = :prm_idsobrenosotros";

            $parametros = array(
                "prm_idsobrenosotros"=>$idDatos
            );
            $respuesta = $this->conexion->EjecutarSPConParams($consulta, $parametros);
            return $respuesta;
        }

    }

    public function EliminarSobre_nosotros($idSobre_nosotros){
        $consulta = "DELETE FROM Sobre_nosotros WHERE idSobre_nosotros = :prm_idSobre_nosotros";
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