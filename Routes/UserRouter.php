<?php

    require_once (__DIR__ .'./../App/Controllers/Login/RegisterController.php');
    require_once (__DIR__. './../App/Controllers/Login/UserController.php');

    $accion = $_POST['accion'];

    switch ($accion) {
        case 'nuevo':
            echo NuevoUser();        
            break;
        
        case 'editar':
            $idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : null;
            EditarUser($idusuario);
            break;

        default:
            break;
    }

    function EditarUser($idusuario){
        $userController = new UserController();
    
        if(isset($_POST['documento_usuario'])
            && isset($_POST['nombrecompleto_usuario'])
            && isset($_POST['direccion_usuario'])
            && isset($_POST['telefono_usuario'])
            && isset($_POST['username'])
            && isset($_POST['correo_usuario'])
            && isset($_POST['password'])
            && isset($_POST['idtipodedocumento'])
            && isset($_POST['idusuario'])){
            
            $datos = array(
                "documento_usuario" => $_POST['documento_usuario'],
                "nombrecompleto_usuario" => $_POST['nombrecompleto_usuario'],
                "direccion_usuario" => $_POST['direccion_usuario'],
                "telefono_usuario" => $_POST['telefono_usuario'],
                "username" => $_POST['username'],
                "correo_usuario" => $_POST['correo_usuario'],
                "password" => $_POST['password'],
                "idtipodedocumento" => $_POST['idtipodedocumento'],
                "idusuario" => $idusuario
            );    
    
            $respuesta = $userController->ModificarUsersController($datos, $idusuario);
    
            if($respuesta['state'] == true ) {
                echo "Registro Editado";
                header("Location: ./../Views/UserAdmin/index.php");
                exit; // Add exit after header to stop script execution
            }
        }
    }
    

    function NuevoUser()
    {
        $userController = new RegisterController();

        if(isset($_POST['documento_usuario'])
            && isset($_POST['nombrecompleto_usuario'])
            && isset($_POST['direccion_usuario'])
            && isset($_POST['telefono_usuario'])
            && isset($_POST['username'])
            && isset($_POST['correo_usuario'])
            && isset($_POST['password'])
            && isset($_POST['idtipodedocumento'])){

            //creamos arreglo de datos
            $datos = array(
                "documento_usuario" => $_POST['documento_usuario'],
                "nombrecompleto_usuario" => $_POST['nombrecompleto_usuario'],
                "direccion_usuario" => $_POST['direccion_usuario'],
                "telefono_usuario" => $_POST['telefono_usuario'],
                "username" => $_POST['username'],
                "correo_usuario" => $_POST['correo_usuario'],
                "password" => $_POST['password'],
                "idtipodedocumento" => $_POST['idtipodedocumento']


            );

            $respuesta = $userController->NuevoUserController($datos);
            
           
            if($respuesta['state']==true){
                echo "Registro Guardaro";
                header("Location: ./../Views/Home/index.php");
            }else{
                echo "Error";
            }          

        }

    }

?>