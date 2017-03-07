<?php
/**
 * Controlador de los departamentos.
 *
 * Autor: Pablo Domínguez Navarro 
 */
include "funciones.php";
require_once 'model/Departamento.php';

if (!isset($_SESSION['usuario'])) { // Si no se ha iniciado sesión la aplicaciónse redirige al login.
    header("refresh:0; url = index.php?location=login");
}
else {
    if (isset($_POST['importar'])) { // Si se ha pulsado el botón, se importan los departamentos, se vuelven a buscar los departamentos y la aplicación se redirige al mantenimiento.
        $error = false;
        if (isset($_FILES['fichero']['tmp_name'])) {
            $fichero = $_FILES['fichero']['tmp_name'];
            Departamento::importarDepartamentos($fichero);
            $_SESSION['listaDepartamentos'] = Departamento::buscarDepartamentos("");
            header("refresh:0; url = index.php?location=departamentos");
        }
        else {
            $error = true;
            header("refresh:0; url = index.php?location=importar&error=$error");
        }
    }
    else {
        $usuario = $_SESSION['usuario']; // Se recupera el usuario almacenado en la sesión como objeto.
	    include 'view/layout.php';
    }
}
?>
