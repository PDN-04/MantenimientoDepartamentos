<?php
/**
 * Ventana de inicio de sesión.
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
					<li class="submenu">
						<a href="#">CÓDIGOS FUENTE<img src="images/circle-down.png"/></a>
						<ul class="children">
							<li><a href="source.php?nombreArchivo=index.php" target="_blank">index.php</a></li>
							<li><a href="source.php?nombreArchivo=config/config.php" target="_blank">config.php</a></li>
							<li><a href="source.php?nombreArchivo=view/layout.php" target="_blank">layout.php</a></li>
							<li><a href="source.php?nombreArchivo=view/vLogin.php" target="_blank">vLogin.php</a></li>
							<li><a href="source.php?nombreArchivo=view/vInicio.php" target="_blank">vInicio.php</a></li>
							<li><a href="source.php?nombreArchivo=view/vDepartamentos.php" target="_blank">vDepartamentos.php</a></li>
							<li><a href="source.php?nombreArchivo=view/vInsertar.php" target="_blank">vInsertar.php</a></li>
							<li><a href="source.php?nombreArchivo=view/vModificar.php" target="_blank">vModificar.php</a></li>
							<li><a href="source.php?nombreArchivo=view/vImportar.php" target="_blank">vImportar.php</a></li>
							<li><a href="source.php?nombreArchivo=view/vServicioWeb.php" target="_blank">vServicioWeb.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cLogin.php" target="_blank">cLogin.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cInicio.php" target="_blank">cInicio.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cDepartamentos.php" target="_blank">cDepartamentos.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cBuscar.php" target="_blank">cBuscar.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cInsertar.php" target="_blank">cInsertar.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cModificar.php" target="_blank">cModificar.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cBorrar.php" target="_blank">cBorrar.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cImportar.php" target="_blank">cImportar.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cExportar.php" target="_blank">cExportar.php</a></li>
							<li><a href="source.php?nombreArchivo=controller/cServicioWeb.php" target="_blank">cServicioWeb.php</a></li>
							<li><a href="source.php?nombreArchivo=config/DBConfig.php" target="_blank">DBConfig.php</a></li>
							<li><a href="source.php?nombreArchivo=model/DBPDO.php" target="_blank">DBPDO.php</a></li>
							<li><a href="source.php?nombreArchivo=model/Usuario.php" target="_blank">Usuario.php</a></li>
							<li><a href="source.php?nombreArchivo=model/UsuarioPDO.php" target="_blank">UsuarioPDO.php</a></li>
							<li><a href="source.php?nombreArchivo=model/Departamento.php" target="_blank">Departamento.php</a></li>
							<li><a href="source.php?nombreArchivo=model/DepartamentoPDO.php" target="_blank">DepartamentoPDO.php</a></li>
						</ul>
					</li>
					<li><a href="diagrama.php" target="_blank">DIAGRAMA DE CLASES<img src="images/view.png"/></a></li>
					<li><a href="navegacion.php" target="_blank">MAPA DE NAVEGACIÓN<img src="images/view.png"/></a></li>
					<li><a href="almacenamiento.php" target="_blank">ESTRUCUTRA ALMACENAMIENTO<img src="images/view.png"/></a></li>
					<li><a href="doc/index.html" target="_blank">DOCUMENTACIÓN GENERADA<img src="images/view.png"/></a></li>
					<li><a onclick="window.close()" target="_blank">CERRAR VENTANA<img src="images/close.png"/></a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>
					<h1>Iniciar Sesión</h1>
					<?php
						if (isset($_GET["errorLogin"])) { // Si existe un error al validar el usuario, se muestra.
							echo "<span class='campoerror'>Usuario o contraseña incorrectos</span>";
						}
					?>
					<form action="controller/cLogin.php" method="post">
						<p> 
							<label>Usuario</label> 
							<input type="text" name="usuario"/>
						</p>
						<p> 
							<label>Contraseña</label> 
							<input type="password" name="password"/>
						</p>
						<input class="button" type="submit" name="login" value="Iniciar Sesión"/>
					</form>
				</article>
			</section>
		</main>
	</body>
</html>