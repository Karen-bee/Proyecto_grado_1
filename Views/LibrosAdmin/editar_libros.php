<?php
ob_start();

$vistaActual = 12;

include '../Layouts/header.php';
include('../../literagiando59/includes/includes.php');
include('../../literagiando59/css.php');

?>


<title>Editor de Libros</title>
<br>
<section class="home-section">

	<?php


	// Verificar si se proporciona la ID de usuario en la URL
	if (isset($_GET['id'])) {
		$id_libro = $_GET['id'];

		// Obtener los datos actuales del libro
		$query = "SELECT * FROM libros WHERE id_libro = '$id_libro'";
		$resultado = mysqli_query($conexion, $query);
		if (mysqli_num_rows($resultado) > 0) {
			$fila = mysqli_fetch_assoc($resultado);
			?>

			<div class="container">
				<form method="post" action="editar_libros.php?id=<?php echo $fila['id_libro']; ?>"
					enctype="multipart/form-data">
					<div class="login-form mb-10">
						<h2 class="login-title-1 mb-2">
							<center>Formulario para editar libros registrados.
							</center>
						</h2>
						<div class="row">
							<div>
								<hr />
							</div>
							<div class="col-lg-12"><label> <i class="fa fa-text-width fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Titulo del libro</label><input id="titulo"
									class="form-control" type="text" name="titulo" value="<?php echo $fila['titulo']; ?>"
									autocomplete="off" placeholder="Ingrese el titulo del libro" title="" minlength="10"
									maxlength="100" required />
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12"><label> <i class="fa fa-address-card-o fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Autor del libro</label><input id="autor"
									class="form-control" type="text" name="autor" value="<?php echo $fila['autor']; ?>"
									autocomplete="off" placeholder="Ingrese el autor del libro" title="" minlength="6"
									maxlength="50" required />
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12"><label> <i class="fa fa-text-height fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Tema del libro</label><input id="tema"
									class="form-control" type="text" name="tema" value="<?php echo $fila['tema']; ?>"
									autocomplete="off" placeholder="Ingrese el tema del libro" title="" minlength="6"
									maxlength="50" required />
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12 mb-3"><label> <i class="fa fa-info-circle fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Descripción del libro</label><textarea
									class="form-control" name="descripcion" placeholder="Ingrese la descripción del libro"
									aria-label="With textarea" id="textarea_libro"
									required><?php echo $fila['descripcion']; ?></textarea>
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12"><label> <i class="fa fa-low-vision fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Condición de libro</label><input id="condicion"
									class="form-control" type="text" name="condicion_libro"
									value="<?php echo $fila['condicion_libro']; ?>" autocomplete="off"
									placeholder="Ingrese la condición del libro" title="" minlength="6" maxlength="50"
									required />
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12 mb-3"><label> <i class="fa fa-sort-numeric-desc fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Rango de edades del libro</label><select
									class="nice-select form-control myniceselect wide" name="edades" title="" tabindex="-1"
									required>
									<?php $edad_almacenada = $fila['edades'];
									$edades = json_decode(base_input_edades, true);
									foreach ($edades as $edad) {
										echo '<option data-display="' . $edad . '" value="' . $edad . '"';
										if ($edad == $edad_almacenada) {
											echo ' selected';
										}
										echo '>' . $edad . '</option>';
									} ?>
								</select>
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12"><label> <i class="fa fa-paint-brush fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Color representativo</label><input
									class="form-control form-control-lg" type="color" name="color"
									value="<?php echo $fila['color']; ?>" title="" minlength="4" maxlength="9" required />
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12 mb-3"><label> <i class="fa fa-paperclip fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Formato del libro</label><select
									class="nice-select form-control myniceselect wide" name="formato" title="" tabindex="-1"
									required>
									<option data-display="<?php echo $fila['formato'] ?>"
										value="<?php echo $fila['formato'] ?>">
										<?php echo $fila['formato'] ?>
									</option>
									<?php $formato = $fila['formato'];
									if ($formato == "Fisico") {
										echo '<option value="Digital">Digital</option>';
									} elseif ($formato == "Digital") {
										echo '<option value="Fisico">Fisico</option>';
									} ?>
								</select>
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12"><label> <i class="fa fa-link fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Enlace
									o URL del libro</label><input class="form-control" type="url" name="link"
									value="<?php echo $fila['link']; ?>" autocomplete="off"
									placeholder="Ingrese link del libro *https://*" title="" minlength="11" maxlength="270"
									required />
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12 mb-3"><label> <i class="fa fa-toggle-on fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Disponibilidad del libro</label><select
									class="nice-select form-control myniceselect wide" name="disponible" title="" tabindex="-1"
									required>
									<?php $disponible = $fila['disponible'];
									if ($disponible == 1) {
										$disponible = 'Disponible';
									} else {
										$disponible = 'Agotado';
									} ?>
									<option data-display="<?php echo $disponible; ?>" value="<?php echo $fila['disponible'] ?>">
										<?php echo $disponible; ?>
									</option>
									<?php if ($disponible == 'Agotado') {
										echo '<option value="1">Disponible</option>';
									} elseif ($disponible == 'Disponible') {
										echo '<option value="2">Agotado</option>';
									} ?>
								</select>
							</div>
							<div>
								<hr />
							</div>
							<div class="col-lg-12 mb-3"><label> <i class="fa fa-camera-retro fa-lg"
										aria-hidden="true"></i>&nbsp;&nbsp;Foto de portada del libro</label><input
									class="form-control form-control-lg" type="file" name="portada" title=""
									accept=".png, .jpg" /><input type="hidden" name="imagenAnterior"
									value="../recursos/img/portadas/<?php echo $fila['portada']; ?>" /><img
									src="../../literagiando59/recursos/img/portadas/<?php echo $fila['portada'] ?>"
									alt="Portada actual no disponible" width="200px" />
							</div>
							<div>
								<hr />
							</div>
							<center>
								<div class="row row-cols pt-3">
									<div class="col mb-3"> <button class="btn btn-custom-size lg-size btn-primary" type="submit"
											name="actualizar" style="color: white; text-shadow: 1px 1px 2px #060606;">
											Actualizar </button> </div>
									<div class="col"> <a class="btn btn-custom-size lg-size btn-primary" href="index.php"
											style="color: white; text-shadow: 1px 1px 2px #060606;"> Cancelar </a> </div>
								</div>
							</center>
						</div>
					</div>
				</form>
			</div>
			<?php
		} else {
			echo '<script>Swal.fire({		title: "ERROR AL EDITAR EL LIBRO!",		icon: "error",		html: "El libro que intenta editar, no existe. Use el botón a continuación para volver al listado de libros registrados.",		allowOutsideClick: false,		showCloseButton: false,		showCancelButton: false,		focusConfirm: false,		confirmButtonColor: "#d51a1a",		confirmButtonText: "ADMINITRAR LIBROS",	}).then(function(){		window.location="index.php";	});</script>';
		}


		// Comprobamos si el formulario se ha enviado.
		if (isset($_POST['actualizar'])) {
			// Recibimos y obtenemos los datos del formulario.
			$titulo = $_POST['titulo'];
			$autor = $_POST['autor'];
			$tema = $_POST['tema'];
			$descripcion = $_POST['descripcion'];
			$condicion_libro = $_POST['condicion_libro'];
			$edades = $_POST['edades'];
			$color = $_POST['color'];
			$formato = $_POST['formato'];
			$link = $_POST['link'];
			$portada = $_FILES["portada"]["name"];
			$portadatemp = $_FILES["portada"]["tmp_name"];
			$imagenAnterior = $_POST["imagenAnterior"];
			$disponible = $_POST['disponible'];

			// Verificar si se subió una nueva imagen de portada
			if ($_FILES["portada"]["name"]) {

				// Generar un nombre único para la imagen
				$extension = pathinfo($_FILES["portada"]["name"], PATHINFO_EXTENSION);
				$nombreImagen = uniqid() . "." . $extension;

				// Verificar que el archivo es una imagen válida
				$formatosPermitidos = ["png", "jpg"];
				if (!in_array($extension, $formatosPermitidos)) {
					echo '<script>	swal.fire({		title: "ERROR AL EDITAR EL LIBRO!",		icon: "warning",		html: "La imagen que intenta asignar como foto de portada, no es una imagen valida. Seleccione una imagen diferente e inténtelo de nuevo.",		allowOutsideClick: false,		showCloseButton: false,		showCancelButton: false,		focusConfirm: false,		confirmButtonColor: "#dd7c29",		confirmButtonText: "OK",	});</script>
			';
				}

				// Ruta donde se guardará la imagen
				$rutaGuardada = "../../literagiando59/recursos/img/portadas/" . $nombreImagen;

				// Mover la imagen desde la ubicación temporal a la ruta final
				move_uploaded_file($_FILES["portada"]["tmp_name"], $rutaGuardada);

				// Eliminar la imagen anterior si existe
				if (file_exists($imagenAnterior)) {
					unlink($imagenAnterior);
				}

				// Actualizar la columna de la base de datos con el nuevo nombre de imagen
				$query = "UPDATE libros SET titulo='$titulo', autor='$autor', tema='$tema', descripcion='$descripcion', condicion_libro='$condicion_libro', edades='$edades', color='$color', formato='$formato', link='$link', portada='$nombreImagen', disponible='$disponible' WHERE id_libro = '$id_libro'";
			} else {
				// No se subió una nueva imagen, actualizar los datos sin cambiar la imagen
				$query = "UPDATE libros SET titulo='$titulo', autor='$autor', tema='$tema', descripcion='$descripcion', condicion_libro='$condicion_libro', edades='$edades', color='$color', formato='$formato', link='$link', disponible='$disponible' WHERE id_libro = '$id_libro'";
			}

			// Ejecutar la consulta SQL
			if (mysqli_query($conexion, $query)) {
				echo '<script>	Swal.fire({		title: "LIBRO EDITADO EXITOSAMENTE!",		icon: "success",		html: "Use el botón a continuación para volver al listado de libros registrados.",		allowOutsideClick: false,		showCloseButton: false,		showCancelButton: false,		focusConfirm: false,		confirmButtonColor: "#219f16",		confirmButtonText: "ADMINISTRAR LIBROS",	}).then(function(){		window.location="index.php";	});</script>
			';
			} else {
				echo '<script>	Swal.fire({		title: "ERROR AL EDITAR EL LIBRO!",		icon: "error",		html: "Parece haber un error con los datos ingresados, verifique los datos ingresados e inténtelo de nuevo.",		allowOutsideClick: false,		showCloseButton: false,		showCancelButton: false,		focusConfirm: false,		confirmButtonColor: "#d51a1a",		confirmButtonText: "OK",	});</script>
				';
			}
		}
	} else {
		echo '<script>	Swal.fire({		title: "ERROR AL EDITAR EL LIBRO!",		icon: "error",		html: "El libro que intenta editar, no existe. Use el botón a continuación para volver al listado de libros registrados.",		allowOutsideClick: false,		showCloseButton: false,		showCancelButton: false,		focusConfirm: false,		confirmButtonColor: "#d51a1a",		confirmButtonText: "ADMINITRAR LIBROS",	}).then(function(){		window.location="index.php";	});</script>
				';
	}

	// Cerramos la conexión con la base de datos
	mysqli_close($conexion);
	?>


	<!-- .Script -->
	<?php

	include("../../literagiando59/script.php");
	?>

	<?php
	ob_end_flush();
	?>

</section>

<?php include '../Layouts/footer.php'; ?>