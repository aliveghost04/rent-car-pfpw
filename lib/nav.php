<?php
	require("lib/boton_logout.php");
	echo "
	<head>
		<link rel = 'stylesheet' href = 'styles/estilo.css'>
	</head>
	<header>
		<img id='idbanner' src='images/banner/banner.jpg' alt='banner' title = 'banner'>
	</header>
	<nav>
	<center>
		<ul class = 'nav'>
			<li><a href = 'index.php'>Inicio</a></li>
			<li><a href = 'sobre_nosotros.php'>Sobre nosotros</a></li>
			<li><a href = 'contactos.php'>Contactos</a></li>
			<li><a href = '$pag'>$mensaje_boton</a></li>
			<li><a href = 'formulario_registro_cliente.php'>Registrarse</a></li>
		</ul>
		</center>
	</nav>";
	
?>