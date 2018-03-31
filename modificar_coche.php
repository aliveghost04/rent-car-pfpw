<?php
	$mensaje = null;
	if (isset($_GET['mensaje'])) $mensaje = $_GET['mensaje'];
	require("lib/conexion_db.php");
	require("admin/der_admin.php");
?>
<html>
	<head>
		<title>Modificando Coche - Rent Car</title>
		<meta charset = "utf-8"/>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
	</head>
	<?php
		include("admin/nav-admin.php");
	?>
	<div id="cuerpomodificar">
	<?php
		echo '<p style = "color: red">' . $mensaje . '</p>';
		$query = "SELECT id_producto, marca, modelo, foto FROM producto";
		$resultado = mysqli_query($conexion, $query);
		while ($row = mysqli_fetch_array($resultado)) 
		{
			echo "<div id='divmodificarcoches'>
					<table>
						<tr><td><img src = '$row[foto]'/></td><tr>
						<tr><td>Coche: $row[marca]</td></tr> 
						<tr><td>Modelo: $row[modelo]</td></td>
						<tr><td><a href = 'modificando_coche.php?id_coche=$row[id_producto]'>Modificar este coche</a><br></td></tr>
					</table>
				  </div>";
		}
	?>
	</div>
	<footer>
		<p>&copy; 2014 - Derechos reservados</p>
	</footer>
</html>