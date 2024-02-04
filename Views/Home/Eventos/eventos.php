<?php 
include '../header.php'; 

require_once (__DIR__ . '/../../../App/Controllers/EventoController.php');
$eventoController = new EventoController();
$eventos = $eventoController->ObtenerEventosController();
$tipoeventos = $eventoController->ObtenerSelectEventController();

if($eventos['state']==1){
    $eventos = $eventos['eventos'];
}

$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;

if($busqueda){

    $searchTerm = strtolower($busqueda); // Convertir el término de búsqueda a minúsculas
  
    $resultados = array_filter($eventos, function ($evento) use ($searchTerm) {
        $nombreEvento = strtolower($evento['titulo_evento']);
        $detalleEvento = strtolower($evento['detalle_evento']);
  
        return strpos($nombreEvento, $searchTerm) !== false || 
              strpos($detalleEvento, $searchTerm) !== false;
    });
  
    $eventos = $resultados;
}

$busquedaDesde = isset($_GET['busquedaDesde']) ? $_GET['busquedaDesde'] : null;
$busquedaHasta = isset($_GET['busquedaHasta']) ? $_GET['busquedaHasta'] : null;

if ($busquedaDesde && $busquedaHasta) {
    $resultados = array_filter($eventos, function ($evento) use ($busquedaDesde, $busquedaHasta) {
        $fechaEvento = $evento['fecha_evento'];

        return ($fechaEvento >= $busquedaDesde) && ($fechaEvento <= $busquedaHasta);
    });

    $eventos = $resultados;
}else{
    if ($busquedaDesde) {
        $resultados = array_filter($eventos, function ($evento) use ($busquedaDesde) {
            $fechaEvento = $evento['fecha_evento'];
    
            return ($fechaEvento >= $busquedaDesde);
        });
    
        $eventos = $resultados;
    }
    if ($busquedaHasta) {
        $resultados = array_filter($eventos, function ($evento) use ( $busquedaHasta) {
            $fechaEvento = $evento['fecha_evento'];
    
            return ($fechaEvento <= $busquedaHasta);
        });
    
        $eventos = $resultados;
    }
}



$filtroTipo = isset($_GET['filtroTipo']) ? $_GET['filtroTipo'] : null;


if($filtroTipo!=="--Seleccione--"){
    $resultados = array_filter($eventos, function ($evento) use ($filtroTipo) {
        $typeEvento = $evento['idtipo_evento'];
  
        return strpos($typeEvento, $filtroTipo) !== false ;
    });
  
    $eventos = $resultados;
}
    

?>

<title>Eventos</title>

<h1 id="eventos-title">bienvenido a <p>Eventos Literagiando</p></h1>
<div class="img-eventos">
    <div class="capa-opacity"></div>
</div>
    
<div class="content-search-eventos">
    <form action="" method="GET" class="d-flex" role="search">
    <input name="busqueda" class= "form-control" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit"><i class='bx bx-search'></i></button>
    </form>
</div> 


<div class="content-event">
    <div class="container text-center">
    <div class="row align-items-start">
        <div class="col-3">
            <div class="group-btn-filter">
                <strong>¿Cuándo se realizará?</strong>
                <form action="" method="GET" style="display: inline;">
                    <input type="date" name="busquedaDesde" id="busquedaDesde" class="form-control" placeholder="Desde">
                    <input type="date" name="busquedaHasta" id="busquedaHasta" class="form-control" placeholder="Hasta">

                    <button type="submit" class="btn btn-outline-warning">Filtrar</button>
                </form>
            </div>


            <div class="btn-select">
                <strong>¿Qué tipo de evento?</strong>
                <form action="" method="GET" style="display: inline;">
                    <select name="filtroTipo" class="form-select" aria-label="Default select example">
                        <option selected>--Seleccione--</option>
                        <?php foreach ($tipoeventos['tipoeventos'] as $row): ?>
                            <option value="<?php echo $row['idtipo_evento']; ?>"><?php echo $row['nombre_evento'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="btn btn-outline-warning">Filtrar</button>
                </form>
            </div>



            <!---- Calendario ------>


            <div class="container-calendar" hidden>
                <div class="calendar">
                    <div class="calendar-header">
                        <span class="month-picker" id="month-picker">May</span>
                        <div class="year-picker" id="year-picker">
                            <span class="year-change" id="pre-year">
                                <pre><</pre>
                            </span>
                            <span id="year">2023</span>
                            <span class="year-change" id="next-year">
                                <pre>></pre>
                            </span>
                        </div>
                    </div>

                    <div class="calendar-body">
                        <div class="calendar-week-days">
                            <div>DO</div>
                            <div>LU</div>
                            <div>MA</div>
                            <div>MI</div>
                            <div>JU</div>
                            <div>VI</div>
                            <div>SA</div>
                        </div>
                        <div class="calendar-days">

                        </div>
                    </div>
                    <div class="calendar-footer">

                    </div>
                    <div class="date-time-formate">
                        <div class="date-time-value">
                            <div class="time-formate">17:51:35</div>
                            <div class="date-formate">23 - Octubre - 2023</div>
                        </div>
                    </div>
                    <div class="month-list"></div>
                </div>
            </div>
        </div>

        <div class="col-9">
        <div class="card-group">
        <div class="row">
            
            <?php  if(count($eventos) > 0){foreach ($eventos as $evento) { 
                    ?>
                    <div class="card col-md-4">
                        <img src="<?php echo $evento['imagen_eventos'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><Strong><?php echo $evento['tipoevento'];?></Strong></h5>
                        <p class="card-text"><?php echo $evento['detalle_evento'];?></p>
                        </div>
                        <div class="card-footer">
                        <small class="text-body-secondary"><a href="/Literagiando/Views/Home/Eventos/evento.php?idevento=<?php echo $evento['ideventos'];?>">Ver Más <i class="bi bi-chevron-double-right"> </i></a></small>
                        </div>
                        
                    </div>
                    <?php }}else{echo '<h2>No hay eventos que mostrar</h2>'; } ?>

            </div>
            </div>
        </div>
    </div>
    </div>
</div>

<?php include '../footer.php'; ?>