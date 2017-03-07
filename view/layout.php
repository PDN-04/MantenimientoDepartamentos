<?php
/**
 * Controla la vista que se va a mostrar en base a la página actual del usuario.
 *
 * Autor: Pablo Domínguez Navarro 
 */
$nombreArchivo = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/main.js"></script>
		<link rel="icon" type="image/png" href="images/favicon.png"/>
		<link rel="stylesheet" href="css/estilos.css"/>
		<title>Mantenimiento Departamentos</title>
	</head>
	<body>
		<?php
	    $layout = "view/vInicio.php"; // Por defecto, el layout será la vista de inicio.
	    if (isset($_GET['location']) && isset($vistas[$_GET['location']])) { // Si se ha indicado localización y si ésta existe en el array $vistas de config.php, se establecerá la vista correspondiente a esa localización.
	        $layout = $vistas[$_GET['location']];
	    }else {
	        $_GET['location'] = 'login';
	        $layout = $vistas[$_GET['location']];
	    }
	    include $layout; // Se muestra la vista elegida.
	    ?>
	</body>
</html>