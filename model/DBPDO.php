<?php
if (!strpos(dirname($_SERVER['PHP_SELF']), 'controller')) {
    require_once "config/DBConfig.php";
}
else {
    require_once "../config/DBConfig.php";
}
/**
 * Conexión a la base de datos.
 * 
 * Conexión a la base de datos.
 * 
 * @author Pablo Domínguez Navarro
 */
class DBPDO {
	/**
	 * Ejecuta una sentencia SQL.
	 * 
	 * @param 	String 			$sentenciaSQL 		Sentencia preparada SQL.
     * @param 	array[] 		$parametros 		Parámetros de la consulta.
     * @return 	PDOStatement 	$consultaPreparada 	Información del registro.
	*/
	public static function ejecutaConsulta($sentenciaSQL, $parametros) {
		try {
			$conexion = new PDO(DSN, USUARIO, PASSWORD); // Creación de la conexión utilizando las variables de configuración.
			$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Definición de atributos que permiten el lanzamiento de excepciones.
			$consultaPreparada = $conexion -> prepare($sentenciaSQL); // Preparación de la consulta.
			$consultaPreparada -> execute($parametros); // Lanzamiento de la consulta preparada utlizando los parámetros.
		} catch (PDOException $excepcion) {
			$consultaPreparada = null;
		} finally {
			unset($conexion); // Cierre de la conexión.
		}
		return $consultaPreparada;
	}
}
?>