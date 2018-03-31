<?php
	session_start();
?>
<html>
	<head>
		<title>Contactos - Rent Car</title>
		<meta charset = "utf-8"/>
		<script src = "js/validar_campos_contacto.js"></script>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
	</head>
	<?php
		include("lib/nav.php");
	?>
	<body>
		<section id="contacto">
			<div id="divcontacto">
			<h2>Contactos</h2>
			<p><strong>Nombre: </strong>Rent Car</p>
			<p><strong>Dirección: </strong>Av. Las Américas. km 0, Santo Domingo. </p>
			<p><strong>Teléfonos: </strong><br>809-000-0000 <br> 809-000-1111<br>829-010-0011</p>
			<p><strong>Email: </strong>webmaster@connectedpeople.tk</p>
			
			<form action = "procesar_formulario_contacto.php" method = "post" onSubmit = "return validarCampos()">	
				<fieldset> <legend><h3>Contactos</h3></legend>
					<table>
						<tr>
							<tr><td>Nombre:</td></tr>
							<td><input type = "text" id = "nombre" name = "nombre" placeholder = "Nombre" required = "required" maxlength = "60"> <br></td>
						</tr>
						<tr>
							<tr><td>Apellido:</td></tr>
							<td><input type = "text" id = "apellido" name = "apellido" placeholder = "Apellido" required = "required" maxlength = "60"> <br></td>
						</tr>
						<tr>
							<tr><td>Asunto:</td></tr>
							<td><input type = "text" id = "asunto" name = "asunto" placeholder = "Asunto" required = "required" maxlength = "30" /><br></td>
						</tr>
						<tr>
							<tr><td>Dirección de Correo electronico:</td></tr>
							<td><input type = "text" id = "correo" name = "correo" placeholder = "Correo Electrónico" required = "required" maxlength = "60"> <br></td>
						</tr>
						<tr>
							<tr><td>Escribe aquí tu mensaje:</td></tr>
							<td><textarea rows = "4" cols = "60" id = "mensaje" name = "mensaje" style = "resize: none;" required = "required" placeholder = "Aquí tu mensaje" maxlength = "150"/></textarea> <br></td>
						</tr>
						<tr>
							<td><input type = "submit" value = "Enviar mensaje"></td>
						</tr>
					</table>
			</form>
			</div>
		</section>
		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
	</body>
</html>