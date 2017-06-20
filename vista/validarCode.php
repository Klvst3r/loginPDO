<?php 
//09 Como ya se genero la entidad y el controlador del usuario y contraseña
//importamos el controlador

include '../controlador/UsuarioControlador.php';

// Ejecutamos el login del controlador por medio de la funcion estatica login se enviara un usuario y password
echo UsuarioControlador::login("admin ","1234");