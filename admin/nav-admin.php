<?php
	$nombre = $_SESSION['nombre-admin'] . " " . $_SESSION['apellido-admin'] . " (" . $_SESSION['usuario-admin'] . ") ";
	echo "
		<div style = 'text-align: right;' >$nombre<a href = 'admin/admin-logout.php'>Logout</a></div>
		<header>
		<img id='idbanner' src='images/banner/banner.jpg'>
		</header>
		<link rel = 'shortcut icon' href = 'images/favicon/favicon.ico'>
		<div id='divmenuadmin'>
		<nav id='menuadmin'>
			<ul>
				<li><a href = 'menu-admin.php'>Inicio</a></li>
				<li>Coche</li>
				<ul>
					<li><a href = 'registrar_coche.php'>Agregar Coche</a></li>
					<li><a href = 'eliminar_coche.php'>Eliminar Coche</a></li>
					<li><a href = 'modificar_coche.php'>Modificar Coche</a></li>
				</ul>
				<li>Usuarios</li>
				<ul>
					<li><a href = 'formulario_registro_usuarios.php'>Registrar Usuarios</a></li>
					<li><a href = 'eliminar_usuarios.php'>Eliminar Usuarios</a></li>
					<li><a href = 'modificar_usuarios.php'>Modificar Usuario</a></li>
				</ul>
			</ul>
		</nav>
		</div>
	";	
	
?>