<?php
$vistaActual = 12;

include '../Layouts/header.php';
include('../../literagiando59/includes/includes.php');
include('../../literagiando59/css.php');

?>

<section class="home-section">
	<div class="container-eventos">
		<?php
		if (isset($_GET['id'])) {
			$id_libro = $_GET['id'];

			// Comprobar si el formulario se ha enviado
			if (isset($_POST['eliminar'])) {
				$imagenAnterior = $_POST["imagenAnterior"];

				// Eliminar la imagen anterior si existe
				if (file_exists($imagenAnterior)) {
					unlink($imagenAnterior);
				}

				// Eliminar el libro
				$query = "DELETE FROM libros WHERE id_libro='$id_libro'";
				if (mysqli_query($conexion, $query)) {
					echo '';
				} else {
					echo '
								<script>
									Swal.fire({
										title: "ELIMINACIÓN ERRONEA!",
										icon: "error",
										html: "Parece que hubo un error. El libro que está intentando eliminar, actualmente se encuentra prestado.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="index.php";
									});
								</script>';
					ob_end_flush();
					exit;
				}
			}

			// Obtener los datos actuales del libro
			$query = "SELECT * FROM libros WHERE id_libro = '$id_libro'";
			$resultado = mysqli_query($conexion, $query);
			if (mysqli_num_rows($resultado) > 0) {
				$fila = mysqli_fetch_assoc($resultado);
				echo '
								<script>
									Swal.fire({
										title: "LIBRO NO ENCONTRADO!",
										icon: "error",
										html: "Parece que hubo un error con la selección del libro, verifique la existencia del libro e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="index.php";
									});
								</script>';
			} else {
				echo '
								<script>
									Swal.fire({
										title: "ELIMINACIÓN EXITOSA!",
										icon: "success",
										html: "El libro ha sido eliminado exitosamente. Use el botón a continuación para volver al listado de libros.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#219f16",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="index.php";
									});
								</script>';
			}
		} else {
			echo '
								<script>
									Swal.fire({
										title: "LIBRO SIN ESPECIFICAR!",
										icon: "error",
										html: "Parece que hubo un error con el libro seleccionado, verifique la selección del libro e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "Aceptar",
									}).then(function(){
										window.location="index.php";
									});
								</script>';
			ob_end_flush();
		}

		// Cerramos la conexión con la base de datos
		mysqli_close($conexion);

		include("../../literagiando59/script.php");

		ob_end_flush();
		?>

	</div>

</section>



<?php include '../Layouts/footer.php'; ?>