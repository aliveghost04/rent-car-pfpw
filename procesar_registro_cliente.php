<?php
	
	require("lib/conexion_db.php");
	
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$cedula = $_REQUEST['cedula'];
	$direccion = $_REQUEST['direccion'];
	$correo = $_REQUEST['email'];
	$sexo = $_REQUEST['sexo'];
	$telefono = $_REQUEST['telefono'];
	$usuario = $_REQUEST['usuario'];
	$password = $_REQUEST['password'];
	$temp = $password;
	$password = md5($password);
	
	$query = "INSERT INTO clientes VALUES(null, '$nombre', '$apellido', '$cedula', '$correo', '$usuario', '$password', '$direccion', '$sexo', '$telefono')";
	
	
	mysqli_query($conexion, $query) or exit(mysqli_error($conexion));
	
	$mensaje = "Gracias por registrarte en Rent Car $nombre $apellido\nTus Credenciales de login son:\n\nUsuario: $usuario\nContraseña: $temp \n\nEsperando que este complacido con nuestro servicios\nCordialmente\n\nhttp://Connectedpeople.tk";
	mail($correo, 'Registro en Rent Car', $mensaje, 'From: webmaster@connectedpeople.tk');
	header("location: index.php?usuario=$usuario");
	
?>