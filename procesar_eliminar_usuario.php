<?php
	
	require("lib/conexion_db.php");
	require("admin/der_admin.php");
	
	$id_usuario = $_GET['id_usuario'];
	
	$query = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
	
	mysqli_query($conexion, $query);
	$mensaje = "Usuario Eliminado Satistactoriamente";
	header("location: eliminar_usuarios.php?mensaje=$mensaje");
?>