<?php
ob_start();
$vistaActual = 11;
include '../Layouts/header.php';
include('../../literagiando59/includes/includes.php');
include('../../literagiando59/css.php');

?>


<title>Eliminar Prestamo</title>
<br>
<section class="home-section">



<?php
// Verificamos si se proporciono la ID del préstamo en la URL
if (isset($_GET['id'])) {
	$id_prestamo = $_GET['id'];

	// Comprobar si el formulario se ha enviado
	if (isset($_POST['eliminar'])) {

		// Eliminar el préstamo
		$query = "DELETE FROM prestamos WHERE id_prestamo='$id_prestamo'";
		if (mysqli_query($conexion, $query)) {
			echo '';
		} else {
			echo ' <script> 	Swal.fire({ 		title: "ELIMINACIÓN ERRONEO!", 		icon: "error", 		html: "Parece que hubo un error. El registro del préstamo que está intentando eliminar, está en uso.", 		allowOutsideClick: false, 		showCloseButton: false, 		showCancelButton: false, 		focusConfirm: false, 		confirmButtonColor: "#d51a1a", 		confirmButtonText: "Aceptar", 	}).then(function(){ 		window.location="index.php"; 	}); </script>';
		}
	}

	// Obtener los datos actuales del préstamo
	$query = "SELECT * FROM prestamos WHERE id_prestamo = '$id_prestamo'";
	$resultado = mysqli_query($conexion, $query);
	if (mysqli_num_rows($resultado) > 0) {
		$fila = mysqli_fetch_assoc($resultado);
		echo ' <script> 	Swal.fire({ 		title: "PRÉSTAMO NO ENCONTRADO!", 		icon: "error", 		html: "Parece que hubo un error con la selección del préstamo, verifique la existencia del préstamo e inténtelo de nuevo.", 		allowOutsideClick: false, 		showCloseButton: false, 		showCancelButton: false, 		focusConfirm: false, 		confirmButtonColor: "#d51a1a", 		confirmButtonText: "Aceptar", 	}).then(function(){ 		window.location="index.php"; 	}); </script>';
	} else {
		echo ' <script> 	Swal.fire({ 		title: "ELIMINACIÓN EXITOSA!", 		icon: "success", 		html: "El registro del préstamo ha sido eliminado exitosamente. Use el botón a continuación para volver al listado de prestamos.", 		allowOutsideClick: false, 		showCloseButton: false, 		showCancelButton: false, 		focusConfirm: false, 		confirmButtonColor: "#219f16", 		confirmButtonText: "Aceptar", 	}).then(function(){ 		window.location="index.php"; 	}); </script>';
	}
} else {
	echo ' <script> 	Swal.fire({ 		title: "REGISTRO SIN ESPECIFICAR!", 		icon: "error", 		html: "Parece que hubo un error con el registro del préstamo seleccionado, verifique la selección del registro e inténtelo de nuevo.", 		allowOutsideClick: false, 		showCloseButton: false, 		showCancelButton: false, 		focusConfirm: false, 		confirmButtonColor: "#d51a1a", 		confirmButtonText: "Aceptar", 	}).then(function(){ 		window.location="index.php"; 	}); </script>';
}

// Cerramos la conexión con la base de datos
mysqli_close($conexion);
include("../../literagiando59/script.php");
?>

<?php
ob_end_flush();
?>

</section>

<?php include '../Layouts/footer.php'; ?>