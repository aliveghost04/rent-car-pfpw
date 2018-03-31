<?php
	
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	$password = md5($password);
	
	require("lib/conexion_db.php");
	
	$query = "SELECT nombre, apellido, usuario, password FROM clientes where usuario = '$usuario'";
	
	$resultado = mysqli_query($conexion, $query) or die (mysqli_error($conexion));
	
	$mensaje = "Usuario y/o Contraseña Incorrectos";
	
	if ($row = mysqli_fetch_array($resultado)) {
		if ($row['usuario'] == $usuario and $row['password'] == $password) {
			session_start();
			$_SESSION["login"] = "true";
			$_SESSION["usuario"] = $usuario;
			$_SESSION["nombre"] = $row['nombre'];
			$_SESSION['apellido'] = $row['apellido'];
			header("location: index.php");
		}  else header("location: login.php?mensaje=$mensaje");
	} else header("location: login.php?mensaje=$mensaje");
?>