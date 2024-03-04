<?php
	ob_start();
	
	// Https
	require_once('includes/https.php');
	
	// Sesión
	require_once('includes/session.php');
	
	// Include
	require_once('includes/includes.php');
?>
<!DOCTYPE html>
<html lang="es">
	<!-- .Head -->
	<head>
		<!-- .UTF-8 -->
		<?php echo base_utf8_php; ?>

		<?php echo base_utf8_2_php; ?>

		<!-- .Titulo -->
		<title><?php echo base_titulo_2; ?></title>

		<!-- .CSS -->
		<?php include('css.php'); ?>

		<!-- .Indexación -->
		<?php echo base_con_indexacion; ?>

		<!-- .Meta -->
		<?php include('meta.php'); ?>
		
	</head>
	<!-- .Body -->
	<body>
        <div class="main-wrapper">
			<!-- .Menú -->
			<?php include('menu.php'); ?>
        </div>

		<?php include('final.php'); ?>

		<!-- .Script -->
		<?php include('script.php'); ?>
	
	</body>
</html>
<?php 
	ob_end_flush();
	exit;
?>