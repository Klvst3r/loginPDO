<?php 
// 09 Despues de generar la entidad creamos el controlador
//importamos UsuarioDao para utilizarlo en la clase definida
include '../datos/UsuarioDAO.php';
class UsuarioControlador {
	//definiendo la fncion con dos parametros, empaqueta el usuario y password en un objeto llamado usuario de entidad 
	// y lo enviara a UsuarioDAO para que lo valide
	public static function login($usuario, $password) {
		//Se instancia y no se importa porque ya esta agregado desde la entidad
		$obj_usuario = new Usuario();
		//Enviamos al objeto el usuario desde la aplicación
		$obj_usuario->setUsuario($usuario);
		$obj_usuario->setPassword($password);
		//La clase enviamos por el metodo los parametros del objeto (usuario y contraseña) como parametros del metodo
		//retornando el resuldao de la operación
		return UsuarioDAO::login($obj_usuario);
	}
}

 ?>