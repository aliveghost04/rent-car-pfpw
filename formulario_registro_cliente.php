<?php
	session_start();
?>
<html>
	<head>
		<title>Registrarse - Rent a Car</title>
		<meta charset = "utf-8">
		<script src = "js/solo_numeros.js" ></script>
		<script src = "js/validar_campos_registro_cliente.js"></script>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
		<link rel = "stylesheet" href="styles/css/bootstrap.css">
	</head>
	<body>
		<?php
			require("lib/nav.php");
		?>
		<!--<section id="formcliente">-->
		<form action = "procesar_registro_cliente.php" method = "post" onSubmit = "return validarCampos()" role="form">
			<fieldset>	<legend><h2>Información del cliente</h2></legend>
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type = "text" id = "nombre" name = "nombre" placeholder = "Ingrese su nombre aqui" required = "required" maxlength = "60" class="form-control"> <br>
			</div>
			<div class="form-group">
				<label for="apellido">Apellidos:</label>
				<input type = "text" id = "apellido" name = "apellido" placeholder = "Ingrese su apellido aqui" required = "required" maxlength = "60" class="form-control"> <br>
			</div>
			<div class="form-group">
				<label for="cedula">Cédula:</label>
				<input type = "text" id = "cedula" name = "cedula" placeholder = "Aqui su cedula" onKeyPress = "return soloNumeros(event);" class="form-control" required = "required" maxlength = "11"> <br>
			</div>
			<div class="form-group">
				<label for="direccion">Dirección:</label>
				<input type = "text" id = "direccion" name = "direccion" placeholder = "Ingrese su dirección" required = "required" class="form-control" maxlength = "80"> <br>
			</div>
			<div class="form-group">
				<label for="email">Correo Electrónico:</label>
				<input type = "text" id = "email" name = "email" placeholder = "Correo electrónico" required = "required" class="form-control" maxlength = "80"> <br>
			</div>
			<div class="form-group">
				<label for="confirmar-email">Repite tu correo electrónico:</label>
				<input type = "text" id = "confirmar_email" name = "confirmar_email" class="form-control" required = "required" placeholder = "Correo electrónico" maxlength = "80"> <br>
			</div>
			<div class="form-group">
				<label for="sexo">Sexo:</label>
				<select id = "sexo" name = "sexo" class="form-control">
				<option value = "0">Seleccione</option>
				<option value = "M">Masculino</option>
				<option value = "F">Femenino</option>
			    </select> <br>
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono:</label>
				<input type = "text" id = "telefono" class="form-control" name = "telefono" placeholder = "Aqui su teléfono" onKeyPress = "return soloNumeros(event);" required = "required" maxlength = "10"> <br>
			</div>
			<div class="form-group">
				<label for="usuario">Usuario:</label>
				<input type = "text" id = "usuario" class="form-control" name = "usuario" placeholder = "Usuario aqui" required = "required" maxlength = "40"> <br>
			</div>
			<div class="form-group">
				<label for="password">Contraseña:</label>
				<input type = "password" class="form-control" id = "password" name = "password" placeholder = "Aqui tu contraseña" required = "required" maxlength = "40"> <br> 
			</div>
			<div class="form-group">
				<label for="confirmar_password">Confirme su contraseña:</label>  
				<input type = "password" class="form-control" id = "confirmar_password" name = "confirmar_password" placeholder = "Repite tu contraseña" required = "required" maxlength = "40"> <br>
			</div>
			<input type = "submit" class="form-control" value = "Registrarse">
			</table>
			</fieldset>
		</form>
		<!--</section>-->
		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
		<?php
			include("lib/no-javascript.php");
		?>
	</body>
</html>