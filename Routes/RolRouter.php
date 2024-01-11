<?php

require_once (__DIR__.'./../App/Controllers/Login/RoleController.php');

class RolRouter {
    private $roleController;

    public function __construct() {
        $this->roleController = new RoleController();
    }

    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : '';

        switch ($action) {
            case 'editar':
                $this->editarRol();
                break;
            // Otros casos para diferentes acciones

            default:
                // Manejo de otras rutas o acciones
                break;
        }
    }

    private function editarRol() {
        // Verificar si se reciben datos del formulario y llamar a la función del controlador
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = array(
                "idrol" => $_POST["idrol"],
                "nombre_rol" => $_POST["nombre_rol"],
                // Otros datos del formulario
            );

            $resultado = $this->roleController->EditarRolController($datos);

            // Redirigir después de la edición
            if ($resultado['state']) {
                header("Location: index.php");
                exit();
            } else {
                // Manejar el caso de error si es necesario
                echo "Error al editar el rol.";
            }
        }
    }
}

// Crear una instancia del enrutador y llamar a la función route
$router = new RolRouter();
$router->route();
