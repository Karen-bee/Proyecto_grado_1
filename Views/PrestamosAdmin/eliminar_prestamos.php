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
// Verificar si se proporciona la ID de préstamo en la URL
if (isset($_GET['id'])) {
	$id_prestamo = $_GET['id'];

	// Obtener los datos actuales del préstamo
	$query = "SELECT 
			prestamos.id_prestamo, 
			prestamos.fecha_prestamo, 
			prestamos.fecha_devolucion, 
			prestamos.estado,
			u.id_usuario,
			u.identificacion AS identificacion,
			u.usuario AS usuario,
			u.nombre_completo AS nombre_completo,
			u.correo AS correo,
			libros1.titulo AS libro_1, 
			libros2.titulo AS libro_2, 
			libros3.titulo AS libro_3,
			permisos.permiso
		FROM 
			prestamos
		LEFT JOIN 
			usuario u ON prestamos.id_usuario = u.id_usuario
		LEFT JOIN 
			libros libros1 ON prestamos.id_libro_1 = libros1.id_libro
		LEFT JOIN 
			libros libros2 ON prestamos.id_libro_2 = libros2.id_libro
		LEFT JOIN 
			libros libros3 ON prestamos.id_libro_3 = libros3.id_libro
		LEFT JOIN 
			permisos ON prestamos.permiso = permisos.id_permiso
		WHERE 
			prestamos.id_prestamo = '$id_prestamo'";
	$resultado = mysqli_query($conexion, $query);
	if (mysqli_num_rows($resultado) > 0) {
		$fila = mysqli_fetch_assoc($resultado);
		?>

		<div class="product-tab-area section-space-y-axis">
			<div class="containerr">
				<div class="roww">
					<div class="col-lg-11 pt-5" style="margin: 0 auto;">
						<div class="login-form mb-10">
							<div class="row">
								<form method="post"
									action="confirmar_eliminar_prestamos.php?id=<?php echo $fila['id_prestamo']; ?>">
									<input type="hidden" name="id_prestamo" value="<?php echo $fila['id_prestamo']; ?>" />
									<center>
										<h2 class="login-title-1 pt-5">
											<hr class="style-three mb-5" />
										</h2>
										<div class="row">
											<div class="error-404-content">
												<h1 class="title mb-7" style="line-height: 40px;">
													¡Eliminación de préstamo!
												</h1>
												<h2 class="sub-title mb-9">
													Esta por eliminar el préstamo perteneciente:
													<br />
													al usuario: <span>
														<?php echo $fila['usuario'] ?>
													</span>.
													<div><br /></div>
													Tenga en cuenta que una vez realizada esta
													<br />
													acción, la misma no podrá ser deshecha.
												</h2>
											</div>
											<div class="row row-cols mb-5">
												<div class="col mb-3">
													<button class="btn btn-custom-size lg-size btn-primary" type="submit"
														name="eliminar" style="color: white; text-shadow: 1px 1px 2px #060606;">
														Continuar
													</button>
												</div>
												<div class="col">
													<a class="btn btn-custom-size lg-size btn-primary"
														href="index.php"
														style="color: white; text-shadow: 1px 1px 2px #060606;">
														Cancelar
													</a>
												</div>
											</div>
										</div>
										<h2 class="login-title-1 mb-5">
											<hr class="style-three mb-8" />
										</h2>
									</center>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	} else {
		echo '
								<script>
									Swal.fire({
										title: "PRÉSTAMO NO ENCONTRADO!",
										icon: "error",
										html: "Parece que hubo un error al seleccionar al prestamo, verifique la existencia del prestamo e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="index.php";
									});
								</script>';
	}
} else {
	echo '
								<script>
									Swal.fire({
										title: "PRÉSTAMO SIN ESPECIFICAR!",
										icon: "error",
										html: "Parece que hubo un error con el prestamo seleccionado, verifique la selección del prestamo e inténtelo de nuevo.",
										allowOutsideClick: false,
										showCloseButton: false,
										showCancelButton: false,
										focusConfirm: false,
										confirmButtonColor: "#d51a1a",
										confirmButtonText: "OK",
									}).then(function(){
										window.location="index.php";
									});
								</script>';
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