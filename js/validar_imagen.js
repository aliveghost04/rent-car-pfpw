function validarImagen(fileName) {
	
	var puntoPos = fileName.lastIndexOf(".");
	
	if (puntoPos < 0) {
		alert("Imagen inválida");
		return false;
	}
	
	var nombre = fileName.substring((puntoPos + 1), fileName.length);
	if (nombre == "img" || nombre == "jpg" || nombre == "png" || nombre == "jpeg" || nombre == "gif") {
		alert("Formato de imágen inválido, por favor, seleccione otra");
		return true;
	}
	
	return false;
}