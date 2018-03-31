<?php
	$mensaje = null;
	if (isset($_GET['mensaje'])) $mensaje = $_GET['mensaje'];
	require("admin/der_admin.php");
	
?>
<html>
	<head>
		<title>Registrando Coche - Rent a Car</title>
		<meta charset = "utf-8">
		<script src = "js/solo_numeros.js"></script>
		<script src = "js/validar_coche.js"></script>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
	</head>
	<body>
		<?php 
			include("admin/nav-admin.php");
			echo '<p style = "color: red">' . $mensaje . '</p>';
		?>
		<div id="cuerpoadmin">
			<form action = "procesar_registro_coche.php" method = "post" onSubmit = "return validarCampos()" enctype = "multipart/form-data">
			<fieldset> <legend><h3>Registrando Coche</h3></legend>
				<table>
					<tr><td>Marca del coche:</td></tr>
					<tr><td><input type = "text" id = "marca" name = "marca" placeholder = "Marca del coche" maxlength = "60" required = "required"/> <br></td></tr>
				 	<tr><td>Modelo del coche:</td></tr>
				 	<tr><td><input type = "text" id = "modelo" name = "modelo" placeholder = "Modelo del coche" maxlength = "60" required = "required"/> <br></td></tr>
				 	<tr><td>Precio del coche C/D:</td></tr>
				 	<tr><td><input type = "text" id = "precio" name = "precio" placeholder = "Precio por día" maxlength = "10" onKeyPress = "return soloNumeros(event);" required = "required"/> <br></td></tr>
				 	<tr><td>Disponibilidad:<input type = "checkbox" id = "disponibilidad" name = "disponibilidad" checked> <br><br></td></tr>
				 	<tr><td>Breve descripción:</td></tr>
				 	<tr><td><textarea rows = "4" cols = "60" id = "descripcion" name = "descripcion" placeholder = "Aqui la descripción" maxlength = "150" required = "required" style = 'resize: none;'></textarea> <br></td></tr>
				 	<tr><td>Foto del coche: <input type = "file" id = "foto_coche" name = "foto_coche"> <br></td></tr>
					<tr><td><input type = "submit" value = "Registrar coche"></td></tr>
				</table>
			</fieldset>
			</form>
		</div>
		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
	</body>
</html>