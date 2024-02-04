<?php

    

    require_once (__DIR__ . '../../Models/Config.php');

    class Database{

        private function conectar(){

            $basedatos = new PDO('mysql:host='.DB_HOST.':'.DB_PORT.';'.'dbname='.DB_DATABASE.';charset='.CHARSET.'',DB_USER,DB_PASS);
            return $basedatos;
        }

         //Función para ejecutar procedimiento almacenado general
         public function EjecutarSPConParams($consulta, $parametros){
           
            try{
                $conexion = $this->conectar();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sentencia = $conexion->prepare($consulta);
                $sentencia->execute($parametros);

                $respuesta = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                $sentencia->closeCursor();

                //limpiamos
                $conexion=null;
                $sentencia=null;

                return $respuesta;

            }catch(PDOException $exception) {
                return $exception;
            }
        }

        

        public function EjecutarSPSinParams($consulta){
           
            try{
                $conexion = $this->conectar();
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sentencia = $conexion->prepare($consulta);
                $sentencia->execute();

                $respuesta = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                $sentencia->closeCursor();

                //limpiamos
                $conexion=null;
                $sentencia=null;

                return $respuesta;

            }catch(PDOException $exception) {
                return $exception;
            }
        }
        
    }

?>