function validarCampos() {
	
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var foto = document.getElementById('foto_coche').value;
	var precioTexto = document.getElementById('precio').value;
	var precioNumero = parseInt(precioTexto);
	var descripcion = document.getElementById('descripcion').value;
	
	if (marca.length == 0 && modelo.length == 0 && precioTexto.length == 0) {
		alert("Debe llenar todos los campos");
		return false;
	}
	
	if (marca.length == 0) {
		alert("Campo marca vacío");
		return false;
	}
	
	if (modelo.length == 0) {
		alert("Campo modelo vacío");
		return false;
	}
	
	if (precioTexto.length == 0) {
		alert("Campo precio vacío");
		return false;
	}
	
	if (isNaN(precioNumero)) {
		alert("El precio introducido no es válido");
		return false;
	}
	
	if (descripcion.length == 0) {
		alert("Campo descripcion vacío");
		return false;
	}
	
	if (descripcion == "Aqui la descripción") {
		alert("Debe escribir una descripción válida");
		return false;
	}
	
	if (descripcion.length <= 20) {
		alert("Descripción muy corta. MIN 21 caractares");
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