<?php
function comprobarDNI($dni) {
	$correcto = true;
	$letra = strtoupper(substr($dni, -1));
	$numeros = substr($dni, 0, -1);
	if (empty(trim($dni))) {
		$correcto = false;
	}
	else {
		if ((substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) != $letra) || (strlen($letra) != 1) || (strlen($numeros) != 8)) {
			$correcto = false;
		}
	}
	return $correcto;
}
	$server = new SoapServer("serviceSOAP.wsdl");
	$server -> addFunction("comprobarDNI");
	$server -> handle();
?>