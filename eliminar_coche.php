<?php
	$mensaje = null;
	if (isset($_GET['mensaje'])) $mensaje = $_GET['mensaje'];
	
	require("lib/conexion_db.php");
	require("admin/der_admin.php");

?>
<html>
	<head>
		<title>Eliminar Coche - Rent Car</title>
		<meta charset = "utf-8"/>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
	</head>
	<body>
		<?php
			include("admin/nav-admin.php");
		?>
		<div id="cuerpoeliminar">
		<?php
			echo '<p style = "color: red">' . $mensaje . '</p>';
			$query = "SELECT id_producto, marca, modelo, foto FROM producto";
			$resultado = mysqli_query($conexion, $query);
			while ($row = mysqli_fetch_array($resultado)) 
			{
				echo "<div id='diveliminarcoches'>
						<table>
							<tr><td><img src = '$row[foto]'/></td></tr>
							<tr><td>Coche: {$row['marca']}</td></tr> 
							<tr><td>Modelo: {$row['modelo']}</td></tr>
							<tr><td><a href = 'procesar_eliminar_coche.php?id_coche=$row[id_producto]'>Eliminar este coche</a><br></td></tr>
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