<?php
	$mensaje = null;
	if (isset($_GET['mensaje'])) $mensaje = $_GET['mensaje'];
	require("lib/conexion_db.php");
	require("admin/der_admin.php");
	
?>
<html>
	<head>
		<title>Modificar Usuario - Rent Car</title>
		<meta charset = "utf-8"/>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
	</head>
	<body>
	<?php
		include("admin/nav-admin.php");
	?>
	<div id="cuerpoadmin">	
	<?php
		echo '<p style = "color: red">' . $mensaje . '</p>';
		$query = "SELECT id_usuario, nombre, apellido, correo, usuario, foto FROM usuario";
		$resultado = mysqli_query($conexion, $query);
		while ($row = mysqli_fetch_array($resultado)) 
		{
			echo "<div id='divmodificarusuario'>
					  <table>
						<tr><td><img src = '$row[foto]'/></td></tr>
						<tr><td>Nombre: {$row['usuario']}</td></tr>
						<tr><td>Apellido: {$row['apellido']}</td></tr>
						<tr><td>Correo: {$row['usuario']}</td></tr>
						<tr><td><a href = 'modificando_usuario.php?id_usuario=$row[id_usuario]'>Modificar este Usuario</a><br><br></td></tr>
				 	  </table>
			 	  </div>";
		}	
	?>
	</div>
	<footer>
		<p>&copy; 2014 - Derechos reservados</p>
	</footer>
	</body>
</html>