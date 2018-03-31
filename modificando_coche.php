<?php
	$mensaje = null;
	$id_coche = $_GET['id_coche'];
	if (isset($_GET['mensaje'])) $mensaje = $_GET['mensaje'];
	require("admin/der_admin.php");
	require("lib/conexion_db.php");
?>
<html>
	<head>
		<title>Modificando Coche - Rent a Car</title>
		<meta charset = "utf-8"/>
		<script src = "js/solo_numeros.js"></script>
		<script src = "js/validar_coche_modificar.js"></script>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
	</head>
	<body>
		<?php 
			include("admin/nav-admin.php");
			echo '<p style = "color: red">' . $mensaje . '</p>';
		?>
		<div id="cuerpoadmin">
		<form action = "procesar_modificar_coche.php" method = "post" onSubmit = "return validarCampos()" enctype = "multipart/form-data">
			<fieldset> <legend><h3>Modificando Coche</h3></legend>
				<?php 
					$marca = null;
					$modelo = null;
					$precio = null;
					$descripcion = null;
					
					$query = "SELECT * FROM producto where id_producto = '$id_coche'";
					$resultado = mysqli_query($conexion, $query);
					if ($row = mysqli_fetch_array($resultado)) {
						$marca = $row['marca'];
						$modelo = $row['modelo'];
						$foto = $row['foto'];
						$precio = $row['precio'];
						$descripcion = $row['descripcion'];
					}
					echo "<table>
							<tr><td><input type = 'hidden' name = 'id_coche' value = '$id_coche' required = 'required'/></td></tr>
							<tr><td>Marca del coche:</td></tr>
							<tr><td><input type = 'text' id = 'marca' name = 'marca' placeholder = 'Marca del coche' maxlength = '60' value = '$marca' required = 'required'/> <br></td></tr>
							<tr><td>Modelo del coche:</td></tr>
							<tr><td><input type = 'text' id = 'modelo' name = 'modelo' placeholder = 'Modelo del coche' maxlength = '60' value = '$modelo' required = 'required'/> <br></td></tr>
							<tr><td>Precio del coche C/D:</td></tr>
							<tr><td><input type = 'text' id = 'precio' name = 'precio' placeholder = 'Precio por día' maxlength = '10' value = '$precio' onKeyPress = 'return soloNumeros(event);' required = 'required'/> <br></td></tr> 
							<tr><td>Disponibilidad:</td></tr> 
							<tr><td><input type = 'checkbox' id = 'disponibilidad' name = 'disponibilidad' checked> <br></td></tr> 
							<tr><td>Breve descripción:</td></tr>
							<tr><td><textarea rows = '4' cols = '60' id = 'descripcion' name = 'descripcion' placeholder = 'Aqui la descripción' maxlength = '150' required = 'required'/ style = 'resize: none;'>$descripcion</textarea> <br></td></tr> 
							<tr><td>Foto del coche: <input type = 'file' id = 'foto_coche' name = 'foto_coche'> <br></td></tr>
							<tr><td><input type = 'submit' value = 'Modificar coche'></td></tr>
						</table>";
				?>
			</fieldset>
		</form>
		</div>
		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
	</body>
</html>