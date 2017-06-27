<?php

include 'partials/head.php';

 //session_start();
//redirigir dependiendo de los privilegios del usuario

//Condicional para saber si existe el usuario en la BD
if(isset($_SESSION["usuario"])){
	//validar si el usuario es administrador
	if($_SESSION["usuario"]["privilegio"] == 1){
		//otro usuario
		header("location:admin.php"); 
	}//validacion de usuario
} else {
//por defecto lo redirigimos al login
header("location:login.php");
}
?>

<?php include 'partials/menu.php'; ?>



<div class="container">

	<div class="starter-template">
		<br/>
		<br/>
		<br/>
		<div class="jumbotron"> 
			<div class="container text-center">
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
				<p>Panel de Control | <span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"]==1?'Admin':'Cliente';?></span></p>
				<p>
					<a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar Sesión</a>
				</p>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php'; ?>