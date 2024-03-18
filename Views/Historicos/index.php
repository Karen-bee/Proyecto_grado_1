<?php
$vistaActual = 13;
include '../Layouts/header.php';

include('../../literagiando59/includes/includes.php');
include('../../literagiando59/css.php');

?>


<title>Crear históricos</title>

<section class="home-section">

	<div class="container-eventos">

		<div class="content-evento">
			<div class="col-4">
				<hr id="line-left">
				<hr id="line-left">
			</div>
			<div class="col-4">
				<h1 id="title-eventos">Crear históricos</h1>
			</div>
			<div class="col-4">
				<hr id="line-right">
				<hr id="line-right">
			</div>
		</div>



		<a style="color: #ffcb00;" class="aa2 dropdown-itemm" href="historico_libros.php" target="Blank"> <span
				class="mm-text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"
					aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Histórico de libros </span> </a>
		<a style="color: #ffcb00;" class="aa2 dropdown-itemm" href="historico_usuarios.php" target="Blank"> <span
				class="mm-text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"
					aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Histórico de usuarios </span> </a>

		<a style="color: #ffcb00;" class="aa2 dropdown-itemm" href="historico_prestamos.php" target="Blank"> <span
				class="mm-text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right"
					aria-hidden="true" style="color: #ffcb00;"></i>&nbsp;&nbsp;Histórico de préstamos </span> </a>
		<hr class="style-two mb-3" />

	</div>

</section>



<?php include '../Layouts/footer.php'; ?>