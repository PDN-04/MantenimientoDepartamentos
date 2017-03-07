<?php
/**
 * Ventana para insertar un departamento en la base de datos de la aplicación.
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
					<li><a href="index.php?location=inicio&logoff=true">CERRAR SESIÓN<img src="images/exit.png"/></a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>
					<h1>Importar Departamentos</h1>
					<?php
						if (isset($_GET["error"])) { // Si existe un error al validar el usuario, se muestra.
							echo "<span class='campoerror'>El fichero no existe</span>";
						}
					?>
					<p style="margin-bottom: 20px">
						Si no sabes el formato que debe tener el documento XML puedes descargarte una plantilla <a href="plantilla.xml" download="plantilla.xml" style="color: #FFF">Aquí</a>
					</p>
					<form action="index.php?location=importar" method="post" enctype="multipart/form-data">
						<p>
							<input type="file" name="fichero"/>
						</p>
						<input class="button" type="submit" name="importar" value="Importar"/>
					</form>
					<button class="button" onclick="window.location.href='index.php?location=departamentos'">Volver</button>
				</article>
			</section>
		</main>
	</body>
</html>