<?php
	// Consulta SQL para verificar si existe al menos un registro con permiso igual a 2
	$query = "SELECT COUNT(*) AS permiso_prestamos FROM prestamos WHERE id_usuario = $id_usuario AND permiso = '2'";
	$resultado = $conexion->query($query);
	
	if ($resultado) {
		$fila = $resultado->fetch_assoc();
		$permiso_prestamos = $fila['permiso_prestamos'];
		
		if ($permiso_prestamos > 0) {
			// Si existe al menos un registro con "permiso" igual a 2, redirigir al usuario
			echo '<script>
                alert("Ya tiene un préstamo vigente, deberá hacer la entrega para solicitar otro préstamo");
                window.location= "home.php"</script>';
			//header('Location: home.php');
			//exit;
		} else {
			// Si no hay registros con "permiso" igual a 2, el usuario permanece en la página actual
		}
	} 
?>