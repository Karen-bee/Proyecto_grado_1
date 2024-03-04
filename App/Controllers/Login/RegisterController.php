<?php

require_once (__DIR__ .'/../../Models/UserModel.php');

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

    public function NuevoUserController($datos) {
        $resultados = $this->userModel->NuevoUserModel($datos);
        
        if (isset($resultados['error'])) {
            $this->respuesta = [
                "state" => false,
                "mensaje" => $resultados['error']
            ];
        } else {
            $this->respuesta = [
                "state" => true,
                "resultado" => $resultados
            ];
        }
    
        return $this->respuesta;
    }
    


        public function login() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $correo = $_POST['correo'];
                $password = $_POST['password'];
    
                $userModel = new UserModel();
                $user = $userModel->autenticarUsuario($correo, $password);
    
                if ($user) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: /Literagiando/Views/Dasboard.php');
                    exit;
                } else {
                    echo 'Credenciales incorrectas. Por favor, inténtalo de nuevo.';
                    header('Location: /Literagiando/Views/Home/index.php');

                }
            }
    
        }

}

?>