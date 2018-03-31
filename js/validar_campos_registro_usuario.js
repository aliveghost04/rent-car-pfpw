function validarCampos() {
	
	var nombre = document.getElementById('nombre').value;
	var apellido = document.getElementById('apellido').value;
	var cedulaTexto = document.getElementById('cedula').value;
	var cedulaNumero = parseInt(cedulaTexto);
	var direccion = document.getElementById('direccion').value;
	var sexo = document.getElementById('sexo').value;
	var correo = document.getElementById('email').value;
	var confirmar_correo = document.getElementById('confirmar_email').value;
	var usuario = document.getElementById('usuario').value;
	var password = document.getElementById('password').value;
	var confirmar_password = document.getElementById('confirmar_password').value;
	var telefonoTexto = document.getElementById('telefono').value;
	var telefonoNumero = parseInt(telefonoTexto);
	var cargo = document.getElementById('cargo').value;
	var sexo = document.getElementById('sexo').value;
	var foto = document.getElementById('foto_perfil').value;
	
	if (nombre.length == 0 && apellido.length == 0 && cedulaTexto.length == 0 && direccion.length == 0 && usuario.length == 0 &&
		password.length == 0 && confirmar_password.length == 0 && telefonoTexto.length == 0 && correo.length == 0 && confirmar_correo.length == 0) {
		
		alert("Debe llenar todos los campos");
		return false;
	}
	
	if (nombre.length == 0) {
		alert("Campo nombre vacio");
		return false;
	}
	
	if (apellido.length == 0) {
		alert("Campo apellido vacio");
		return false;
	}
	
	if (cedulaTexto.length == 0) {
		alert("Campo cédula vacia");
		return false;
	}
	
	if (direccion.length == 0) {
		alert("Campo dirección vacia");
		return false;
	}
	
	if (correo.length == 0) {
		alert("Campo correo eletrónico vacio");
		return false;
	}
	
	if (confirmar_correo.length == 0) {
		alert("Debe reescribir el correo");
		return false;
	}
	
	if (usuario.length == 0) {
		alert("Campo usuario vacio");
		return false;
	}
	
	if (password.length == 0) {
		alert("Campo contraseña vacia");
		return false;
	}
	
	if (password.length < 6) {
		alert("Contraseña muy corta, debe tener al menos 6 dígitos");
		return false;
	}
	
	if (confirmar_password.length == 0) {
		alert("Debe confirmar la contraseña");
		return false;
	}
	
	if (telefonoTexto.length == 0) {
		alert("Campo teléfono vacio");
		return false;
	}
	
	if (isNaN(cedulaNumero) || cedulaTexto.length != 11) {
		alert("La cedula introducida no es válida");
		return false;
	}
	
	var posPunto = correo.lastIndexOf(".");
	var arrobaPos = correo.indexOf("@");
	if (posPunto < 0 || arrobaPos < 0 || arrobaPos > posPunto || posPunto == (correo.length - 1) || arrobaPos == (posPunto - 1)) {
		alert ("Correo Inválido");
		return false;
	}
	
	if (correo != confirmar_correo) {
		alert("Los correos son diferentes");
		return false;
	}
	
	if (isNaN(telefonoNumero) || telefonoTexto.length != 10) {
		alert("El teléfono introducido no es válido");
		return false;
	}
	
	if (password != confirmar_password) {
		alert("Las contraseñas no coinciden");
		return false;
	}
	
	if (cargo == "0") {
		alert("Debe seleccionar el cargo del usuario");
		return false;
	}
	
	if (sexo == "0") {
		alert("Debe seleccionar el sexo");
		return false;
	}
	
	if (foto == "") {
		alert("Debe seleccionar una foto de perfil");
		return false;
	}
	
	var puntoPos = foto.lastIndexOf(".");
	
	if (puntoPos < 0) {
		alert("Imagen inválida");
		return false;
	}
	
	var nombre = foto.substring((puntoPos + 1), foto.length);
	if (nombre == "img" || nombre == "jpg" || nombre == "png" || nombre == "jpeg" || nombre == "gif") {
		return true;
	} else {
		alert("Formato de imágen inválido, por favor, seleccione otra");
		return false;
	}
	
	return true;
}