
<?php

    //definimos constantes de conexión
    define('LOCAL_PATH','http://localhost:{3000}/{Literagiando}/');
    define('DB_HOST','127.0.0.1');
    define('DB_PORT','3306');
    define('DB_DATABASE','literagiando');
    define('DB_USER','root');
    define('DB_PASS','');

    define('CHARSET','utf8');

    $meses = array(
        'January' => 'enero',
        'February' => 'febrero',
        'March' => 'marzo',
        'April' => 'abril',
        'May' => 'mayo',
        'June' => 'junio',
        'July' => 'julio',
        'August' => 'agosto',
        'September' => 'septiembre',
        'October' => 'octubre',
        'November' => 'noviembre',
        'December' => 'diciembre'
    );
    
    $dias = array(
        'Monday' => 'lunes',
        'Tuesday' => 'martes',
        'Wednesday' => 'miércoles',
        'Thursday' => 'jueves',
        'Friday' => 'viernes',
        'Saturday' => 'sábado',
        'Sunday' => 'domingo'
    );

?>