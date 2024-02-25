<?php
include '../header.php';


require_once (__DIR__ .'/../../../App/Controllers/EventoController.php');
$eventoController = new EventoController();
$eventoCon= new EventoController();

$eventos = $eventoController->ObtenerEventosController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idevento = isset($_POST['idevento']) ? $_POST['idevento'] : null;

} else {
    $idevento = isset($_GET['idevento']) ? $_GET['idevento'] : null;
}

if ($idevento !== null) {

    $evento = $eventoCon->ObtenerIdEventoController($idevento);

    $evento = $evento['resultado'];

    
    
    
} else {
    $evento = $eventoCon->ObtenerIdEventoController($eventos['eventos'][0]['ideventos']);
    $evento = $evento['resultado'];
}



$timestamp = strtotime($evento[0]['fecha_evento']);

date_default_timezone_set('UTC');
$hora = date(' H:i', $timestamp + 3600);
$fechaFormateada = strftime('%A , %e de %B %Y', $timestamp);
$fechaFormateada = gmdate('l, j \x F Y', $timestamp);
$fechaFormateada = str_replace('x', 'de', $fechaFormateada);
$fechaFormateada = strtr($fechaFormateada, array_merge($meses, $dias));






if (isset($_POST["idEvento"])) {

    if(isset($idrolusuario)){
        inscribirEvento($row['idusuario'], $_POST["idEvento"]);
    }else{
        $mensaje = "No has iniciado sesión. Por favor, inicia sesión para acceder.";
        echo '<script>alert("' . htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') . '");</script>';
        //echo '<script>window.location.href = "/Literagiando/Views/Home/index.php";</script>';
    }
}   

?>



<title>Evento</title>


<h1 id="noticias-title">bienvenido a <p>Eventos Literagiando</p></h1>
    <div class="img-eventos">
        <div class="capa-opacity"></div>
    </div>

<div class="separacionEventos">
    <h1 id="titulo"><?php echo $evento[0]['titulo_evento'] ?>
</div>
<div class="body_content">

    <div class="leftPanel">
        <img class="img-evento" src="<?php echo $evento[0]['imagen_eventos'] ?>" alt="img">
        <h5><?php echo $evento[0]['subtitulo_evento'] ?></h5>
        <span><?php echo nl2br($evento[0]['detalle_evento']); ?></span>

        <div>
            <form action="evento.php" method="POST">
                        <input type="hidden" name="idEvento" value="<?php echo $evento[0]['ideventos']; ?>">
                        <input type="hidden" name="idusuario" value="<?php echo $row['idusuario']; ?>">
                        <input type="hidden" name="accion" value="inscribirEvento">
                        <button type="submit" class="btnIns">Inscribirme</button>
             </form>
        </div>
    
    
    </div>

    <div class="rightPanel">
        <div>
            <h1><?php echo $fechaFormateada?></h1>
        </div>
        <div class="separacionEventoos">
            <h2><i class="bx bx-time"></i><?php echo $hora?></h2>
        </div>
        <div >
            <h1>Lugar del Evento</h1>
            <h3><i class="bx bx-map-pin"></i><?php echo $evento[0]['lugar']?>
        </div>
        <div >
            <h1>Tipo de Acceso</h1>
            <h3><i class="bx bx-check-circle"></i><?php echo $evento[0]['tipoevento']?>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>