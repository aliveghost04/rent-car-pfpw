<?php
	
	require("lib/conexion_db.php");
	require("admin/der_admin.php");
	
	$id_coche = $_GET['id_coche'];
	
	$query = "DELETE FROM producto WHERE id_producto = '$id_coche'";
	
	mysqli_query($conexion, $query);
	$mensaje = "Coche Eliminado Satistactoriamente";
	header("location: eliminar_coche.php?mensaje=$mensaje");
?>