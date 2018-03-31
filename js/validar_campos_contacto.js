function validarCampos() {
	
	var nombre = document.getElementById('nombre').value;
	var apellido = document.getElementById('apellido').value;
	var asunto = document.getElementById('asunto').value;
	var correo = document.getElementById('correo').value;
	var mensaje = document.getElementById('mensaje').value;
	
	if (nombre.length == 0 && apellido.length == 0 && asunto.length == 0 && correo.length == 0 && mensaje.length == 0 ) {
		alert("Debe llenar todos los campos");
		return false;
	}
	
	if (nombre.length == 0) {
		alert("Campo nombre vacío");
		return false;
	}
	
	if (apellido.length == 0) {
		alert("Campo apellido vacío");
		return false;
	}
	
	if (asunto.length == 0) {
		alert("Campo asunto vacío");
		return false;
	}
	
	if (correo.length == 0) {
		alert("Campo correo vacío");
		return false;
	}
	
	var posPunto = correo.lastIndexOf(".");
	var arrobaPos = correo.indexOf("@");
	
	if (posPunto < 0 || arrobaPos < 0 || arrobaPos > posPunto || posPunto == (correo.length - 1) || arrobaPos == (posPunto - 1)) {
		alert ("Correo Inválido");
		return false;
	}
	
	if (mensaje.length == 0 ) {
		alert("Campo mensaje vacío");
		return false;
	}
	
	if (mensaje.length < 10) {
		alert("El mensaje debe de tener al menos 10 caracteres");
		return false;
	}
	
	return true;
}