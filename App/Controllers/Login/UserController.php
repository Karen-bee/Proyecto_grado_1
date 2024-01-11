<?php

require_once (__DIR__ .'./../../Models/UserModel.php');

class UserController  extends UserModel{

    private $userModel;
    private $respuesta;

    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function ObtenerUsersController()
    {
        try {
            $resultados = $this->userModel->ObtenerUserModel();
            $this->respuesta = array(
                "state" => true,
                "users" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function ModificarUsersController($datos, $idusuario)
    {
        try {
            $resultados = $this->userModel->ModificarUserModel($datos, $idusuario);
            $this->respuesta = array(
                "state" => true,
                "data" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "state" => false,
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    



}


?>