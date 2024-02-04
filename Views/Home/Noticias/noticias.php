<?php

require_once (__DIR__ .'/../../../App/Controllers/NoticiaController.php');
$noticiaController = new NoticiaController();

$noticias = $noticiaController->ObtenerNoticiasController();
$noticiasMostrar = array();


$contadorMax = isset($_GET['contador']) ? $_GET['contador'] : 3;

$tipoNoticiaSelected = isset($_GET['tipoNoticiaSelected']) ? $_GET['tipoNoticiaSelected'] : null;

if ($tipoNoticiaSelected !== null) {

    $filtrar = true;
    
} else {
    $filtrar = false;
}


?>
<?php include '../header.php'; ?>

<title>Noticias</title>

<h1 id="noticias-title">bienvenido a <p>nuestras noticias</p></h1>
    <div class="img-noticias">
    <div class="capa-opacity"></div>
    </div>
    
<div class="container-nav-noticias">
    <ul>
        <li><a href="?"><strong>Todos</strong></a></li>
        <?php
        $tiposNoticia = array(); // Array para almacenar tipos de noticia únicos
        

        foreach ($noticias['noticias'] as $row) {
            $tipoNoticia = $row['tipoNoticia'];

            // Verificar si el tipo de noticia ya está en el array
            if (!in_array($tipoNoticia, $tiposNoticia)) {
                $tiposNoticia[] = $tipoNoticia; // Agregar tipo de noticia al array
                ?>
                <li><a href="?<?php echo http_build_query(array_merge($_GET, array('tipoNoticiaSelected' => $row['tipoNoticia']))); ?>"><strong><?php echo $tipoNoticia ?></strong></a></li>
                <?php
            }

            if($filtrar){
                if ($tipoNoticia === $tipoNoticiaSelected){
                    $noticiasMostrar[] = $row;
                }
            }
        }
        if($filtrar){
            $noticias['noticias'] = $noticiasMostrar;
        }
        ?>
    </ul>

    </div>
    <hr id="line-noticias">

    <div class="content-slide-noticias">

    <?php
            $contador = 0;
            if ($noticias['state'] === true) {
                // Ordenar las noticias por fecha_publicacion de forma descendente
                usort($noticias['noticias'], function($a, $b) {
                    return strtotime($b['fecha_publicacion']) - strtotime($a['fecha_publicacion']);
                });
                foreach ($noticias['noticias'] as $row) {
                    ?>
                    <div class="card text-bg-dark">
                        <img class="card-img" src="<?php echo $row['imagen_card'] ?>" alt="Imagen">
                        <div class="card-img-overlay">
                            <h5 class="card-title"><strong><?php echo $row['tipoNoticia'] ?></strong></h5>
                            <h6 class="card-title"><strong><?php echo $row['nombre_Noticia'] ?></strong></h6>

                            <a href="noticia.php?idnoticia=<?php echo $row['idnoticias']; ?>"><strong>Ver Más</strong></a>
                            
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