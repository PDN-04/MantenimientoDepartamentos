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
					<li><a href="index.php?location=departamentos&departamentos=true">MANTENIMIENTO DEPARTAMENTOS<img src="images/insertar.png"/></a></li>
					<li><a href="index.php?location=servicioWeb">COMPRUEBA TU DNI<img src="images/view.png"/></a></li>
					<li><a href="index.php?location=inicio&logoff=true">CERRAR SESIÓN<img src="images/exit.png"/></a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>
					<h1>¡Bienvenido!</h1>
					<h2>Características de la aplicación:</h2>
					<p style="margin-top: 20px">
						<ul style="width: 50%; margin: 0 auto; text-align: left">
							<li><b>Añadir departamento:</b> Se añadirá un departamento en el caso de que su código o descripción no coincidan con ninguno que ya exista en la base de datos.</li>
							<li><b>Borrar departamento:</b> Se realizará la baja total del departamento seleccionado.</li>
							<li><b>Modificar departamento:</b> Se modificará un departamento en el caso de que la descripción introducida no coincida con ninguna de la base de datos.</li>
							<li><b>Buscar departamentos:</b> Se buscan los departamentos por su descripción.</li>
							<li><b>Importar departamentos:</b> Se importan departamentos a partir de un fichero XML que cumpla las reglas.</li>
							<li><b>Exportar departamentos:</b> Se exportan todos los departamentos a un documento XML que se descargará en el ordenador del usuario.</li>
						</ul>
					</p>
				</article>
			</section>
		</main>
	</body>
</html>