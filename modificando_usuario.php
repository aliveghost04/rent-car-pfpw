<?php
	require("admin/der_admin.php");
	require("lib/conexion_db.php");
	require("admin/nav-admin.php");
?>
<html>
	<head>
		<title>Modificando Usuario - Rent Car</title>
		<meta charset = "utf-8"/>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
		<link rel = "stylesheet" href = "styles/estilo.css"/>
		<script src = "js/validar_campos_modificar_usuario.js"></script>
	</head>
	
	<body>
	<?php
		$id_usuario = $_GET['id_usuario'];
		$nombre = null;
		$apellido = null;
		$cedula = null;
		$direccion = null;
		$correo = null;
		$sexo = null;
		$telefono = null;
		$usuario = null;
		$cargo = null;
		
		$query = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
		$resultado = mysqli_query($conexion, $query);
		
		if ($row = mysqli_fetch_array($resultado)) {
			$nombre = $row['nombre'];
			$apellido = $row['apellido'];
			$cedula = $row['cedula'];
			$direccion = $row['direccion'];
			$correo = $row['correo'];
			$sexo = $row['sexo'];
			$telefono = $row['telefono'];
			$usuario = $row['usuario'];
			$cargo = $row['id_cargo'];
		}
		
		echo "
		<form action = 'procesar_modificar_usuario.php' method = 'post' onSubmit = 'return validarCampos()' enctype='multipart/form-data'>
			<fieldset>	<legend><h3>Modificar Usuario</h3></legend>
			<input type = 'hidden' name = 'id_usuario' value = '$id_usuario'>
			Nombre: <input type = 'text' id = 'nombre' name = 'nombre' placeholder = 'Ingrese su nombre aqui' maxlength = '60' value = '$nombre' required = 'required'/> <br>
			Apellidos: <input type = 'text' id = 'apellido' name = 'apellido' placeholder = 'Ingrese su apellido aqui' maxlength = '60' value = '$apellido' required = 'required'/> <br>
			Cédula: <input type = 'text' id = 'cedula' name = 'cedula' placeholder = 'Aqui su cedula' onKeyPress = 'return soloNumeros(event);' maxlength = '11' value = '$cedula' required = 'required'/> <br>
			Dirección: <input type = 'text' id = 'direccion' name = 'direccion' placeholder = 'Ingrese su dirección' maxlength = '80' value = '$direccion' required = 'required'/> <br>
			Correo Electrónico: <input type = 'text' id = 'email' name = 'email' placeholder = 'Ingresa tu correo electrónico' maxlength = '100' value = '$correo' required = 'required'/> <br>
			Repite tu correo electrónico: <input type = 'text' id = 'confirmar_email' name = 'confirmar_email' placeholder = 'Ingresa tu correo electrónico' maxlength = '100' value = '$correo' required = 'required'/> <br>
			Sexo: ";
			echo "<select id = 'sexo' name = 'sexo'>;
				<option value = '0'>Seleccione</option>";
				if ($sexo == "M") echo "<option value = 'M' selected>Masculino</option>
				<option value = 'F'>Femenino</option>"; 
				else echo "<option value = 'M'>Masculino</option>
				<option value = 'F' selected>Femenino</option>";
			echo "
			</select> <br>
			Teléfono: <input type = 'text' id = 'telefono' name = 'telefono' placeholder = 'Aqui su teléfono' onKeyPress = 'return soloNumeros(event);' maxlength = '10' value = '$telefono' required = 'required'/> <br>
			Usuario:  <input type = 'text' id = 'usuario' name = 'usuario' placeholder = 'Usuario aqui' maxlength = '40' value = '$usuario' required = 'required'/> <br>
			Contraseña:  <input type = 'password' id = 'password' name = 'password' placeholder = 'Aqui tu contraseña' maxlength = '40'> <br>
			Confirme su contraseña: <input type = 'password' id = 'confirmar_password' name = 'confirmar_password' placeholder = 'Repite tu contraseña' maxlength = '40'> <br>
			Cargo: 
			";
			echo "<select id = 'cargo' name = 'cargo'>";
				$query = "SELECT id_cargo,  nombre FROM cargo";
				
				$resultado = mysqli_query($conexion, $query);
				echo "<option value = '0'>Seleccione</option>";
				while ($row = mysqli_fetch_array($resultado)) {
					if ($row['id_cargo'] == $cargo) echo "<option value = '$row[id_cargo]' selected>$row[nombre]</option>";
					else echo "<option value = '$row[id_cargo]'>$row[nombre]</option>";
				}
			echo "</select> <br>
			Seleccione una foto: <input type = 'file' id = 'foto_perfil' name = 'foto_perfil'> <br>
			<input type = 'submit' value = 'Modificar Usuario'>
			</fieldset>
		</form>
		";
?>
	</body>
	<footer>
		&copy; 2014 Derechos Reservados
	</footer>
</html>