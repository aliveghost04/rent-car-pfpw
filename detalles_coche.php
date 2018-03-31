<?php
	session_start();
	require("lib/conexion_db.php");
	if (isset($_GET['coche'])) $coche = $_GET['coche'];
	else header("location: index.php");
?>
<html>
	<head>
		<title>Alquilar coche - Rent Car</title>
		<meta charset = "utf-8"/>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
	</head>
	<?php
		include("lib/nav.php");
		echo "<body>";
		$query = "SELECT id_producto, marca, modelo, descripcion, precio, disponibilidad, foto FROM producto WHERE id_producto = '$coche'";
		
		$resultado = mysqli_query($conexion, $query);
		
		if ($row = mysqli_fetch_array($resultado)) {
			echo "
				<h3>Marca: $row[marca]</h3>
				<h3>Modelo: $row[modelo]</h3>
				<h4>Precio: $row[precio]</h4>
				<textarea rows = '5' cols = '60' style = 'resize: none;'>$row[descripcion]</textarea>" ;
				if($row['disponibilidad'] == 0) echo "<p>Coche se encuentra rentado</p>";
				else echo "<p>Coche esta disponible</p>";
				echo "
				<img src= '$row[foto]'/><br>
				<form action = 'alquiler_coche.php' method = 'post'>
					<input type = 'hidden' name = 'coche' value = '$coche'/>
					<input type = 'hidden' name = 'precio' value = '$row[precio]'/>";
					if ($row['disponibilidad'] == 1) echo "
					<br><input type = 'submit' value = 'Reservar este coche'>";
					else echo "</form>";
		}
	?>
	<body>
</html>