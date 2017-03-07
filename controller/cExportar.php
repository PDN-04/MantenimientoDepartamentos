<?php
/**
 * Controlador de los departamentos.
 *
 * Autor: Pablo Domínguez Navarro 
 */
require_once 'model/DBPDO.php';

if (!isset($_SESSION['usuario'])) { // Si no se ha iniciado sesión la aplicaciónse redirige al login.
    header("refresh:0; url = index.php?location=login");
}
else {
    if (isset($_GET['exportar'])) { // Si se ha pulsado el botón, se exportan los departamentos, se vuelven a buscar los departamentos y la aplicación se redirige al mantenimiento.
        $_SESSION['listaDepartamentos'] = Departamento::buscarDepartamentos("");
        Departamento::exportarDepartamentos($_SESSION['listaDepartamentos']);
        header("refresh:3; url = index.php?location=departamentos");
    }
    else {
        $usuario = $_SESSION['usuario']; // Se recupera el usuario almacenado en la sesión como objeto.
        include 'view/layout.php';
    }
}
?>