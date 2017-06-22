<?php 
//09 Como ya se genero la entidad y el controlador del usuario y contraseña
//importamos el controlador

include '../controlador/UsuarioControlador.php';

//Vamos al final a obtener un resultado por AJAX
$resultado = array();

//Capurtamos los campos
if(isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])){
	// Ejecutamos el login del controlador por medio de la funcion estatica login se enviara un usuario y password
	 
	 $txtUsuario = $_POST["txtUsuario"];
	 $txtPassword = $_POST["txtPassword"];

	 $resultado = array("estado" => "true");
	
	//echo UsuarioControlador::login("admin","1234");
	if(UsuarioControlador::login($txtUsuario, $txtPassword)){
		//return print("Logeado");
		//Retornamos los valor en JSON para que sea entendido por Javascript para su validación por AJAX
		return print(json_encode($resultado));
	}
	
}

$resultado = array("estado" => "false");

return print(json_encode($resultado));