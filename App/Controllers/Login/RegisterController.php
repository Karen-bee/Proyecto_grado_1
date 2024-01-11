<?php

require_once (__DIR__ .'./../../Models/UserModel.php');

class RegisterController extends UserModel {

    private $userModel;
    private $respuesta;

    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function ObtenerDocumentsController()
    {
        try {
            $resultados = $this->userModel->SelectTipoDocumento();
            $this->respuesta = array(
                "documents" => $resultados
            );
        } catch (PDOException $pdoEx) {
            $this->respuesta = array(
                "mensaje" => $pdoEx->getMessage()
            );
        }

        return $this->respuesta;
    }

    public function NuevoUserController($datos)
        {
            try {
                $resultados = $this->userModel->NuevoUserModel($datos);
                $this->respuesta = array(
                    "state" => true,
                    "resultado" => $resultados
                );
            } catch (PDOException $pdoEx) {
                $this->respuesta = array(
                    "state" => false,
                    "mensaje" => $pdoEx->getMessage()
                );
            }

            return $this->respuesta;
        }


        public function login() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $correo = $_POST['correo_usuario'];
                $password = $_POST['password'];
    
                $userModel = new UserModel();
                $user = $userModel->autenticarUsuario($correo, $password);
    
                if ($user) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: ./Views/Dasboard.php');
                    exit;
                } else {
                    echo 'Credenciales incorrectas. Por favor, inténtalo de nuevo.';
                }
            }
    
            // Mostrar el formulario de inicio de sesión
            include './Views/Login/login.php';
        }

}

?>