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
					<h1>Modificar Departamento</h1>
					<form action="index.php?location=modificar&codigo=<?php echo $_GET['codigo'];?>" method="post">
						<p> 
							<label>Código Departamento</label> 
							<input type="text" name="codigo" disabled
							<?php
								if (isset($_GET["codigo"])) { // Código actual del departamento.
									echo "value=" . $_GET['codigo'];
								}
							?>
						</p>
						<p> 
							<label>Descripción Departamento</label> 
							<input type="text" name="descripcion"
							<?php
								if (isset($_GET["descripcion"])) { // Descripción actual del departamento.
									echo "value='" . str_replace("_", " ", $_GET['descripcion']) . "'";
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
						<input class="button" type="submit" name="modificar" value="Modificar"/>
					</form>
					<button class="button" onclick="window.location.href='index.php?location=departamentos'">Volver</button>
				</article>
			</section>
		</main>
	</body>
</html>