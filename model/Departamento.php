<?php
require_once "DepartamentoPDO.php";
/**
 * Departamentos que hay en la aplicación.
 * 
 * Departamentos que hay en la aplicación.
 * 
 * @author Pablo Domínguez Navarro
 */
class Departamento {
	// Atributos de la clase.
    protected $codDepartamento;
    protected $descDepartamento;

     /**
     * Constructor.
     *
     * @param   String      $codDepartamento         Código del departamento.
     * @param   String      $descDepartamento        Descripción del departamento.
     */
    public function __construct($codDepartamento, $descDepartamento) {
    	$this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
    }
    /**
     * Busca departamentos a partir de su descripción.
     *
     * @param   String      $descripcion            Descripción del departamento.
     * @return  array[]     $arrayDepartamentos     Array que contiene los departamentos encontrados.
     */
    public static function buscarDepartamentos($descripcion) {
        $matrizDepartamentos = DepartamentoPDO::buscarDepartamentos($descripcion);
        $arrayDepartamentos = [];
        foreach ($matrizDepartamentos as $departamento) {
            $departamentoObjeto = new Departamento($departamento['CodDepartamento'], $departamento['DescDepartamento']);
            array_push($arrayDepartamentos, $departamentoObjeto);
        }
        return $arrayDepartamentos;
    }
    /**
     * Inserta un departamento a partir de su código y descripción.
     *
     * @param   String      $codigo         Código del departamento.
     * @param   String      $descripcion    Descripción del departamento.
     * @return  boolean     $correcto       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function insertarDepartamento($codigo, $descripcion) {
        $departamentoObjeto = new Departamento($codigo, $descripcion);
        $correcto = DepartamentoPDO::insertarDepartamento($codigo, $descripcion);
        return $correcto;
    }
    /**
     * Borra un departamento a partir de su código.
     *
     * @param   String      $codigo         Código del departamento.
     * @return  boolean     $correcto       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function borrarDepartamento($codigo) {
        $correcto = DepartamentoPDO::borrarDepartamento($codigo);
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
        $correcto = DepartamentoPDO::modificarDepartamento($codigo, $descripcion);
        return $correcto;
    }
    /**
     * Importa los departamentos de un fichero XML.
     *
     * @param   Object      $fichero        Fichero que contiene todos los departamentos.
     * @return  boolean     $correcto       Concreta si la operación se ha realizado correctamente o no.
     */
    public static function importarDepartamentos($fichero) {
        $correcto = true;
        if (file_exists($fichero)) {
         $fichero = simplexml_load_file($fichero);
         if (DepartamentoPDO::importarDepartamentos($fichero)){
             $correcto = false;
         }
        }
        return $correcto;
    }
    /**
     * Exporta todos los departamentos a un fichero XML.
     *
     * @param   array[]     $departamentos     Array que contiene todos los departamentos.
     */
    public static function exportarDepartamentos($departamentos) {
        $xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><Departamentos></Departamentos>");
        header('Content-type: text/xml');
        foreach ($departamentos as $departamento) {
            $padre = $xml->addChild('Departamento');
            $padre -> addChild('CodDepartamento', $departamento->getCodDepartamento());
            $padre -> addChild('DescDepartamento', $departamento->getDescDepartamento());
        }
        header('Content-Disposition: attachment; filename="departamentos.xml"');
        print $xml -> asXML();
        exit();
    }
    /**
     * Devuelve el código de un departamento.
     *
     * @return  String     $this->codDepartamento      Código del departamento.
     */
    public function getCodDepartamento() {
        return $this->codDepartamento;
    }
    /**
     * Devuelve la descripción de un departamento.
     *
     * @return  String     $this->descDepartamento      Descripción del departamento.
     */
    public function getDescDepartamento() {
        return $this->descDepartamento;
    }
}
?>