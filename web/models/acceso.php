<?php
require_once 'ModeloBase.php';
class acceso extends ModeloBase {

	private $id;
	private $rol;
	private $nombre;
	private $password;
	private $email;
	private $telefono;
	private $explotacion;
        
        public function __construct() {
            parent::__construct();
        }
	function getId () {
		return $this->id;
	}
	function getRol () {
		return $this->rol;
	}
	function getNombre () {
		return $this->nombre;
	}
	function getPassword () {
		return $this->password;
	}
	function getEmail () {
		return $this->email;
	}
	function getTelefono () {
		return $this->telefono;
	}
	function getExplotacion () {
		return $this->explotacion;
	}
	function setRol ($rol) {
		$this->id= $rol;


	}
	function setNombre ($nombre) {
		$this->nombre = $nombre;


	}
	function setPassword ($password) {
		$this->password = $password;


	}
	function setEmail ($email) {
		
		$this->email =$email;

	}
	function setTelefono ($telefono) {
		$this->$telefono =$telefono;
	}        
	function setExplotacion ($explotacion) {
		$this->$explotacion =$explotacion;
	}
        
        public function consultaUsuario ($nombre,$password){
            $sql = "SELECT * FROM ACCESSO WHERE nombre = '$nombre' AND password='$password'";
            $guardado = $this->db->query($sql);
            print_r($guardado);
            return $guardado;
            
            
        }

}