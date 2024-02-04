<?php

require_once (__DIR__ .'/../../Models/UserModel.php');

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
    public function ObtenerTodosUsersController()
    {
        try {
            $resultados = $this->userModel->ObtenerAllUserModel();
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

    public function ModificarUsersController($datos)
    {
        try {
            $resultados = $this->userModel->ModificarUserModel($datos);
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
    public function activarUser($datos)
    {
        try {
            $resultados = $this->userModel->activarUserModel($datos);
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
    public function editarRol($datos)
    {
        try {
            $resultados = $this->userModel->editarRolModel($datos);
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