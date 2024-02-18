<?php


require_once (__DIR__ .'/../../../App/Controllers/NoticiaController.php');
$noticiaController = new NoticiaController();
$noticiaCon= new NoticiaController();

$noticias = $noticiaController->ObtenerNoticiasController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idnoticia = isset($_POST['idnoticia']) ? $_POST['idnoticia'] : null;

} else {
    $idnoticia = isset($_GET['idnoticia']) ? $_GET['idnoticia'] : null;
}

if ($idnoticia !== null) {

    $noticia = $noticiaCon->ObtenerIdNoticiaController($idnoticia);
    
} else {
    $noticia = $noticiaCon->ObtenerUltimaNoticiaController();
}



$timestamp = strtotime($noticia['resultado'][0]['fecha_publicacion']);
$fechaFormateada = strftime('%A , %e de %B %Y', $timestamp);
$fechaFormateada = strtr($fechaFormateada, array_merge($meses, $dias));



?>

<?php include '../header.php'; ?>


<title>Noticia</title>
<div class="body_content">
    <div class="leftPanel">
        <span class="tipoNoticia"><?php echo $noticia['resultado'][0]['tipoNoticia'] ?></span>
        <h1 id="titulo"><?php echo $noticia['resultado'][0]['nombre_Noticia'] ?>
        <h6>Publicado: <?php echo $fechaFormateada?></h6>
        <img class="img" src="<?php echo $noticia['resultado'][0]['imagen_card'] ?>" alt="img">
        <h5><?php echo $noticia['resultado'][0]['subtitulo_noticias'] ?></h5>
        <span><?php echo nl2br($noticia['resultado'][0]['detalle_noticias']); ?></span>

    </div>
    <div class="rightPanel">
        <div class="separacionNoticias">
            <a href="noticias.php" class="btnMostrarNoticias">VER MAS NOTICIAS</a>
        </div>
        <?php
            $contador = 0;
            if ($noticias['state'] === true) {
                // Ordenar las noticias por fecha_publicacion de forma descendente
                usort($noticias['noticias'], function($a, $b) {
                    return strtotime($b['fecha_publicacion']) - strtotime($a['fecha_publicacion']);
                });
                foreach ($noticias['noticias'] as $row) {
                    ?>
                    <a class="cardNoticia" href="?idnoticia=<?php echo $row['idnoticias']; ?>">
                        <img class="img" src="<?php echo $row['imagen_card'] ?>" alt="Imagen">
                        <span class="tipoNoticia"><?php echo $row['tipoNoticia'] ?></span>
                        <strong><?php echo $row['nombre_Noticia'] ?></strong>
                    </a>
                    <?php
                    $contador += 1;
                    if ($contador === 3) {
                        break;
                    }
                }
            }
        ?>
    </div>
</div>

<?php include '../footer.php'; ?>