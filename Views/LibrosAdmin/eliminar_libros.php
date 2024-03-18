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
			$query = "SELECT * FROM libros WHERE id_libro = '$id_libro'";
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
											action="confirmar_eliminar_libros.php?id=<?php echo $fila['id_libro']; ?>">
											<input type="hidden" name="id_libro" value="<?php echo $fila['id_libro']; ?>" />
											<input type="hidden" name="imagenAnterior"
												value="../recursos/img/portadas/<?php echo $fila['portada']; ?>">
											<center>
												<h2 class="login-title-1 pt-5">
													<hr class="style-three mb-5" />
												</h2>
												<div class="row">
													<div class="error-404-content">
														<h1 class="title mb-7" style="line-height: 40px;"> ¡Eliminación de
															libro! </h1>
														<h2 class="sub-title mb-9"> Esta por eliminar el libro titulado: <br />
															<span>
																<?php echo $fila['titulo'] ?>
															</span>. <div><br /></div> Tenga en cuenta que una vez realizada
															esta <br /> acción, la misma no podrá ser deshecha.
														</h2>
													</div>
													<div class="row row-cols mb-5">
														<div class="col mb-3"> <button
																class="btn btn-custom-size lg-size btn-primary" type="submit"
																name="eliminar"
																style="color: white; text-shadow: 1px 1px 2px #060606;">
																Continuar </button> </div>
														<div class="col"> <a class="btn btn-custom-size lg-size btn-primary"
																href="index.php"
																style="color: white; text-shadow: 1px 1px 2px #060606;">
																Cancelar </a> </div>
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
				echo ' <script> Swal.fire({ title: "LIBRO NO ENCONTRADO!", icon: "error", html: "Parece que hubo un error al seleccionar al libro, verifique la existencia del libro e inténtelo de nuevo.", allowOutsideClick: false, showCloseButton: false, showCancelButton: false, focusConfirm: false, confirmButtonColor: "#d51a1a", confirmButtonText: "Aceptar", }).then(function(){ window.location="index.php"; }); </script>';
			}
		} else {
			echo ' <script> Swal.fire({ title: "LIBRO SIN ESPECIFICAR!", icon: "error", html: "Parece que hubo un error con el libro seleccionado, verifique la selección del libro e inténtelo de nuevo.", allowOutsideClick: false, showCloseButton: false, showCancelButton: false, focusConfirm: false, confirmButtonColor: "#d51a1a", confirmButtonText: "Aceptar", }).then(function(){ window.location="index.php"; }); </script>';
		}

		// Cerramos la conexión con la base de datos
		mysqli_close($conexion);
		?>
	</div>

	<!-- .Final -->
	<?php

	include("../../literagiando59/script.php");

	ob_end_flush();
	?>

	</div>

</section>



<?php include '../Layouts/footer.php'; ?>