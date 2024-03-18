<?php
ob_start();

$vistaActual = 12;


include '../Layouts/header.php';
include('../../literagiando59/includes/includes.php');
include('../../literagiando59/css.php');

?>


<title>Agregar libros</title>

<section class="home-section">


	<br>
	<div class="container">
		<form method="post" action="agregar_libros.php" enctype="multipart/form-data">
			<div class="login-form mb-10">
				<h2 class="login-title-1 mb-2">
					<center>
						Formulario para agregar nuevos libros.
					</center>
				</h2>
				<div class="row">
					<div>
						<hr />
					</div>
					<div class="col-lg-12">
						<label>
							<i class="fa fa-text-width fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Titulo del libro
						</label>
						<input id="titulo" class="form-control" type="text" name="titulo" value="<?php if (isset($_POST['titulo']))
							echo $_POST['titulo']; ?>" autocomplete="off" placeholder="Ingrese el titulo del libro" title="" minlength="10"
							maxlength="100" pattern="<?php echo base_input_titulo; ?>"
							onkeypress="<?php echo base_input_letras_numeros_espacios_caracteres; ?>" required />
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12">
						<label>
							<i class="fa fa-address-card-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Autor del libro
						</label>
						<input id="autor" class="form-control" type="text" name="autor" value="<?php if (isset($_POST['autor']))
							echo $_POST['autor']; ?>" autocomplete="off" placeholder="Ingrese el autor del libro" title="" minlength="6"
							maxlength="50" pattern="<?php echo base_input_autor; ?>"
							onkeypress="<?php echo base_input_letras_espacios_caracteres; ?>" required />
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12">
						<label>
							<i class="fa fa-text-height fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Tema del libro
						</label>
						<input id="tema" class="form-control" type="text" name="tema" value="<?php if (isset($_POST['tema']))
							echo $_POST['tema']; ?>" autocomplete="off" placeholder="Ingrese el tema del libro" title="" minlength="6"
							maxlength="50" pattern="<?php echo base_input_tema; ?>"
							onkeypress="<?php echo base_input_letras_espacios_caracteres; ?>" required />
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12 mb-3">
						<label>
							<i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Descripción del libro
						</label>
						<textarea class="form-control" name="descripcion" placeholder="Ingrese la descripción del libro"
							aria-label="With textarea" id="textarea_libro" required><?php if (isset($_POST['descripcion']))
								echo $_POST['descripcion']; ?></textarea>
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12">
						<label>
							<i class="fa fa-low-vision fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Condición de libro
						</label>
						<input id="condicion" class="form-control" type="text" name="condicion_libro" value="<?php if (isset($_POST['condicion_libro']))
							echo $_POST['condicion_libro']; ?>" autocomplete="off" placeholder="Ingrese la condición del libro" title=""
							minlength="6" maxlength="50" pattern="<?php echo base_input_autor; ?>"
							onkeypress="<?php echo base_input_letras_espacios_caracteres; ?>" required />
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12 mb-3">
						<label>
							<i class="fa fa-sort-numeric-desc fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Rango de edades
							del libro
						</label>
						<select class="nice-select form-control myniceselect wide" name="edades" title="" tabindex="-1"
							required>
							<option data-display="<?php if (isset($_POST['edades']))
								echo $_POST['edades']; ?>" value="<?php if (isset($_POST['edades']))
									  echo $_POST['edades']; ?>" selected>
								Seleccionar rango de edades</option>
							<?php echo base_input_edades_2; ?>

						</select>
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12">
						<label>
							<i class="fa fa-paint-brush fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Color representativo
						</label>
						<input class="form-control form-control-lg" type="color" name="color" value="<?php if (isset($_POST['color']))
							echo $_POST['color']; ?>" title="" minlength="4" maxlength="9" pattern="<?php echo base_input_color; ?>"
							required />
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12 mb-3">
						<label>
							<i class="fa fa-paperclip fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Formato del libro
						</label>
						<select class="nice-select form-control myniceselect wide" name="formato" title="" tabindex="-1"
							required>
							<option data-display="<?php if (isset($_POST['formato']))
								echo $_POST['formato']; ?>" value="<?php if (isset($_POST['formato']))
									  echo $_POST['formato']; ?>" selected>
								Seleccionar formato del libro</option>
							<option value="Fisico">Físico</option>
							<option value="Digital">Digital</option>
						</select>
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12">
						<label>
							<i class="fa fa-link fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Enlace o URL del libro
						</label>
						<input class="form-control" type="url" name="link" value="<?php if (isset($_POST['link']))
							echo $_POST['link']; ?>" autocomplete="off" placeholder="Ingrese link del libro *https://*" title=""
							minlength="11" maxlength="270" pattern="<?php echo base_input_url; ?>" required />
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12 mb-3">
						<label>
							<i class="fa fa-toggle-on fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Disponibilidad del libro
						</label>
						<select class="nice-select form-control myniceselect wide" name="disponible" title=""
							tabindex="-1" required>
							<option value="" selected>Seleccione una disponibilidad</option>
							<option value="1" <?php if (isset($_POST['disponible']) && $_POST['disponible'] == 1)
								echo 'selected'; ?>>Disponible</option>
							<option value="2" <?php if (isset($_POST['disponible']) && $_POST['disponible'] == 2)
								echo 'selected'; ?>>Agotado</option>
						</select>
					</div>
					<div>
						<hr />
					</div>
					<div class="col-lg-12">
						<label>
							<i class="fa fa-camera-retro fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Foto de portada del
							libro
						</label>
						<input class="form-control form-control-lg" type="file" name="portada" title=""
							accept=".png, .jpg" required />
					</div>
					<div>
						<hr />
					</div>
					<center>
						<div class="row row-cols pt-3">
							<div class="col mb-3">
								<button class="btn btn-custom-size lg-size btn-primary" type="submit" name="agregar"
									style="color: white; text-shadow: 1px 1px 2px #060606;">
									Agregar
								</button>
							</div>
							<div class="col">
								<a class="btn btn-custom-size lg-size btn-primary" href="index.php"
									style="color: white; text-shadow: 1px 1px 2px #060606;">
									Cancelar
								</a>
							</div>
						</div>
					</center>
				</div>
			</div>
		</form>
	</div>
	<?php

	// Comprobamos si el formulario se ha enviado.
	if (isset($_POST['agregar'])) {
		// Recibir los datos del formulario
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
		$disponible = $_POST['disponible'];

		// Generar un nombre único para la imagen
		$extension = pathinfo($portada, PATHINFO_EXTENSION);
		$nombreImagen = uniqid() . "." . $extension;

		// Verificar que el archivo es una imagen válida
		$formatosPermitidos = ["png", "jpg"];
		if (!in_array($extension, $formatosPermitidos)) {
			echo '
		<script>	swal.fire({
				title: "ERROR AL CREAR EL LIBRO!",
				icon: "warning",
				html: "La imagen que intenta usar como foto de portada, no es una imagen valida. Seleccione una imagen diferente para usar como foto de portada e inténtelo de nuevo.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#dd7c29",
				confirmButtonText: "OK",
			});
		</script>';
		}

		// Verificar duplicados de libros mediante el "titulo"
		$query_titulo = "SELECT id_libro FROM libros WHERE titulo = '$titulo'";
		$resultado_titulo = mysqli_query($conexion, $query_titulo);
		if (mysqli_num_rows($resultado_titulo) > 0) {
			echo '
		<script>	Swal.fire({
				title: "ERROR AL CREAR EL LIBRO!",
				icon: "warning",
				html: "El titulo de libro que intenta usar, parece estar en uso, modifique este campo e inténtelo de nuevo.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#dd7c29",
				confirmButtonText: "OK",
			});
		</script>';
		} else {
			// Mover la imagen al directorio
			$rutaGuardada = "../../literagiando59/recursos/img/portadas/" . $nombreImagen;
			move_uploaded_file($portadatemp, $rutaGuardada);

			// Insertar los datos en la tabla libros con el nombre único de la imagen
			$query_insert = "INSERT INTO libros (titulo, autor, tema, descripcion, condicion_libro, edades, color, formato, link, portada, disponible) VALUES ('$titulo', '$autor', '$tema', '$descripcion', '$condicion_libro', '$edades', '$color', '$formato', '$link', '$nombreImagen', '$disponible')";
			if (mysqli_query($conexion, $query_insert)) {
				echo '
		<script>	Swal.fire({
				title: "LIBRO CREADO EXITOSAMENTE!",
				icon: "success",
				html: "Use el botón a continuación para volver al listado de libros registrados.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#219f16",
				confirmButtonText: "Administrar libros",
			}).then(function(){
				window.location="index.php";
			});
		</script>';
			} else {
				echo '
		<script>	Swal.fire({
				title: "ERROR AL CREAR EL LIBRO!",
				icon: "error",
				html: "Parece haber un error con los datos ingresados, verifique los datos de registro e inténtelo de nuevo.",
				allowOutsideClick: false,
				showCloseButton: false,
				showCancelButton: false,
				focusConfirm: false,
				confirmButtonColor: "#d51a1a",
				confirmButtonText: "OK",
			});
		</script>';
			}
		}
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