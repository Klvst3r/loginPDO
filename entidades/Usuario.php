<?php 

class Usuario {
	//variables de acuerdo a las columnas en la tabla, definidas como propiedades de nuestra clase

	//Propiedades privadas
	private $id;
	private $nombre;
	private $usuario;
	private $email;
	private $password;
	private $privilegio;
	private $fecha_registro;

	/*Los geter y setter son las funciones que nos van a permitir ingresar a las propiedades definidas 
	para que se mantengan encapsuladas y el ingreso o acceso a estas sea por medio de los siguientes metodos 
	geters y setters*/

	/*
	Google: php getter and setters generator a falta de plugin pegando la clase en:
	http://mikeangstadt.name/projects/getter-setter-gen/
	Generar y establecer
	*/

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getPrivilegio(){
		return $this->privilegio;
	}

	public function setPrivilegio($privilegio){
		$this->privilegio = $privilegio;
	}

	public function getFecha_registro(){
		return $this->fecha_registro;
	}

	public function setFecha_registro($fecha_registro){
		$this->fecha_registro = $fecha_registro;
	}

}