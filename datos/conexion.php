<?php
 class Conexion {
 	/*
 	 * Conexión a la base de datos
 	 * @return conexion PDO
 	 *
 	 */ 

	public static function conectar(){
		try {
			$cn = new PDO("mysql:host=localhost;dbname=login-php","klvst3r","milord");

			//echo "Connection Successful";
			return $cn;

		} catch(Exception $ex) {
			die($ex->getMessage());
		  }
	}
}

//Se autoinstancia la conexion en modo de prueba a traves de un metodo estatico ::
//Conexion::conectar();