<?php

require_once (__DIR__.'/../App/Controllers/Login/RoleController.php');

require_once (__DIR__.'/../App/Controllers/Login/PermisosController.php');


function eliminarPermiso() {
$permisoController = new PermisosController();


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $datos = array(
            "idrol" => $_POST["idrol"],
            "id_pagina" => $_POST["id_pagina"]
        );

        $resultado = $permisoController->ActualizarPermisosController($datos);

        // Redirigir después de la edición
        if ($resultado['state']) {
            //header("Location: index.php");
            //exit();
            $pagina_anterior = $_SERVER['HTTP_REFERER'];
            header("Location: $pagina_anterior");

            echo "<pre>";
            print_r($_POST);
            print_r($resultado);
            echo "</pre>";
        } else {
            // Manejar el caso de error si es necesario
            echo "Error al editar el rol.";
        }
    }
}
function agregarPermiso() {
$permisoController = new PermisosController();


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $datos = array(
            "idrol" => $_POST["idrol"],
            "id_pagina" => $_POST["id_pagina"]
        );

        $resultado = $permisoController->AgregarPermisosController($datos);

        // Redirigir después de la edición
        if ($resultado['state']) {
            //header("Location: index.php");
            //exit();
            $pagina_anterior = $_SERVER['HTTP_REFERER'];
            header("Location: $pagina_anterior");
        } else {
            // Manejar el caso de error si es necesario
            echo "Error al editar el rol.";
        }
    }
}


class RolRouter {
    private $roleController;

    public function __construct() {
        $this->roleController = new RoleController();
    }

    public function route() {
        $action = isset($_POST['action']) ? $_POST['action'] : '';

        switch ($action) {
            case 'editar':
                $this->editarRol();
                break;
            
            case 'nuevo':
                $this->nuevoRol();
                break;
            
            case 'eliminarPermiso':
                eliminarPermiso();
                break;
            
            case 'crearPermiso':
                agregarPermiso();
                break;

            default:
                echo "Acción no válida"; echo $action;
                
                break;
        }
    }
    

    private function nuevoRol() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $datos = array(
                "nombre_rol" => $_POST["nombre_rol"],
            );

            $resultado = $this->roleController->NuevoRolController($datos);

            if ($resultado['state'] == true) {
                echo "<script>window.location.href = '/Literagiando/Views/Roles/index.php'</script>";
            } else {
                echo "Error al agregar el rol.";
                echo $resultado['mensaje'];
                echo "<script>alert('Error al ingresar rol".$resultado['mensaje']."');window.location.href =  '/Literagiando/Views/Roles/index.php'</script>";
            }
        }else{
            echo "No post";
        }
    }

    private function editarRol() {
        // Verificar si se reciben datos del formulario y llamar a la función del controlador
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $datos = array(
                "idrol" => $_POST["idrol"],
                "nombre_rol" => $_POST["nombre_rol"]
                // Otros datos del formulario
            );

            $resultado = $this->roleController->EditarRolController($datos);

            // Redirigir después de la edición
            if ($resultado['state']) {
                //header("Location: index.php");
                //exit();
                $pagina_anterior = $_server['http_referer'];
                header("location: $pagina_anterior");
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
