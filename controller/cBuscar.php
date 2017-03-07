<?php
/**
 * Controlador de los departamentos.
 *
 * Autor: Pablo Domínguez Navarro 
 */
require_once 'model/Departamento.php';

if (!isset($_SESSION['usuario'])) { // Si no se ha iniciado sesión la aplicaciónse redirige al login.
    header("refresh:0; url = index.php?location=login");
}
else {
    if (isset($_POST['buscar'])) { // Si se ha pulsado el botón, se buscan los departamentos y la aplicación se redirige al mantenimiento.
        $_SESSION['listaDepartamentos'] = Departamento::buscarDepartamentos($_POST['criterioBusqueda']);
        header("refresh:0; url = index.php?location=departamentos");
    }
    else {
        if (isset($_POST['reset'])) { // Si se ha pulsado el botón, se buscan los departamentos y la aplicación se redirige al mantenimiento.
        $_SESSION['listaDepartamentos'] = Departamento::buscarDepartamentos("");
        header("refresh:0; url = index.php?location=departamentos");
	    }
	    else {
	        $usuario = $_SESSION['usuario']; // Se recupera el usuario almacenado en la sesión como objeto.
	        include 'view/layout.php';
	    }
    }
}
?>