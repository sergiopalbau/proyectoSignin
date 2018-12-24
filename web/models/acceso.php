<?php

class acceso {

	private $id;
	private $rol;
	private $nombre;
	private $password;
	private $email;
	private $telefono;
	private $explotacion;

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

}