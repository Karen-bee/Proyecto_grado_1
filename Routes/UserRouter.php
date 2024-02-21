<?php

    require_once (__DIR__ .'/../App/Controllers/Login/RegisterController.php');
    require_once (__DIR__. '/../App/Controllers/Login/UserController.php');

    
    $accion = isset($_GET['accion']) ? $_GET['accion'] : null;
    if($accion == null){
        $accion = $_POST['accion'];
    }
    echo $accion;

    switch ($accion) {
        case 'nuevo':
            echo NuevoUser();        
            break;
        
        case 'editar':
            if(isset($_POST['password']) &&  ($_POST['password'] !== "")){
                EditarUser();
            }else{
                EditarPerfil();
            }
            break;
        
        case 'editarPerfil':
                EditarPerfil();
            break;

        case 'editarFoto':
            editarFoto();
            break;

        case 'editarRol':
            editarRol();
            break;

        case 'activarUser':
            echo activarUser();
            break;  

        default:
            echo "accion no valida";
            break;
    }

    function editarRol()
    {
        $userController = new UserController();

        if(
            isset($_POST['idrol']) &&
            isset($_POST['idusuario'])
        ){
            $rol = $_POST['idrol'];
            $id_User = $_POST['idusuario'];
            
            $datos = array(
                "idusuario" => $id_User,
                "idrol" => $rol
            );
            

            $respuesta = $userController->editarRol($datos);

            if ($respuesta['state'] === true) {
                echo 'exito';

            
                header("Location: /Literagiando/Views/UserAdmin/index.php");
                exit; 
            } else {
                echo "Error al guardar el registro";
            }
        } else {
            echo "Datos incompletos para guardar el registro";
        }
    }
    function activarUser()
    {
        $userController = new UserController();

        if(
            isset($_POST['estado']) &&
            isset($_POST['idUser'])
        ){
            $activo = $_POST['estado'];
            //echo "<script>console.log('$activo');</script>";
            if ($activo == 1) {
                $activo = 0;
            } else {
                $activo =1;
            }
            $id_User = $_POST['idUser'];
            
            $datos = array(
                "idusuario" => $id_User,
                "estado" => $activo
            );
            

            $respuesta = $userController->activarUser($datos);

            if ($respuesta['state'] === true) {
                echo 'exito';

                header("Location: /Literagiando/Views/UserAdmin/index.php");
                exit; 
            } else {
                echo "Error al guardar el registro";
            }
        } else {
            echo "Datos incompletos para guardar el registro";
        }
    }

    function EditarUser(){
        $userController = new UserController();
        
        $mensaje = json_encode($_POST);
    
        if(isset($_POST['documento_usuario'])
            && isset($_POST['nombrecompleto_usuario'])
            && isset($_POST['direccion_usuario'])
            && isset($_POST['telefono_usuario'])
            && isset($_POST['username'])
            && isset($_POST['correo_usuario'])
            && isset($_POST['password'])
            && isset($_POST['idtipodedocumento'])
            && isset($_POST['idusuario'])){


                if($_POST['password'] !== $_POST['password1']){
                    $mensaje = "Las contraseñas no coinciden";
                    echo "<script>alert('$mensaje'); window.location.href = '/Literagiando/Views/UserAdmin/index.php';</script>";

                    //header("Location: /Literagiando/Views/UserAdmin/index.php");
                    exit;

                }
            
            $datos = array(
                "documento_usuario" => $_POST['documento_usuario'],
                "nombrecompleto_usuario" => $_POST['nombrecompleto_usuario'],
                "direccion_usuario" => $_POST['direccion_usuario'],
                "telefono_usuario" => $_POST['telefono_usuario'],
                "username" => $_POST['username'],
                "correo_usuario" => $_POST['correo_usuario'],
                "password" => $_POST['password'],
                "password_actual" => $_POST['password_actual'],
                "idtipodedocumento" => $_POST['idtipodedocumento'],
                "idusuario" => $_POST['idusuario']
            );    
    
            $respuesta = $userController->ModificarUsersController($datos );
    
            if($respuesta['state'] == true ) {
                echo "Registro Editado";
                header("Location: /Literagiando/Views/UserAdmin/index.php");
                exit; // Add exit after header to stop script execution
            }
        }else{
            $mensaje = "formulario incompleto form: " . $mensaje ;
            // Imprimir el script de JavaScript que envía el mensaje a la consola
            echo $mensaje;
            echo "<script>console.log('$mensaje');</script>";
        }
    }

    function EditarPerfil(){
        

        $mensaje = json_encode($_POST);
        
    
        if(isset($_POST['documento_usuario'])
            && isset($_POST['nombrecompleto_usuario'])
            && isset($_POST['direccion_usuario'])
            && isset($_POST['telefono_usuario'])
            && isset($_POST['correo_usuario'])
            && isset($_POST['username'])
            && isset($_POST['idusuario'])){
            
            $datos = array(
                "documento_usuario" => $_POST['documento_usuario'],
                "nombrecompleto_usuario" => $_POST['nombrecompleto_usuario'],
                "direccion_usuario" => $_POST['direccion_usuario'],
                "telefono_usuario" => $_POST['telefono_usuario'],
                "username" => $_POST['username'],
                "correo_usuario" => $_POST['correo_usuario'],
                "idusuario" => $_POST['idusuario']
            );    
    
            $userController = new UserController();
        
            $respuesta = $userController->ModificarUsersController($datos );
    
            if($respuesta['state'] == true ) {
                echo "Registro Editado";
                
                header("Location: /Literagiando/Views/UserAdmin/index.php");
                exit; // Add exit after header to stop script execution
            }
        }else{
            $mensaje = "formulario incompleto form: " . $mensaje ;
            // Imprimir el script de JavaScript que envía el mensaje a la consola
            echo "<script>console.log('$mensaje');</script>";
        }
    }
    

    function editarFoto(){
        $userController = new UserController();
        $ruta_fin = '/Literagiando/Resources/img/User.png';
        $mensaje = json_encode($_POST);

        // Verificamos si se ha enviado un archivo
        if (isset($_FILES['foto_usuario'])) {
            $ruta_destino = "../../Literagiando/Resources/img/users/"; // Reemplaza con la ruta deseada

            // Obtenemos información del archivo
            $nombre_archivo = $_FILES['foto_usuario']['name'];
            $tipo_archivo = $_FILES['foto_usuario']['type'];
            $tamano_archivo = $_FILES['foto_usuario']['size'];
            $temp_archivo = $_FILES['foto_usuario']['tmp_name'];

            // Creamos una ruta única para evitar posibles conflictos de nombres
            //$ruta_final = $ruta_destino . uniqid() . "_" . $nombre_archivo;
            $ruta_final = $ruta_destino . $nombre_archivo;

            // Movemos el archivo a la ruta final
            if(move_uploaded_file($temp_archivo, $ruta_final)) {
                echo "Exito al mover el archivo.";
                $ruta_fin = substr($ruta_final,2);
            } else {
                echo "Error al mover el archivo.";
            }

            echo "Imagen subida y ruta guardada en la base de datos.";
        } else {
            echo "No se ha seleccionado ninguna imagen.";
        }

        if( isset($_POST['idusuario'])){
                
            $datos = array(
                "foto_usuario" => $ruta_fin,
                "idusuario" => $_POST['idusuario']
            );    
    
            $respuesta = $userController->ModificarUsersController($datos );
    
            if($respuesta['state'] == true ) {
                echo "Registro Editado";
                
            
                header("Location: /Literagiando/Views/UserCard/perfil.php");
                exit; // Add exit after header to stop script execution
            }
        }else{
            $mensaje = "formulario incompleto form: " . $mensaje ;
            // Imprimir el script de JavaScript que envía el mensaje a la consola
            echo "<script>console.log('$mensaje');</script>";
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

                $miDisenoHTML1 = '<!DOCTYPE html>
                    <html lang="es">en">       
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Recuperar Cuenta</title>
                            <style>
                                body {
                                    font-family: Source Serif Pro, sans-serif;
                                    background-color: #f2f2f2;
                                }
                        
                                .container {
                                    max-width: 600px;
                                    margin: 0 auto;
                                    padding: 20px;
                                    background-color: #fff;
                                    border-radius: 5px;
                                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                                }
                        
                                .header {
                                    background-color: #EB8600;
                                    color: #fff;
                                    text-align: center;
                                    padding: 20px;
                                }
                        
                                .content {
                                    padding: 20px;
                                }
                        
                                .footer {
                                    text-align: center;
                                    padding-top: 20px;
                                }
                            </style>
                        </head>
                        
                        <body>
                            <div class="container">
                                <div class="header">
                                    <h1>Registro de Cuenta</h1>
                                </div>
                                <div class="content">
                                    <p>Estimado/a Usuario,</p>
                                    <p>Recibes este correo porque registraste tu cuenta en Literagiando</p>
                                    <p>Si no solicitaste el registro de cuenta o no reconoces esta solicitud, te recomendamos que ignores este correo electrónico y tomes medidas adicionales para proteger tu cuenta. </p>
                                    </div>
                                <div class="footer">
                                    <p>Gracias por confiar en Literagiando.</p>
                                </div>
                            </div>
                        </body>
                </html>';
                // Correo
                $to1 =  $_POST['correo_usuario'];
                $subject1 = "Literagiando - Registro de Cuenta";
                $headers1 = "Content-type:text/html;charset=UTF-8" . "\r\n";
                $message1 = $miDisenoHTML1;

                    $mail = mail($to1,$subject1,$message1,$headers1);
                    if ($mail) {
                        echo "<script language='javascript'>
                            alert('Mensaje enviado, muchas gracias por registrarte.');window.location= '/Literagiando/Views/Home/index.php'";
                        //echo "Correo enviado con éxito";
                    } else {
                        echo $mail;
                        echo "<script language='javascript'>
                        window.location= '/Literagiando/Views/Home/index.php'";
                    }
            }else{
                echo "<script language='javascript'>
                            alert('Error en los datos intentelo de nuevo.');window.history.go(-1);</script>";
            }          

        }

    }

?>