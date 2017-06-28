<?php 
//importamos el controlador
include '../controlador/UsuarioControlador.php';

//Uso de la funcion validar
include('../helps/helps.php');

//Podemos hacer que el usuario que se cree se logee automaticamente
session_start();

//La peticion que se hacer al servidor sea de tipo post 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//Validamos los campops enviados desde el formulario
	if(isset($_POST["txtNombre"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])){
		
		 
		 //Se validan las variables con los helps
		 $txtNombre= validar_campo($_POST["txtNombre"]);
		 $txtEmail = validar_campo($_POST["txtEmail"]);
		 $txtUsuario = validar_campo($_POST["txtUsuario"]);
		 $txtPassword = validar_campo($_POST["txtPassword"]);
		 $txtPrivilegio = 2;

		if(UsuarioControlador::registrar($txtNombre, $txtEmail, $txtUsuario, $txtPassword, $txtPrivilegio)){

			$usuario  = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);

			//Ya con la variable de sessión le asignamos el valor a un array asociativo
			$_SESSION["usuario"] = array(
				"id"		=> $usuario->getId(),
				"nombre"	=> $usuario->getNombre(),
				"usuario"	=> $usuario->getUsuario(),
				"email"		=> $usuario->getEmail(),
				"privilegio"=> $usuario->getPrivilegio()
				);
			
			//Se decidira a donde enviarse y que tipo de usuario
			header("location:admin.php"); 
		}
		
	}
}else{

//En el caso de que no se registre el usuario enviara a registro
header("location:registro.php?error=1"); 
}