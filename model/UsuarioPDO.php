<?php
require_once "DBPDO.php";
/**
 * Operaciones del usuario que se va a loguear.
 * 
 * Operaciones del usuario que se va a loguear.
 * 
 * @author Pablo Domínguez Navarro
 */
class UsuarioPDO {
	/**
     * Crea la sentencia SQL a partir código y a la contraseña del usuario.
     *
     * @param 	String 		$codUsuario 	Código del usuario.
     * @param 	String 		$password 		Contraseña del usuario.
     * @return 	array[] 	$arrayUser		Datos del usuario.
     */
	public static function validarUsuario($codUsuario, $password) {
		$sentenciaSQL = "select * from Usuario where CodUsuario=? AND Password=?";
		$parametros = [$codUsuario, $password];
		$arrayUser = []; // Array que guardará los datos del usuario en caso de que exista.
        $resultSet = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros); // Ejecución de la consulta preparada.
		$usuario = $resultSet -> fetchObject();
		if ($resultSet -> rowCount()) { // Si encuentra al usuario guarda sus datos en un Array.
    		$arrayUser['codUsuario'] = $usuario -> CodUsuario;
            $arrayUser['descUsuario'] = $usuario -> DescUsuario;
            $arrayUser['password'] = $usuario -> Password;
            $arrayUser['perfil'] = $usuario -> Perfil;
            $arrayUser['ultimaConexion'] = $usuario -> UltimaConexion;
            $arrayUser['contadorAccesos'] = $usuario -> ContadorAccesos;
        }
		return $arrayUser;
	}
}
?>