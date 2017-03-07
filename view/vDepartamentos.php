<?php
/**
 * Ventana para ver los departamentos de la aplicación.
 *
 * Autor: Pablo Domínguez Navarro 
 */
$nombreArchivo = basename($_SERVER['PHP_SELF']);
$paginaRefrescada = isset($_SERVER['HTTP_CACHE_CONTROL']);
if($paginaRefrescada) {
   header("refresh:0; url = index.php?location=departamentos&departamentos=true");
}
$listaDepartamentos = $_SESSION['listaDepartamentos'];
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
					<li><a href="index.php?location=insertar">AÑADIR DEPARTAMENTO<img src="images/insertar.png"/></a></li>
					<li><a href="index.php?location=importar">IMPORTAR DEPARTAMENTOS<img src="images/importar.png"/></a></li>
					<li><a href="index.php?location=exportar&exportar=true">EXPORTAR DEPARTAMENTOS<img src="images/exportar.png"/></a></li>
					<li><a href="index.php?location=inicio">VOLVER<img src="images/back.png"/></a></li>
					<li><a href="index.php?location=inicio&logoff=true">CERRAR SESIÓN<img src="images/exit.png"/></a></li>
				</ul>
			</nav>
		</header>
		<main>
			<section>
				<article>
					<form action="index.php?location=buscar" method="post">
						<p>
							<input type="text" class="criterioBusqueda" name="criterioBusqueda" placeholder="Buscar departamento por descripción"
							value="<?php
									if (isset($_POST['buscar'])) { // Si se ha pulsado el botón de buscar, el valor del criterio de búsqueda será el que se haya escrito en el input.
										echo $_POST["criterioBusqueda"];
									}
									else {
									   echo "";
									}
								?>"/>
							<button class="buttonBuscar" name="buscar"><img src="images/buscar.png"/></button>
							<button class="buttonReset" name="reset"><img src="images/reset.png"/></button>
						</p>
					</form>	
					<?php
						if (!empty($listaDepartamentos)) { // Si hay departamentos se muestran en una tabla.
							echo "<table cellspacing='0'>";
							echo "<tr>";
							echo "<th>";
							echo "Código Departamento";
							echo "</th>";
							echo "<th>";
							echo "Descripción Departamento";
							echo "</th>";
							echo "<th>";
							echo "Acciones";
							echo "</th>";
							echo "</tr>";
					        foreach ($listaDepartamentos as $nDepartamento => $departamento) { // Se recogen de la sesión todos los departmentos y se muestran en la tabla.
					        	echo "<tr>";
					        	echo "<td>";
					        	echo $departamento -> getCodDepartamento();
					        	echo "</td>";
					        	echo "<td>";
					        	echo $departamento -> getDescDepartamento();
					        	echo "</td>";
					        	echo "<td>";
					        	// Se guarda el código y la descripción del departamento para poder enviarlo a través del método $_GET en el caso de que se quiera modificar o borrar el departamento.
					        	$codigo = $departamento -> getCodDepartamento();
					        	$descripcion = str_replace(" ", "_", $departamento -> getDescDepartamento());
					        	echo "<a href='index.php?location=borrar&borrar=true&codigo=$codigo'><img src='images/eliminar.png' width='24px' height='24px'/></a>";
								echo "<a href='index.php?location=modificar&modificar=true&codigo=$codigo&descripcion=$descripcion'><img src='images/modificar.png' width='24px' height='24px'/></a>";
					        	echo "</td>";
					        	echo "</tr>";
					        }
					    	echo "</table>";
						}
						else {
							echo "<p style='margin-top: 20px'>";
							echo "Lo sentimos no hay departamentos, ¿Por qué no pruebas a insertar uno?";
							echo "</p>";
						}
				        
				    ?>
				</article>
			</section>
		</main>
	</body>
</html>