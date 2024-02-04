<?php

require_once (__DIR__ .'/../../../App/Controllers/BlogController.php');
$blogController = new BlogController();

$blogs = $blogController->ObtenerBlogsController();

$contadorMax = isset($_GET['contador']) ? $_GET['contador'] : 3;


?>


<?php include '../header.php'; ?>

<title>Blog</title>    

<div id="content-blog">
<strong>Bienvenidos a nuestro</strong>     
<img src="/Literagiando/Resources/img/blog.png" alt="">
   
</div>
<div class="title-blog-2">
    <strong>Catalogo de blogs</strong>
</div>

<div class="content-slide-blog">
   
        <?php
            $contador = 0;
            if ($blogs['state'] === true) {
                // Ordenar las blogs por fecha_publicacion de forma descendente
                usort($blogs['blogs'], function($a, $b) {
                    return strtotime($b['fecha_publicacion']) - strtotime($a['fecha_publicacion']);
                });
                foreach ($blogs['blogs'] as $row) {
                    ?>
                    <div class="card text-bg-dark">
                        <img class="card-img" src="<?php echo $row['imagen_blog'] ?>" alt="Imagen">
                        <div class="card-img-overlay">
                            <h5 class="card-title"><strong><?php echo $row['titulo_blog'] ?></strong></h5>
                            <a href="blog.php?idblog=<?php echo $row['idblog']; ?>"><strong>Saber Más</strong></a>
                        </div>
                     </div>
                    <?php
                    $contador += 1;
                    if ($contador >= $contadorMax) {
                        break;
                    }
                }
            }
        ?>

</div>
<div class="button-ver">
    <a href="?<?php echo http_build_query(array_merge($_GET, array('contador' => $contadorMax + 3))); ?>"><strong>Cargar Más</strong></a>

</div>

<?php include '../footer.php'; ?>