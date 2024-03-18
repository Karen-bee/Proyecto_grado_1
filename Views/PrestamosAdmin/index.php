<?php
$vistaActual = 11;

include '../Layouts/header.php';

include('../../literagiando59/includes/includes.php');
include('../../literagiando59/css.php');

?>


<title>Administrador de Libros</title>

<section class="home-section">

<div class="container-eventos">

<div class="content-evento">
    <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
    <div class="col-4"><h1 id="title-eventos">Administrador de Libros </h1></div>
    <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
</div>

    <div class="container">
        <div class="pt-8">
            <br /><br />
        </div>
        <ul class="nav product-tab-navv mb-1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="active tab-btn" id="tabla_prestamo-tab" data-bs-toggle="tab" href="#tabla_prestamo" role="tab"
                    aria-controls="tabla_prestamo" aria-selected="false">
                    Información principal
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="tab-btn" id="tabla_prestamo_2-tab" data-bs-toggle="tab" href="#tabla_prestamo_2" role="tab"
                    aria-controls="tabla_prestamo_2" aria-selected="true">
                    Información secundaria
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="tab-btn" id="tabla_prestamo_3-tab" data-bs-toggle="tab" href="#tabla_prestamo_3" role="tab"
                    aria-controls="tabla_prestamo_3" aria-selected="true">
                    Mas información
                </a>
            </li>
        </ul>
        <div class="tab-content product-tab-content scrollspy-example position-relative mt-3 overflow-auto">
            <div class="tab-pane fade show active" id="tabla_prestamo" role="tabpanel"
                aria-labelledby="tabla_prestamo-tab">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-3"
                        style="text-align: center; vertical-align: middle; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th scope="col">Código préstamo</th>
                                <th scope="col">Código usuario</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">Identificación de usuario</th>
                                <th scope="col">Correo electrónico</th>
                                <th scope="col">Administrar</th>
                            </tr>
                            <?php
                            // Función para mostrar "Este campo se encuentra vacío o sin libro" si el valor es nulo
                            function no_hay_datos($resultado_2)
                            {
                                return($resultado_2 === null) ? "Sin libro" : $resultado_2;
                            }
                            // Consultar la tabla de préstamos
                            $query = "SELECT prestamos.id_prestamo, prestamos.fecha_prestamo, prestamos.fecha_devolucion,
	usuario.id_usuario,usuario.usuario,usuario.nombre_completo,usuario.foto_perfil,usuario.identificacion,usuario.correo,
	libros_1.titulo AS libro_1, libros_2.titulo AS libro_2, libros_3.titulo AS libro_3,
	permisos.permiso, estados.estado
	FROM prestamos
	LEFT JOIN usuario ON prestamos.id_usuario =usuario.id_usuario
	LEFT JOIN libros AS libros_1 ON prestamos.id_libro_1 = libros_1.id_libro
	LEFT JOIN libros AS libros_2 ON prestamos.id_libro_2 = libros_2.id_libro
	LEFT JOIN libros AS libros_3 ON prestamos.id_libro_3 = libros_3.id_libro
	LEFT JOIN estados ON prestamos.estado = estados.id_estado
	LEFT JOIN permisos ON prestamos.permiso = permisos.id_permiso";
                            $resultado = mysqli_query($conexion, $query);
                            if ($resultado !== false) {
                                if ($resultado->num_rows > 0) {
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        echo ' <tr> <td>' . $fila["id_prestamo"] . '</td> <td> 	' . $fila["id_usuario"] . '</td><td style="width: 250px; align-items: center;"> 	' . $fila["nombre_completo"] . ' </td> <td style="width: 210px; align-items: center;"> 	' . $fila["identificacion"] . ' </td> <td style="width: 260px; align-items: center;"> 	' . $fila["correo"] . ' </td> <td> 	<a class="btn btn-dark btn-primary-hover" data-tippy="Editar préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_prestamos.php?id=' . $fila['id_prestamo'] . '"> 		<i class="fa fa-edit" aria-hidden="true"></i> 	</a> 	<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_prestamos.php?id=' . $fila['id_prestamo'] . '"> 		<i class="fa fa-trash" aria-hidden="true"></i> 	</a> </td> </tr>';
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="tabla_prestamo_2" role="tabpanel" aria-labelledby="tabla_prestamo_2-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-3"
                            style="text-align: center; vertical-align: middle; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th scope="col">Código préstamo</th>
                                    <th scope="col">Código usuario</th>
                                    <th scope="col">Título del primer libro</th>
                                    <th scope="col">Título del segundo libro</th>
                                    <th scope="col">Título del tercer libro</th>
                                    <th scope="col">Administrar</th>
                                </tr>
                                <?php
                                $resultado = mysqli_query($conexion, $query);
                                if ($resultado->num_rows > 0) {
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        echo ' <tr> <td>' . $fila["id_prestamo"] . '</td> <td> 	' . $fila["id_usuario"] . ' </td> <td style="width: 250px; align-items: center;"> 	' . no_hay_datos($fila['libro_1']) . ' </td> <td style="width: 250px; align-items: center;"> 	' . no_hay_datos($fila['libro_2']) . ' </td> <td style="width: 250px; align-items: center;"> 	' . no_hay_datos($fila['libro_3']) . ' </td> <td> 	<a class="btn btn-dark btn-primary-hover" data-tippy="Editar préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_prestamos.php?id=' . $fila['id_prestamo'] . '"> 		<i class="fa fa-edit" aria-hidden="true"></i> 	</a> 	<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_prestamos.php?id=' . $fila['id_prestamo'] . '"> 		<i class="fa fa-trash" aria-hidden="true"></i> 	</a> </td> </tr>';
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="tabla_prestamo_3" role="tabpanel" aria-labelledby="tabla_prestamo_3-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-3"
                            style="text-align: center; vertical-align: middle; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <th scope="col">Código préstamo</th>
                                    <th scope="col">Código usuario</th>
                                    <th scope="col">Fecha del préstamo</th>
                                    <th scope="col">Fecha de devolución</th>
                                    <th scope="col">Estado del préstamo</th>
                                    <th scope="col">Permiso para préstamo</th>
                                    <th scope="col">Administrar</th>
                                </tr>
                                <?php
                                $resultado = mysqli_query($conexion, $query);
                                if ($resultado->num_rows > 0) {
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        echo ' <tr> <td>' . $fila["id_prestamo"] . '</td> <td> 	' . $fila["id_usuario"] . ' </td> <td style="width: 180px; align-items: center;"> 	' . $fila["fecha_prestamo"] . ' </td> <td style="width: 180px; align-items: center;"> 	' . $fila["fecha_devolucion"] . ' </td> <td style="width: 180px; align-items: center;"> 	' . $fila["estado"] . ' </td> <td style="width: 200px; align-items: center;"> 	' . $fila["permiso"] . ' </td> <td> 	<a class="btn btn-dark btn-primary-hover" data-tippy="Editar préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" href="editar_prestamos.php?id=' . $fila['id_prestamo'] . '"> 		<i class="fa fa-edit" aria-hidden="true"></i> 	</a> 	<a class="btn btn-dark btn-primary-hover" data-tippy="Eliminar préstamo" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" style="background-color: #ea0202;" href="eliminar_prestamos.php?id=' . $fila['id_prestamo'] . '"> 		<i class="fa fa-trash" aria-hidden="true"></i> 	</a> </td> </tr>';
                                    }
                                } else {
                                    echo ' <script> Swal.fire({ 	title: "LISTADO DE PRÉSTAMOS, NO DISPONIBLE!", 	icon: "warning", 	html: "La tabla SQL: <font color=#d51a1a>préstamos</font>, se encuentra vacía en este momento.", 	allowOutsideClick: false, 	showCloseButton: false, 	showCancelButton: false, 	focusConfirm: false, 	confirmButtonColor: "#ff7800", 	confirmButtonText: "OK", }); </script>';
                                }
                            } else {
                                echo ' <script> Swal.fire({ 	title: "ERROR AL CARGAR EL LISTADO DE PRÉSTAMOS DISPONIBLES!", 	icon: "error", 	html: "La tabla SQL: <font color=#d51a1a>préstamos</font>, no esta siendo especificada o es posible que haya un error en la consulta.", 	allowOutsideClick: false, 	showCloseButton: false, 	showCancelButton: false, 	focusConfirm: false, 	confirmButtonColor: "#d51a1a", 	confirmButtonText: "OK", }); </script>
 			';
                            }

                            // Cerramos la conexión con la base de datos
                            mysqli_close($conexion);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include("../../literagiando59/script.php"); ?>
</div>

</section>



<?php include '../Layouts/footer.php'; ?>