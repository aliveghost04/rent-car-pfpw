<?php
		
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$asunto = $_REQUEST['asunto'];
	$correo = $_REQUEST['correo'];
	$mensaje = $_REQUEST['mensaje'];
	
	$asunto = $nombre . " " . $apellido . " - " . $asunto;
	
	mail("webmaster@connectedpeople.tk", $asunto, $mensaje, 'From: ' . $correo);
	
	header("location: index.php");
	
?>

		