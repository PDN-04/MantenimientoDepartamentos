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
    if (isset($_POST['modificar'])) { // Si se ha pulsado el botón, se modifica el departamento, se vuelven a buscar los departamentos y la aplicación se redirige al mantenimiento.
        $correcto = true;
        $erroresDesc = "";
        $codigo = $_GET['codigo'];
        $descripcion = $_POST['descripcion'];
        // Si se encuentra un error en el formulario, la aplicación se redirige de nuevo a la página de modificación y se muestran los errores.
        if (comprobarAlfaNumerico($descripcion)) {
            $correcto = false;
            $erroresDesc = "incorrecto";
        }
        if (empty(trim($descripcion))) {
            $correcto = false;
            $erroresDesc = "empty";
        }
        if ($correcto) { // Si no hay ningún error, se modifica el departamento, se vuelven a buscar los departamentos y la aplicación se redirige al mantenimiento.
            Departamento::modificarDepartamento($codigo, $descripcion);
            $_SESSION['listaDepartamentos'] = Departamento::buscarDepartamentos("");
            header("refresh:0; url = index.php?location=departamentos");
        }
        else {
            header("refresh:0; url = index.php?location=modificar&erroresDesc=$erroresDesc&codigo=$codigo");
        }
    }
    else {
        $usuario = $_SESSION['usuario']; // Se recupera el usuario almacenado en la sesión como objeto.
	    include 'view/layout.php';
    }
}
?>