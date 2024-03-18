<?php
	// Iniciar la sesión
	session_start();

	// Verificar si la sesión está activa
	if (isset($_SESSION['id_usuario'])) {
		$id_usuario = $_SESSION['id_usuario'];
		require_once('../includes/conexion.php');
		
		// Consulta SQL para obtener el rol del usuario
		$query = "SELECT rol FROM usuario WHERE id_usuario = $id_usuario";
		$resultado = $conexion->query($query);
		
		if ($resultado) {
			$fila = $resultado->fetch_assoc();
			$rol = $fila['rol'];
			
			// Consulta SQL para obtener el rol del usuario
			$query = "SELECT * FROM roles_permisos WHERE idrol = $rol AND id_pagina  = 6;";
			$resultado = $conexion->query($query);
			
			if (!$resultado || $resultado->num_rows == 0) {
				echo '<script>
                alert("No tiene permisos para acceder a la pagina");
                window.location= "/Literagiando/Views/Home/index.php"</script>';
				exit;
			}
		}
	} else {
		// Redirigir si la sesión no está activa o el usuario no ha iniciado sesión
		header('Location: ../logout.php');
		exit;
	}
?>