<?php
	require("lib/conexion_db.php");
	
	$id_usuario = $_POST['id_usuario'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cedula = $_POST['cedula'];
	$direccion = $_POST['direccion'];
	$correo = $_POST['email'];
	$sexo = $_POST['sexo'];
	$telefono = $_POST['telefono'];
	$usuario = $_POST['usuario'];
	if(!isset($_POST['password'])) {
		$row = mysqli_fetch_array(mysqli_query($conexion, "select password from usuario where id_usuario = '$id_usuario'"));
		$password = $row['password'];
	} else {
		$password = $_POST['password'];
		$password = md5($password);
	}
	$cargo  = $_POST['cargo'];
	$nombre_foto = $_FILES['foto_perfil']['name'];
	$soloNombre = substr($nombre_foto, 0, strpos($nombre_foto, "."));
	$extension = substr($nombre_foto, strpos($nombre_foto, "."), strlen($nombre_foto));
	
	$contador = 1;
	while (file_exists("images/usuarios/" . $soloNombre . $extension)) {
		$soloNombre = $soloNombre . "_" . $contador;
	}
	$nombre_foto = $soloNombre . $extension;
	
	
	if ($_FILES['foto_perfil']['name'] == null)
		$query = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', direccion = '$direccion', cedula = '$cedula', correo = '$correo', sexo = '$sexo', usuario = '$usuario', password = '$password', id_cargo = '$cargo' where id_usuario = '$id_usuario' ";
	else {
		$query = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', direccion = '$direccion', cedula = '$cedula', correo = '$correo', sexo = '$sexo', usuario = '$usuario', password = '$password', id_cargo = '$cargo', foto = 'images/usuarios/$nombre_foto' where id_usuario = '$id_usuario' ";
		move_uploaded_file($_FILES['foto_coche']['tmp_name'], 'images/coches/' . $nombre_foto);
	}
	
	mysqli_query($conexion, $query) or exit(mysqli_error($conexion));
	$mensaje = "Se ha registrado un cambio de su usuario en Rent Car\n\nSu nuevo usuario es: $nombre \nSu nueva contraseña es: $contrasena \n\n\nVisitanos http://connectedpeople.tk/rent-car/ \n\nPara administrar la pagina visita http://connectedpeople.tk/rent-car/admin \n\n\nNota importante: 
	Si usted no hizo este cambio en su usuario notifique al administrador para que sea reintegrado nuevamente. http://connectedpeople.tk/rent-car/contactos.php";
	
	mail($correo, "Usuario Modificado en Rent Car", $mensaje, 'From: webmaster@connectedpeople.tk');
	$mensaje = "Usuario Modificado satisfactoriamente";
	
	header("location: modificar_usuarios.php");
?>
