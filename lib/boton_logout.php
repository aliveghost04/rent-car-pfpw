<?php

	$usuario = null;
	$login = null;
	$mensaje_boton = "Iniciar Sesión";
	$pag = "login.php";
	
	if (isset($_SESSION['login'])) {
		$login = "true";
		$usuario = $_SESSION['nombre'] . " " . $_SESSION['apellido'] . " (" . $_SESSION['usuario'] . ") "; 
	}
	
	if ($login == "true") {
		$mensaje_boton = "Logout";
		$pag = "logout.php";
	}
	echo "
		<div style = 'text-align: right;'>$usuario<a href = '$pag'>$mensaje_boton</a></div>
	";
?>