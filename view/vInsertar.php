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
					<h1>Añadir Departamento</h1>
					<form action="index.php?location=insertar" method="post">
						<p> 
							<label>Código Departamento</label> 
							<input type="text" name="codigo"
							<?php
								if (isset($_GET["codigo"])) {
									echo "value=" . $_GET['codigo'];
								}
							?>
							/>
							<?php
								if (isset($_GET["erroresCod"])) { // Si existe un error al validar el código, se muestra.
									switch ($_GET["erroresCod"]) {
									    case "long":
									        echo "<span class='campoerror'>" . "Campo incorrecto" . "</span>";
									        break;
									    case "incorrecto":
									        echo "<span class='campoerror'>" . "Campo incorrecto" . "</span>";
									        break;
									    case "empty":
									        echo "<span class='campoerror'>" . "Campo vacío" . "</span>";
									        break;
									}
								}
							?>
						</p>
						<p> 
							<label>Descripción Departamento</label> 
							<input type="text" name="descripcion"
							<?php
								if (isset($_GET["descripcion"])) {
									echo "value=" . $_GET['descripcion'];
								}
							?>
							/>
							<?php
								if (isset($_GET["erroresDesc"])) { // Si existe un error al validar la descripción, se muestra.
									switch ($_GET["erroresDesc"]) {
									    case "incorrecto":
									        echo "<span class='campoerror'>" . "Campo incorrecto" . "</span>";
									        break;
									    case "empty":
									        echo "<span class='campoerror'>" . "Campo vacío" . "</span>";
									        break;
									}
								}
							?>
						</p>
						<input class="button" type="submit" name="insertar" value="Insertar"/>
					</form>
					<button class="button" onclick="window.location.href='index.php?location=departamentos'">Volver</button>
				</article>
			</section>
		</main>
	</body>
</html>