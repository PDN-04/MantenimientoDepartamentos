<?php
/**
 * Configuración para la navegación entre páginas.
 *
 * Autor: Pablo Domínguez Navarro
 */
$controladores =[ // Array con la lista de controladores disponibles.
    'inicio' => 'controller/cInicio.php',
    'login' => 'controller/cLogin.php',
    'departamentos' => 'controller/cDepartamentos.php',
    'buscar' => 'controller/cBuscar.php',
    'insertar' => 'controller/cInsertar.php',
    'borrar' => 'controller/cBorrar.php',
    'modificar' => 'controller/cModificar.php',
    'importar' => 'controller/cImportar.php',
    'exportar' => 'controller/cExportar.php',
    'servicioWeb' => 'controller/cServicioWeb.php'
];
$vistas = [ // Array con la lista de vistas disponibles.
    'inicio' => 'view/vInicio.php',
    'login' => 'view/vLogin.php',
    'departamentos' => 'view/vDepartamentos.php',
    'insertar' => 'view/vInsertar.php',
    'modificar' => 'view/vModificar.php',
    'importar' => 'view/vImportar.php',
    'servicioWeb' => 'view/vServicioWeb.php'
];
?>