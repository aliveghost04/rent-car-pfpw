<?php
	session_start();
	if(isset($_SESSION["login"])) {
		if (isset($_SESSION['usuario'])) $usuario = $_SESSION['usuario'];
	} else header("location: login.php");
?>