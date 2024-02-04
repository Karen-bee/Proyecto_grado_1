<?php


require_once (__DIR__ .'/../../../App/Controllers/BlogController.php');
$blogController = new BlogController();
$blogCon= new BlogController();

$blogs = $blogController->ObtenerBlogsController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idblog = isset($_POST['idblog']) ? $_POST['idblog'] : null;

} else {
    $idblog = isset($_GET['idblog']) ? $_GET['idblog'] : null;
}

if ($idblog !== null) {

    $blog = $blogCon->ObtenerIdBlogController($idblog);
    
} else {
    $blog = $blogCon->ObtenerUltimaBlogController();
}



$timestamp = strtotime($blog['resultado'][0]['fecha_publicacion']);
$fechaFormateada = strftime('%A , %e de %B %Y', $timestamp);
$fechaFormateada = strtr($fechaFormateada, array_merge($meses, $dias));




?>

<?php include '../header.php'; ?>


<title>Blog</title>
<div class="body_content">
    <div class="leftPanel">
        <img class="img" src="/Literagiando/Resources/img/blog.png" alt="image1">
        <h6>Publicado: <?php echo $fechaFormateada?></h6>
        <h1 id="titulo"><?php echo $blog['resultado'][0]['titulo_blog'] ?></h1>
        <span><?php echo nl2br($blog['resultado'][0]['detalle_blog']); ?></span>
        <img class="img" src="<?php echo $blog['resultado'][0]['imagen_blog'] ?>" alt="img">
        <h5><?php echo $blog['resultado'][0]['subtitulo_blog'] ?></h5>


    </div>
    <div class="rightPanel">
        <div class="separacionBlogs">
            <a href="blogs.php" class="btnMostrarBlogs">VER MAS BLOGS</a>
        </div>
        <?php
            $contador = 0;
            if ($blogs['state'] === true) {
                // Ordenar las blogs por fecha_publicacion de forma descendente
                usort($blogs['blogs'], function($a, $b) {
                    return strtotime($b['fecha_publicacion']) - strtotime($a['fecha_publicacion']);
                });
                foreach ($blogs['blogs'] as $row) {
                    ?>
                    <a class="cardBlog" href="?idblog=<?php echo $row['idblog']; ?>">
                        <img class="img" src="<?php echo $row['imagen_blog'] ?>" alt="Imagen">
                        <span class="tipoBlog"><?php echo $row['tipoBlog'] ?></span>
                        <strong><?php echo $row['titulo_blog'] ?></strong>
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