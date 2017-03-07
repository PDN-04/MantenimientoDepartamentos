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
    if (isset($_POST['insertar'])) { // Si se ha pulsado el botón, se añade el departamento, se vuelven a buscar los departamentos y la aplicación 
        $correcto = true;
        $erroresCod = "";
        $erroresDesc = "";
        $codigo = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        // Si se encuentra un error en el formulario, la aplicación se redirige de nuevo a la página de inserción y se muestran los errores.
        if (strlen($codigo) > 3) {
            $correcto = false;
            $erroresCod = "long";
        }
        if (comprobarTexto($codigo)) {
            $correcto = false;
            $erroresCod = "incorrecto";
        }
        if (empty(trim($codigo))) {
            $correcto = false;
            $erroresCod = "empty";
        }
        if (comprobarAlfaNumerico($descripcion)) {
            $correcto = false;
            $erroresDesc = "incorrecto";
        }
        if (empty(trim($descripcion))) {
            $correcto = false;
            $erroresDesc = "empty";
        }
        if ($correcto) { // Si no hay ningún error, se añade el departamento, se vuelven a buscar los departamentos y la aplicación se redirige al mantenimiento.
            Departamento::insertarDepartamento($codigo, $descripcion);
            $_SESSION['listaDepartamentos'] = Departamento::buscarDepartamentos("");
            header("refresh:0; url = index.php?location=departamentos");
        }
        else {
            if ($erroresCod != "" && $erroresDesc != "") {
                header("refresh:0; url = index.php?location=insertar&erroresCod=$erroresCod&erroresDesc=$erroresDesc");
            }
            if ($erroresCod == "" && $erroresDesc != "") {
                header("refresh:0; url = index.php?location=insertar&erroresDesc=$erroresDesc&codigo=$codigo");
            }
            if ($erroresCod != "" && $erroresDesc == "") {
                header("refresh:0; url = index.php?location=insertar&erroresCod=$erroresCod&descripcion=$descripcion");
            }
        }
    }
    else {
        $usuario = $_SESSION['usuario']; // Se recupera el usuario almacenado en la sesión como objeto.
	    include 'view/layout.php';
    }
}
?>