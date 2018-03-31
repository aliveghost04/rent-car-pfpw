<?php
	
	require("lib/conexion_db.php");
	require("admin/der_admin.php");
	
	$id_coche = $_REQUEST['id_coche'];
	$marca = $_REQUEST['marca'];
	$modelo = $_REQUEST['modelo'];
	$nombre_foto = $_FILES['foto_coche']['name'];
	$precio = $_REQUEST['precio'];
	if (isset($_REQUEST['disponibilidad'])) 
		$disponibilidad = '1';
	else $disponibilidad = '0';
	$descripcion = $_REQUEST['descripcion'];
	$soloNombre = substr($nombre_foto, 0, strpos($nombre_foto, "."));
	$extension = substr($nombre_foto, strpos($nombre_foto, "."), strlen($nombre_foto));
	
	$contador = 1;
	while (file_exists("images/coches/" . $soloNombre . $extension)) {
		$soloNombre = $soloNombre . "_" . $contador;
	}
	$nombre_foto = $soloNombre . $extension;
	
	move_uploaded_file($_FILES['foto_coche']['tmp_name'], 'images/coches/' . $nombre_foto);
	
	$query = "UPDATE producto SET marca = '$marca', modelo = '$modelo',  foto = 'images/coches/$nombre_foto', precio = '$precio', disponibilidad = '$disponibilidad', descripcion = '$descripcion')";
	
	mysqli_query($conexion, $query) or exit(mysqli_error($conexion));
	
	$mensaje = "Coche modificado correctamente";
	
	header("location: registrar_coche.php?mensaje=$mensaje");
	
?>