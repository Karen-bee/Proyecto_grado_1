<?php
require_once (__DIR__ . '../../../../App/Controllers/HomeController.php');
$homeController = new HomeController();

//$sobre_nosotros = $homeController->ObtenerProfesoresController();
//if($sobre_nosotros['state']==true){$profesores=$sobre_nosotros['profesores'];}

$sobre_nosotros = $homeController->ObtenerSobre_nosotrosController();

if($sobre_nosotros['state'] === true){
  $sobre_nosotros = $sobre_nosotros['sobre_nosotros'][0];
}

?>