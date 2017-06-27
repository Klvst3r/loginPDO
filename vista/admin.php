<?php

session_start();
?>

<?php include 'partials/head.php'; ?>
<?php include 'partials/menu.php'; ?>



<div class="container">

	<div class="starter-template">
		<br/>
		<br/>
		<br/>
		<div class="jumbotron">
			<div class="container text-center">
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
				<p>Panel de Control | <span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"]==1?'Admin':'Cliente'; ?></span></p>
				<p>
					<a href="login.php" class="btn btn-primary btn-lg">Cerrar Sesión</a>
				</p>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php'; ?>