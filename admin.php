<?php
	session_start();
	$mensaje = null;
	if (isset($_GET['mensaje'])) $mensaje = $_GET['mensaje'];
	if (isset($_SESSION['admin'])) {
		header("location: menu-admin.php");
	}
?>
<html>
	<head>
		<title>Administrador - Rent a Car</title>
		<meta charset = "utf-8"/>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico">
		<script src = "js/validar_campos_login.js"></script>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
	</head>
	<header>
		<img id = 'idbanner' src = 'images/banner/banner.jpg' alt='banner' title = 'banner'>
	</header>
	<body>
		<section id="admin">
		<div id="divlogin">
		<form action = "procesar_login_usuarios.php" method = "post" onSubmit = "return validarCamposLogin()">
			<fieldset> <legend><h3>Identifíquese</h3></legend>
				<table>
					<tr><td>Usuario:</td></tr>
					<tr><td><input type = 'text' id = 'usuario' name = 'usuario' placeholder = 'Introduzca su usuario' maxlength = '40'> <br></td></tr>
					<tr><td>Contraseña:</td></tr>
					<tr><td><input type = "password" id = "password" name = "password" placeholder = "Aquí su contraseña" maxlength = "150"> <br></td></tr>
					<tr><td><input type = "submit" value = "Iniciar Sesión"></td></tr>
				</table>
			</fieldset>
		<?php
		echo "<h3 style = 'color: red'>$mensaje</h3>";
		?>
		</form>
		</div>
		</section>
		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
		
	</body>
</html>