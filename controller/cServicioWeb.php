<?php
/**
 * Controlador del servicio web.
 *
 * Autor: Pablo Domínguez Navarro 
 */

if (!isset($_SESSION['usuario'])) { // Si no se ha iniciado sesión la aplicaciónse redirige al login.
    header("refresh:0; url = index.php?location=login");
}
else {
    if (isset($_POST['comprobar'])) { // Si se ha pulsado el botón, se borra el departamento, se vuelven a buscar los departamentos y la aplicación se redirige al mantenimiento.
        if (class_exists('SoapClient')) {
            $clienteSOAP = new SoapClient("http://" . $_SERVER["SERVER_ADDR"] . "/DAW204/public_html/dwes/mantenimiento/POO/sw/serviceSOAP.php?wsdl", array(
                'location' => "http://" . $_SERVER["SERVER_ADDR"] . "/DAW204/public_html/dwes/mantenimiento/POO/sw/serviceSOAP.php",
                'uri'      => "http://" . $_SERVER["SERVER_ADDR"] . "/DAW204/public_html/dwes/mantenimiento/POO/sw/"
                                ));
                $dni = $_POST['dni'];
                $correcto = $clienteSOAP->comprobarDNI($dni);
            if ($correcto) {
                $_SESSION['resultado'] = "¡DNI correcto!";
            }
            else {
                $_SESSION['resultado'] = "Lo sentimos, tu DNI no es válido";
            }
        }
        else {
            $_SESSION['resultado'] = "Lo sentimos, pero la Clase 'SoapClient' no existe en el servidor";
        }
        header("refresh:0; url = index.php?location=servicioWeb");      
    }
    else {
        $usuario = $_SESSION['usuario']; // Se recupera el usuario almacenado en la sesión como objeto.
        include 'view/layout.php';
    }
}
?>