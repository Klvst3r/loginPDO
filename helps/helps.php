<?php

//Codigo que nos permitira hacer las validaciones de los campos desde el formulario por el metodo post
/**
 * Funcion que sirve para validar y limpiar un campo 
 * @param input $campo Tiene que ser campo de tipo POST
 * @return string
 */

function validar_campo($campo){
	//limpiamos espacios al inicio y al final
	$campo = trim($campo);
	//eliminamos las diagonales // que pueden ser peligrosas por medio del formulario
	$campo = stripcslashes($campo);
	//Uso de htmlspecialchar que limpia las etiquetas script de los campos enviados, etiquetas html <scrip>
	$campo = htmlspecialchars($campo);

	//ya limpio el campo de todos los problemas de seguridad se retorne el campo para cuando se ingrese o comparación con la BD
	return $campo;

}