function validarCamposLogin() {
	
	var usuario = document.getElementById('usuario').value;
	var password = document.getElementById('password').value;
	
	if (usuario.length == 0 && password.length == 0) {
		alert("Campos vacios");
		return false;
	}
	
	if (usuario.length == 0) {
		alert("Campo usuario vacio");
		return false;
	}
	
	if (password.length == 0) {
		alert("Campo contraseña vacio");
		return false;
	}
	return true;
}