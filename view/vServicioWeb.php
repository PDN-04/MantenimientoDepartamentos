<?php
/**
 * Ventana principal de la aplicación.
 *
 * Autor: Pablo Domínguez Navarro 
 */
$nombreArchivo = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
	</head>
	<body>
		<header>
			<div class="menu">
				<img class="boton" src="images/menu.png"/>
				<span class="titulo">Mantenimiento Departamentos</span>
			</div>
			<nav>
				<ul>
					<li><a href="index.php?location=inicio">VOLVER<img src="images/back.png"/></a></li>
					<li><a href="index.php?location=inicio&logoff=true">CERRAR SESIÓN<img src="images/exit.png"/></a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>
					<h1>Comprueba tu DNI</h1>
					<?php
						if (isset($_SESSION['resultado'])) {
							echo $_SESSION['resultado'];
						}
					?>
					<form action="index.php?location=servicioWeb" method="post">
					    <p>
					    <label>DNI</label>
					    <input type="text" name="dni"/>
					    </p>
					    <p>
					    <input class="button" type="submit" name="comprobar" value="Comprobar"/>
					    </p>
				    </form>
				    <p style="margin-top: 20px">
				    ¿Quieres utilizar mi api SOAP? <a style="color: #FFFFFF" href="http://<?php echo $_SERVER["SERVER_ADDR"]; ?>/DAW204/public_html/dwes/mantenimiento/POO/sw/serviceSOAP.wsdl" target="_blank">Aqui</a> tienes el WSDL
				    </p>
				</article>
			</section>
		</main>
	</body>
</html>