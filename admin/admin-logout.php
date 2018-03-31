<?php
	session_start();
	unset($_SESSION["admin"]);
	unset($_SESSION["nombre-admin"]);
	unset($_SESSION["usuario-admin"]);
	unset($_SESSION["apellido-admin"]);
	
	header("location: ../admin.php");

?>