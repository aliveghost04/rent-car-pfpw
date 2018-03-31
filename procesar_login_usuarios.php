<?php

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	$password = md5($password);
	
	require("lib/conexion_db.php");
	
	$query = "SELECT nombre, apellido, usuario, password FROM usuario where usuario = '$usuario'";
	
	$resultado = mysqli_query($conexion, $query) or die (mysqli_error($conexion));
	
	$mensaje = "Usuario y/o Contraseña Incorrectos";
	
	if ($row = mysqli_fetch_array($resultado)) {
		if ($row['usuario'] == $usuario and $row['password'] == $password) {
			SESSION_START();
			$_SESSION["admin"] = "true";
			$_SESSION['usuario-admin'] = $row['usuario'];
			$_SESSION['nombre-admin'] = $row['nombre'];
			$_SESSION['apellido-admin'] = $row['apellido'];
			header("location: menu-admin.php");
		} else header("location: admin.php?mensaje=$mensaje"); 
	} else header("location: admin.php?mensaje=$mensaje"); 
?>