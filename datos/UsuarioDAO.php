<?php 
//Capa de Usuario Data Access Object

//Importamos la conexión
include 'Conexion.php';
include '../entidades/Usuario.php';
//Extiende la conexión, heredando todo lo que tenga Conexion que es la funcion conectar y poder usar lo contendio.
class UsuarioDAO extends Conexion {
	//Variable protegida
	protected static $cnx;

	//Funcion que permite conectar en todo momento
	private static function getConexion(){
		//self para invoccar a esta clase en si e invocar a $cnx
		/*Con esto la variable cnx que se generado, se llene de la conexion cuando se establece la propia conexion*/
		self::$cnx = Conexion::conectar();
	}

	//Metodo para desconectarnos de la BD
	/* Private por que no se utilizaran en ningun otro caso o de manera externa y son de ambito privado 
	   consiguiendo el concepto de encapsulamiento */
	private static function desconectar(){
		//Se cerrara la conexion en PDO
		self::$cnx = null;
	}

	//Metodo para logear al usuario
	// Esta funcion lo que recibira es un usuario como parametro y sera la entidad lo que recibira
	//	la entidad usuario importada en el segundo include
	/* Metodo que sirve para validar el login
     * @param object $usuario
	 * @return boolean
	 */
	public static function login($usuario){
		// Se genera un query seleccionando los campos que seran enviados via AJAXC y que no comprometan la seguridad
		// del sistema al ser visibles vuia HTML.
		
		/*
		$query = "SELECT id, nombre, usuario, email, privilegio, fecha_registro FROM usuarios WHERE usuario = :usuario AND 
		password = :password";
		*/
		
		//Seleccionamos toda la información del usuario 
		$query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
		
		//iniciar la conexion
		self::getConexion();
		//Devuelve el resultado, preparando la consulta
		$resultado = self::$cnx->prepare($query);

		//Se envian los parametros el usuario, el objeto $usuario, para el usuario del formulario
		
		$user = $usuario->getUsuario();


		$resultado->bindParam(":usuario", $user);
		//Lo mismo con el password, Pasandole el parametro directamente a este query
		
		$pass = $usuario->getPassword();


		$resultado->bindParam(":password", $pass);

		//Ejecutamos la consulta la conexion de tipo PDO
		$resultado->execute();

		//Contabilizamos el resultado, si hay resultados true en caso contrario false
		//Se corrige ya que el resultado esta en un objeto estatico y no en la variable $resultado
		//if(count($resultado)){
		if($resultado->rowCount() > 0){
			//return true;
			//Si se desea verificar resultado positivo y generara la salida en booleano del numero de resualtados de la consulta
			//return "OK";
			//Retorna el numero de filas con la función fetch y lo tratara como un array
			$filas = $resultado->fetch();

			//Validamos contra inyecion SQL en el lado del BackEnd
			if($filas['usuario'] == $user && $filas['password'] == $pass){

				return true;
				//return "OK";
				
			}//if filas
	
		}
		//en todo momento retornamos false salvo que existan valores contabilizados de la consulta
		return false;
		//Si se desea comprobar resultado falso
		//return "Falso";
	}

	/*
	 Despues de hacer la validación hay que obtener el usuario
	 */
	/**
	 * Metodo que sirve para obtener un usuario
	 *
	 * @param object $usuario
	 * @return object
	 */
	
	 public static function getUsuario($usuario){
		// Hay que especificar que campos necesitamos

		$query = "SELECT id, nombre, email, usuario, privilegio, fecha_registro FROM usuarios WHERE usuario = :usuario AND 
		password = :password";
		
		self::getConexion();
		
		$resultado = self::$cnx->prepare($query);

		$user = $usuario->getUsuario();
		$resultado->bindParam(":usuario", $user);
		
		$pass = $usuario->getPassword();
		$resultado->bindParam(":password", $pass);

		//$resultado->bindParam(":usuario", $usuario->getUsuario());
		//$resultado->bindParam("password", $usuario->getPassword());
		
		$resultado->execute();

		$filas = $resultado->fetch();

		$usuario = new Usuario();
		//Enviamos la información por medio de sus propiedades
		//De esta manera tendremos ya cargado en el nuevo objeto en la instancia de la entidad 
		$usuario->setId($filas["id"]);
		$usuario->setNombre($filas["nombre"]);
		$usuario->setUsuario($filas["usuario"]);
		$usuario->setEmail($filas["email"]);
		$usuario->setPrivilegio($filas["privilegio"]);
		$usuario->setFecha_registro($filas["fecha_registro"]);

		//Retornamos la entidad
		return $usuario;
		
	} //function getUsuario

}

 ?>