<?php
require_once "UsuarioPDO.php";
/**
 * Usuario que se va a loguear.
 * 
 * Usuario que se va a loguear.
 * 
 * @author Pablo Domínguez Navarro
 */
class Usuario {
	// Atributos de la clase.
    protected $codUsuario;
    protected $descUsuario;
    protected $password;
    protected $perfil;
    protected $ultimaConexion;
    protected $contadorAccesos;

     /**
     * Constructor.
     *
     * @param   String      $codUsuario         Código del usuario.
     * @param   String      $descUsuario        Descripción del usuario.
     * @param   String      $password           Contraseña del usuario.
     * @param   String      $perfil             Perfil del usuario.
     * @param   String      $ultimaConexion     Última conexión del usuario.
     * @param   String      $contadorAccesos    Contador de accesos del usuario.
     */
    public function __construct($codUsuario, $descUsuario, $password, $perfil, $ultimaConexion, $contadorAccesos) {
    	$this->codUsuario = $codUsuario;
        $this->descUsuario = $descUsuario;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->ultimaConexion = $ultimaConexion;
        $this->contadorAccesos = $contadorAccesos;
    }
    /**
     * Comprueba que el usuario que se va a loguear existe.
     *
     * @param   String      $codUsuario         Código del usuario.
     * @param   String      $password           Contraseña del usuario.
     * @return  Usuario     $usuarioObjeto      Usuario que se ha logueado.
     */
    public static function validarUsuario($codUsuario, $password) {
    	$usuarioObjeto = null;
    	$usuario = UsuarioPDO::validarUsuario($codUsuario, $password); // Array que contiene los datos del usuario.
    	if ($usuario) { // Si el usuario existe, se crea el objeto con los datos del usuario.
    		$usuarioObjeto = new Usuario($codUsuario, $usuario['descUsuario'], $password, $usuario['perfil'], $usuario['ultimaConexion'], $usuario['contadorAccesos']);
    	}
    	return $usuarioObjeto;
    }
}
?>