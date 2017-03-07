<?php
require_once "DBPDO.php";
/**
 * Operacaciones de los departamentos.
 * 
 * Operacaciones de los departamentos.
 * 
 * @author Pablo Domínguez Navarro
 */
class DepartamentoPDO {
	/**
     * Busca departamentos a partir de su descripción.
     *
     * @param   String      $descripcion            Descripción del departamento.
     * @return  array[]     $arrayDepartamentos     Array que contiene los departamentos encontrados.
     */
	public static function buscarDepartamentos($descripcion) {
		$sentenciaSQL = "select * from Departamento where DescDepartamento like ?";
		$parametros = ["%$descripcion%"];
        $arrayDepartamento = []; // Array que guardará los datos de los departamentos en caso de que los encuentre.
        $resultSet = DBPDO::ejecutaConsulta($sentenciaSQL, $parametros); // Ejecución de la consulta preparada.
        if ($resultSet -> rowCount()) { // Si encuentra departamentos guarda sus datos en un Array.
            $arrayDepartamento = $resultSet -> fetchAll();
        }
        return $arrayDepartamento;
	}
    /**
     * Inserta un departamento a partir de su código y descripción.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Descripción del departamento.
     * @return  boolean     $correcto       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function insertarDepartamento($codigo, $descripcion) {
        $sentenciaSQL = "insert into Departamento values (?,?)";
        $parametros = [$codigo, $descripcion];
        $correcto = false;
        if (DBPDO::ejecutaConsulta($sentenciaSQL, $parametros)) {
            $correcto = true;
        }
        return $correcto;
    }
    /**
     * Borra un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @return  boolean     $correcto       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function borrarDepartamento($codigo) {
        $sentenciaSQL = "delete from Departamento where CodDepartamento=?";
        $parametros = [$codigo];
        $correcto = false;
        if (DBPDO::ejecutaConsulta($sentenciaSQL, $parametros)) {
            $correcto = true;
        }
        return $correcto;
    }
    /**
     * Modifica la descripción de un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Nueva descripción del departamento.
     * @return  boolean     $correcto       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function modificarDepartamento($codigo, $descripcion) {
        $sentenciaSQL = "update Departamento set DescDepartamento=? where CodDepartamento=?";
        $parametros = [$descripcion, $codigo];
        $correcto = false;
        if (DBPDO::ejecutaConsulta($sentenciaSQL, $parametros)) {
            $correcto = true;
        }
        return $correcto;
    }
    /**
     * Importa los departamentos de un fichero XML.
     *
     * @param   Object      $fichero        Fichero que contiene todos los departamentos.
     * @return  boolean     $correcto       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function importarDepartamentos($fichero){
        $sentenciaSQL = "insert into Departamento values (?,?)";
        $correcto = false;
        foreach ($fichero->Departamento as $departamento) {
            $codigo = $departamento->CodDepartamento;
            $descripcion = $departamento->DescDepartamento;
            $parametros = [$codigo, $descripcion];
            if (DBPDO::ejecutaConsulta($sentenciaSQL, $parametros)) {
                $correcto = true;
            }
        }
        return $correcto;
    }
}
?>