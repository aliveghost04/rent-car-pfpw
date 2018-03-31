function soloNumeros(event) {
	
	var keyPressed = event.which ? event.which : event.keyCode;
	
	return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
}