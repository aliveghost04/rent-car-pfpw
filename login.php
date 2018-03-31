<?php
	
	$usuario = null;
	$mensaje = null;
	if(isset($_GET['mensaje'])) $mensaje = $_GET['mensaje'];
	
	session_start();
	if (isset($_SESSION['login'])) {
		echo $_SESSION['login'];
		header("location: index.php");
		$usuario = $_SESSION['usuario'];
	}
?>
<html>
	<head>
		<title>Iniciar Sesión - Rent a Car</title>
		<meta charset = "utf-8">
		<script src = "js/validar_campos_login.js"></script>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
		<link rel = "stylesheet" href = "styles/css/bootstrap.css"/>
	</head>
	<body>
		<?php
			include("lib/nav.php");
		?>
		<section id="sectionlogin"><br>
		<form action = "procesar_login.php" method = "post" onSubmit = "return validarCamposLogin()" class="form-inline" role="form">
			<fieldset> <legend><h3>Login</h3></legend>
			<div class="form-group">	
			<label for="usuario">Usuario:</label>
			<?php
				echo "<input type = 'text' id = 'usuario' class='form-control' name = 'usuario' placeholder = 'Introduzca su usuario' maxlength = '40' value = '$usuario' required = 'required'/> <br>";
			?>
			</div>
			<div class="form-group">
			<label for="password">Contraseña:</label>
			<input type = "password" id = "password" name = "password" placeholder = "Aquí su contraseña" class="form-control" maxlength = "40" required = 'required'>
			</div>
			<input type = "submit" class="btn btn-default" value = "Iniciar Sesión"/>
			</fieldset>
			<?php
				echo "<h3 style = 'color: red'>$mensaje</h3>";
			?>
		</form>
		
		</section>
		<footer>
			<p>&copy; 2014 - Derechos reservados</p>
		</footer>
	</body>
</html>