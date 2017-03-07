<?php
/** 
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
		<header>
			<div class="menu">
				<img class="boton" src="images/menu.png"/>
				<span class="titulo">Mantenimiento Departamentos</span>
			</div>
			<nav>
				<ul>
					<li><a onclick="window.close()" target="_blank">CERRAR VENTANA<img src="images/close.png"/></a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article class="php">
					<h1><?php echo $_GET['nombreArchivo'] ?></h1>
					<?php
						show_source($_GET['nombreArchivo']); 
					?>
				</article>
			</section>
		</main>
	</body>
</html>