<?php
		require("admin/der_admin.php");
		require("lib/conexion_db.php");
		
		$nombre = $_POST['nombre']; 
		$apellido = $_POST['apellido'];
		$cedula = $_POST['cedula'];
		$direccion = $_POST['direccion'];
		$correo = $_POST['email'];
		$sexo = $_POST['sexo'];
		$telefono = $_POST['telefono'];
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$cargo = $_POST['cargo'];
		$nombre_foto = $_FILES['foto_perfil']['name'];
		$soloNombre = substr($nombre_foto, 0, strpos($nombre_foto, "."));
		$extension = substr($nombre_foto, strpos($nombre_foto, "."), strlen($nombre_foto));
		
		$contrasena = $password;
		
		$contador = 1;
		while (file_exists("images/usuarios/" . $soloNombre . $extension)) {
			$soloNombre = $soloNombre . "_" . $contador;
		}
		$nombre_foto = $soloNombre . $extension;
		
		move_uploaded_file($_FILES['foto_perfil']['tmp_name'], 'images/usuarios/' . $nombre_foto);
		
		$password = md5($password);
		
		$query = "INSERT INTO usuario VALUES (null, '$nombre', '$apellido', '$telefono', '$direccion', '$cedula', '$correo', '$sexo', '$usuario', '$password', '$cargo', 'images/usuarios/$nombre_foto' )";
		
		mysqli_query($conexion, $query) or exit (mysqli_error($conexion));
		$mensaje = "Usted ha sido registrado en Rent Car\n\nSu usuario es: $nombre \nSu contraseña es: $contrasena \n\n\nA partir de hoy usted a sido integrado como administrador del contenido del Rent Car\n\n
		Muchas gracias por unirse a nuestro equipo de administradores :) \n\nVisitanos http://connectedpeople.tk/rent-car/ \n\nPara empezar a administrar la pagina visita http://connectedpeople.tk/rent-car/admin";
		
		mail($correo, 'Registro como Administrador de contenido en Rent Car', $mensaje, 'From: webmaster@connectedpeople.tk');
		header("location: menu-admin.php");
?>