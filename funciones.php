<?php
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $valor - El valor del campo 
	* 
	* Comprueba si un campo de texto: 
	* - Está vacío 
	* - O si sólo contiene letras 
	* 
	* Devuelve: 
	* - Mensaje de error 
	* - Si no hay error, una cadena de texto vacía
	*/
	function comprobarTexto($valor) { 
		$patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";
		if (empty(trim($valor))) {
			return "<span class='campoerror'>" . "Campo vacío" . "</span>"; 
		}
		else {
			if (!preg_match($patron, $valor)) {
				return "<span class='campoerror'>" . "Campo incorrecto" . "</span>"; 
			}
		}
		return "";
	}
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $valor - El valor del campo 
	* 
	* Comprueba si un campo de texto: 
	* - Está vacío 
	* - O si sólo contiene letras y/o números
	* 
	* Devuelve: 
	* - Mensaje de error 
	* - Si no hay error, una cadena de texto vacía
	*/
	function comprobarAlfaNumerico($valor) { 
		$patron = "/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/";
		if (!preg_match($patron, $valor)) {
			return "<span class='campoerror'>" . "Campo incorrecto" . "</span>"; 
		}
		return "";
	}
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $valor - El valor del campo 
	* 
	* Comprueba si un campo de texto: 
	* - Está vacío 
	* - Si el patrón se cumple
	* - Si la letra es correcta
	* 
	* Devuelve: 
	* - Mensaje de error 
	* - Si no hay error, una cadena de texto vacía
	*/
	function comprobarDNI($valor) {
		$letra = strtoupper(substr($valor, -1));
		$numeros = substr($valor, 0, -1);
		if (empty(trim($valor))) {
			return "<span class='campoerror'>" . "DNI vacío" . "</span>"; 
		}
		else {
			if ((substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) != $letra) || (strlen($letra) != 1) || (strlen($numeros) != 8)) {
				return "<span class='campoerror'>" . "DNI incorrecto" . "</span>";
			}
		}
	}
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $valor - La contraseña del campo 
	* 
	* Comprueba si un campo de texto: 
	* - Está vacío 
	* - Si sólo contiene letras y números
	* - O si el tamaño de la contraseña es mayor o igual que ocho
	*
	* Devuelve: 
	* - Mensaje de error 
	* - Si no hay error, una cadena de texto vacía
	*/
	function comprobarPassword($valor) { 
		$patron = "/^[a-zA-Z0-9]+$/";
		if (empty(trim($valor))) {
			return "<span class='campoerror'>" . "Contraseña vacía" . "</span>"; 
		}
		else {
			if (!preg_match($patron, $valor)) {
				return "<span class='campoerror'>" . "Sólo letras y/o números" . "</span>";
			}
			else {
				if (strlen($valor) < 8) {
					return "<span class='campoerror'>" . "Contraseña demasiado corta" . "</span>";
				}
			}
		}
		return "";
	}
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $fecha - Una fecha
	* 
	* Comprueba si un campo de texto: 
	* - Está vacío 
	* - Si el formato es correcto
	* 
	* Devuelve: 
	* - Mensaje de error 
	* - Si no hay error, una cadena de texto vacía
	*/
	function comprobarFecha($fecha) {
		$patron = "/\d{1,2}\/\d{1,2}\/\d{4}/";
		if (empty(trim($fecha))) {
			return "<span class='campoerror'>" . "Campo vacío" . "</span>"; 
		}
		else {
			if (!preg_match($patron, $fecha)) {
				return "<span class='campoerror'>" . "Formato DD/MM/AAAA" . "</span>";
			}
			else {
				$campofecha = explode ("/", $fecha);
				if(!checkdate($campofecha[1], $campofecha[0], $campofecha[2])){
					return "<span class='campoerror'>" . "Fecha incorrecta" . "</span>";
				}
			}
		}
	}
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $fecha - La fecha de nacimiento
	* 
	* Comprueba si un campo de texto: 
	* - Está vacío 
	* - Si el formato es correcto
	* - O si la fecha es mayor que la fecha actual y menor que 1900
	* 
	* Devuelve: 
	* - Mensaje de error 
	* - Si no hay error, una cadena de texto vacía
	*/
	function comprobarFechaNacimiento($fecha) {
		$patron = "/\d{1,2}\/\d{1,2}\/\d{4}/";
		if (empty(trim($fecha))) {
			return "<span class='campoerror'>" . "Campo vacío" . "</span>"; 
		}
		else {
			if (!preg_match($patron, $fecha)) {
				return "<span class='campoerror'>" . "Formato DD/MM/AAAA" . "</span>";
			}
			else {
				$campofecha = explode ("/", $fecha);
				if(!checkdate($campofecha[1], $campofecha[0], $campofecha[2])){
					return "<span class='campoerror'>" . "Fecha incorrecta" . "</span>";
				}
				else {
					if($campofecha[2] > date("Y") || $campofecha[2] < "1900") {
						return "<span class='campoerror'>" . "Fecha incorrecta" . "</span>";
					}
					else {
						if($campofecha[2] == date("Y") && $campofecha[1] > date("m")) {
							return "<span class='campoerror'>" . "Fecha incorrecta" . "</span>";
						}
						else {
							if($campofecha[1] == date("m") && $campofecha[0] > date("d")) {
								return "<span class='campoerror'>" . "Fecha incorrecta" . "</span>";
							}
						}
					}
				}
			}
		}
	}
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $fecha - La fecha de nacimiento
	* 
	* Devuelve: 
	* - La edad de una persona 
	*/
	function calcularEdad($fecha) {
		$dias = explode("/", $fecha, 3);
		$dias = mktime(0, 0, 0, $dias[1], $dias[0] , $dias[2]);
		$edad = (int)((time() - $dias) / 31556926);
		return $edad;
	}
	/** 
	* Autor: Pablo Domínguez Navarro 
	* Recibe: 
	* $fecha - La edad de la persona
	* 
	* Devuelve: 
	* - La categoría futbolística 
	*/
	function calcularCategoria($edad) {
		$categoria = "";
		switch ($edad) {
			case ($edad <= 6):
				$categoria = "Micros";
				break;
			case ($edad == 7 || $edad == 8):
				$categoria = "Pre-benjamín";
				break;
			case ($edad == 9 || $edad == 10):
				$categoria = "Benjamín";
				break;
			case ($edad == 11 || $edad == 12):
				$categoria = "Alevín";
				break;
			case ($edad == 13 || $edad == 14):
				$categoria = "Infantil";
				break;
			case ($edad == 15 || $edad == 16):
				$categoria = "Infantil";
				break;
			case ($edad == 17 || $edad == 18):
				$categoria = "Juvenil";
				break;
			case ($edad >= 19):
				$categoria = "Senior";
				break;
			default:
				$categoria = "Otra";
				break;
		}
		return $categoria;
	}
?>