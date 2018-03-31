<?php
	require("admin/der_admin.php");
?>
<html>
	<head>
		<title>Registrar Administrador- Rent a Car</title>
		<meta charset = "utf-8">
		<script src = "js/solo_numeros.js"></script>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
		<script src = "js/validar_campos_registro_usuario.js"></script>
		<link rel = "shortcut icon" href  = "images/favicon/favicon.ico"/>
	</head>
	<body>
		<?php 
			include("admin/nav-admin.php");
		?>
		<div id="registrousuario">
		<form action = "procesar_registro_usuario.php" method = "post" onSubmit = "return validarCampos()" enctype="multipart/form-data">
			<fieldset>	<legend><h3>Registro de Usuario</h3></legend>
			<table>
			<tr></tr>
				<tr><td>Nombre:</td></tr>
				<tr><td><input type = "text" id = "nombre" name = "nombre" placeholder = "Ingrese su nombre aqui" maxlength = "60" required = "required"/> <br></td></tr>
				<tr><td>Apellidos:</td></tr>
				<tr><td><input type = "text" id = "apellido" name = "apellido" placeholder = "Ingrese su apellido aqui" maxlength = "60" required = "required"/> <br></td></tr>
				<tr><td>Cédula:</td></tr>
				<tr><td><input type = "text" id = "cedula" name = "cedula" placeholder = "Aqui su cedula" onKeyPress = "return soloNumeros(event);" maxlength = "11" required = "required"/> <br></td></tr>
				<tr><td>Dirección:</td></tr>
				<tr><td><input type = "text" id = "direccion" name = "direccion" placeholder = "Ingrese su dirección" maxlength = "80" required = "required"/> <br></td></tr>
				<tr><td>Correo Electrónico:</td></tr>
				<tr><td><input type = "text" id = "email" name = "email" placeholder = "Ingresa tu correo electrónico" maxlength = "100" required = "required"/> <br></td></tr>
				<tr><td>Repite tu correo electrónico:</td></tr>
				<tr><td><input type = "text" id = "confirmar_email" name = "confirmar_email" placeholder = "Ingresa tu correo electrónico" maxlength = "100" required = "required"/> <br></td></tr>
				<tr><td>Sexo:</td></tr>
				<tr>
					<td>
						<select id = "sexo" name = "sexo">
							<option value = "0">Seleccione</option>
							<option value = "M">Masculino</option>
							<option value = "F">Femenino</option>
						</select> <br>
					</td>
				</tr>
				<tr><td>Teléfono:</td></tr>
				<tr><td><input type = "text" id = "telefono" name = "telefono" placeholder = "Aqui su teléfono" onKeyPress = "return soloNumeros(event);" maxlength = "10" required = "required"/> <br></td></tr>
				<tr><td>Usuario:</td></tr>
				<tr><td><input type = "text" id = "usuario" name = "usuario" placeholder = "Usuario aqui" maxlength = "40" required = "required"/> <br></td></tr>
				<tr><td>Contraseña:</td></tr>
				<tr><td><input type = "password" id = "password" name = "password" placeholder = "Aqui tu contraseña" maxlength = "40" required = "required"/> <br></td></tr>				 
		 		<tr><td>Confirme su contraseña:</td></tr>
		 		<tr><td><input type = "password" id = "confirmar_password" name = "confirmar_password" placeholder = "Repite tu contraseña" maxlength = "40" required = "required"/> <br></td></tr>
			    <tr><td>Cargo:</td></tr>
			    <tr>
			    	<td>
			    		<?php
							$direccion = dirname(__DIR__) . "/";
							require("lib/conexion_db.php");
							echo "<select id = 'cargo' name = 'cargo'>";
								$query = "SELECT id_cargo,  nombre FROM cargo";
								
								$resultado = mysqli_query($conexion, $query);
								echo "<option value = '0'>Seleccione</option>";
								while ($row = mysqli_fetch_array($resultado)) 
									echo "<option value = '$row[id_cargo]'>$row[nombre]</option>";
							echo "</select> <br>";
							?>
			    	</td>
			    </tr>
			    <tr><td>Seleccione una foto: <input type = "file" id = "foto_perfil" name = "foto_perfil" required = "required"/> <br></td></tr>
			 	<tr><td><input type = "submit" value = "Enviar"></td></tr>
			</table>
			</fieldset>
		</form>
		</div>
		<?php
			require("lib/no-javascript.php");
		?>
		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
	</body>
</html>