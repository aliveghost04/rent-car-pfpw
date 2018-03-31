<?php
	session_start();
	require("lib/conexion_db.php");
?>

<html>
	<head>
		<title>Rent Car</title>
		<meta charset = "utf-8">
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
	</head>
	<body>
		<?php
			include("lib/nav.php");
		?>
		<section>
			<?php
				
				$query = "SELECT id_producto, marca, modelo, precio, foto FROM producto";
				
				$resultado = mysqli_query($conexion, $query);

				while ($row = mysqli_fetch_array($resultado)) 
				{
				echo "<div id='divcoches'>
						<a href = 'detalles_coche.php?coche=$row[id_producto]'>
						<table>
							<tr><td><img src = '$row[foto]'><td></tr>
							<tr><th>Coche: $row[marca]</th></tr>
							<tr><th>Modelo: $row[modelo]</th></tr>
							<tr><th>Precio: $row[precio]</th></tr>
						</table>
						</a>
					  </div>";
				}
	
			?>
		</section>

		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
	</body>
</html>