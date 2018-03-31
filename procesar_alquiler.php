<?php
	require("lib/identified.php");
	require("lib/conexion_db.php");
	$fecha_entrega = date_create($_REQUEST['fecha_entrega']);
	$fecha_devolucion = date_create($_REQUEST['fecha_entrega']);
	$dias = $_REQUEST['dias'];
	date_add($fecha_devolucion, date_interval_create_from_date_string("$dias days"));
	$usuario = $_SESSION['usuario'];
	$precio_total = $_REQUEST['precio_total'];
	$coche = $_REQUEST['coche'];
	
	$query = "SELECT id_cliente, correo FROM clientes WHERE usuario = '$usuario'";
	
	$resultado = mysqli_query($conexion, $query) or exit("Error con la base de datos: " . mysqli_error($conexion));
	if ($row = mysqli_fetch_array($resultado)) {
		$id = $row['id_cliente'];
		$correo = $row['correo'];
	}
	$fecha_entrega = date_format($fecha_entrega, 'Y-m-d');
	$fecha_devolucion = date_format($fecha_devolucion, 'Y-m-d');
	
	$query = "INSERT INTO factura VALUES(null, '$fecha_entrega', '$fecha_devolucion', '$dias', '$precio_total', '$id')";
	mysqli_query($conexion, $query) or exit("Error con la base de datos: " . mysqli_error($conexion));
	
	$id_factura = mysqli_insert_id($conexion);
	$query = "INSERT INTO detalle_factura VALUES('$id_factura', '$coche')";
	mysqli_query($conexion, $query) or exit("Error en la base de datos " . mysqli_error($conexion));
	
	mysqli_query($conexion, "UPDATE producto SET disponibilidad = 0 WHERE  id_producto = '$coche'") or exit("Error en la base de datos: " . mysqli_error($conexion));
	
	$query = "SELECT marca, modelo, descripcion FROM producto WHERE id_producto = '$coche'";
	$resultado = mysqli_query($conexion, $query) or exit("Error con la base de datos: " . mysqli_error($conexion));
	if ($row = mysqli_fetch_array($resultado)) 
		$coche = $row['marca'] . " " . $row['modelo'] . " \n\n" . $row['descripcion'];
	
	$detalle_mensaje = "Usted a rentado el vehiculo: \n\n$coche\n\nEl coche le sera entregado en fecha: $fecha_entrega y debe de regresarlo en fecha: $fecha_devolucion , el precio total de su alquiler es: $precio_total . 
	\n\n\nMuchas gracias por utilizar nuestros servicios.\n\n\nAtentamente:\n\n http://connectedpeople.tk/rent-car";
	mail($correo, 'Coche Rentado', $detalle_mensaje, 'FROM: webmaster@connectedpeople.tk');
	header("location: index.php");
?>
<html>
	
</html>