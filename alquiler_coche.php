<?php
	require("lib/identified.php");
	require("lib/conexion_db.php");
	if(isset($_POST['coche'])) $coche = $_POST['coche'];
	if(isset($_POST['precio'])) $precio = $_POST['precio'];
?>
<html>
	<head>
		<title>Información de alquiler - Rent Car</title>
		<meta charset = "utf-8"/>
		<link rel = "shortcut icon" href = "images/favicon/favicon.ico"/>
		<script>function calcularDias() {
			var dias = parseInt(document.getElementById('dias').value);
			var precio = document.getElementById('precio').value;
			
			document.getElementById('precio_total').value = (dias * precio).toString();
			var fecha = document.getElementById('fecha_entrega').value;
			var anio = parseInt(fecha.substr(0, 4));
			var mes = parseInt(fecha.substr(5, 2));
			var dia = parseInt(fecha.substr(8, 2));
			
			dia = dia + dias;
			if (dia > 31) {
				dia = dia - 31;
				mes++;
			}
			document.getElementById('fecha_devolucion').value = dia + "/" + mes + "/" + anio;
		}</script>
		<script>function validarCampos() {
			var dias = document.getElementById('dias').value;
			
			if (dias == "0") {
				alert("Debe seleccionar la cantidad de dias");
				return false;
			}
			return true;
		}</script>
	</head>
	<?php
		include("lib/nav.php");
		echo "<body>";
	?>
		<form action = "procesar_alquiler.php" method = "post" onSubmit = "return validarCampos()">
			Fecha de entrega: <input type = "date" id = "fecha_entrega" name = "fecha_entrega" required = "required"/> <br>
			Cantidad dias: 
			<select id = "dias" name = "dias" onChange = "calcularDias()">
			<option value = "0">Seleccione</option>
			<?php 
				$var = 0;
				while ($var < 15) {
					$var++;
					echo "<option value = '$var'>$var</option>";
				}
			echo "
			</select>
			<input type = 'text' id = 'precio_total' name = 'precio_total' readonly /><br>
			<input type = 'hidden' id = 'precio' value = '$precio'/>
			<input type = 'hidden' name = 'coche' value = '$coche'/>";
			?>
			Fecha devolución: <input type = "text" id = "fecha_devolucion" readonly/><br>
			<input type = "submit" value = "Alquilar Coche">
		</form>
	</body>
</html>