<?php 
//09 Como ya se genero la entidad y el controlador del usuario y contraseña
//importamos el controlador
include '../controlador/UsuarioControlador.php';

//Uso de la funcion validar
include('../helps/helps.php');


//Header JSON PHP
header('Content-type: application/json');

//Vamos al final a obtener un resultado por AJAX
$resultado = array();

//La peticion que se hacer al servidor sea de tipo post 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//Capurtamos los campos
	if(isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])){
		// Ejecutamos el login del controlador por medio de la funcion estatica login se enviara un usuario y password
		 
		 //antes de la validación de los helps para su validación 
		 //$txtUsuario = $_POST["txtUsuario"];
		 //Post definition helps.php
		 $txtUsuario = validar_campo($_POST["txtUsuario"]);

		 //$txtPassword = $_POST["txtPassword"];
		 //se limpia de todos los elementos con problemas
		 $txtPassword = validar_campo($_POST["txtPassword"]);

		 $resultado = array("estado" => "true");
		
		//echo UsuarioControlador::login("admin","1234");
		if(UsuarioControlador::login($txtUsuario, $txtPassword)){
			//return print("Logeado");
			//Retornamos los valor en JSON para que sea entendido por Javascript para su validación por AJAX
			//return print(json_encode($resultado));
			
			//por medio del controlador duplicamos 
			$usuario  = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
			//por que estamos retornando el objeto con sus funciones
			echo $usuario->getNombre();
			
		}
		
	}
}

$resultado = array("estado" => "false");

return print(json_encode($resultado));