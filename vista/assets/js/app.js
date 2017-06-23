/*
Este archivo contendra todo el archivo de concexion por medio de AJAX a la aplicación a la validación por medio del login.

 */

/*Prueba de jQuery*/
$(document).ready(function(){
	//alert("test_function");
	//captura el formulario por medio de selector de jQuerypor el elemento del ID
	/*Basado a la funcion que tenemos ejecuta la funcion por medio de bind al ser submit retorna false y cancela el envio 
	hacia la otra pagina*/
	$("#loginForm").bind("submit",function(){
		/*AJAX trabaja con estructuras JSON*/
		$.ajax({
			//capturamos el atributo method
			type:$(this).attr("method"),
			//agregamos la URL por el action del form
			url:$(this).attr("action"),
			//Con la información que se va a enviar y se recuperara de manera serializada de todos los campos del form
			data:$(this).serialize(),
			//Antes de enviarse que cambie de texto el boton
			beforeSend:function(){
				//prueba de cambio de leyenda al boton
				//$("#loginForm button[type=submit]").text("otro");
				$("#loginForm button[type=submit]").html("enviando...");
				$("#loginForm button[type=submit]").attr("disabled","disabled");


			},
			//Cada vez que sea correcta  ejecutara la funcion
			success:function(response){
				//leemos el response
				//console.log(response);
				//se agrega codigo JSON buscando Google: headers json php
				if(response.estado == "true"){
					//alert("Conectado")
					//Pruba con la libreria overHang.js para las notifiaciones
					$("body").overhang({
	  					type: "success",
	  					message: "Usuario Encontrado, te estamos redirigiendo...",
	  					callback: function(){
	  						window.location.href = "admin.php";
	  					}
					});
				}else {
					$("body").overhang({
					  type: "error",
					  message: "Usuario o Password incorrecto!"
					  //closeConfirm: true
					});
					
				}

				$("#loginForm button[type=submit]").html("Ingresar");
				$("#loginForm button[type=submit]").removeAttr("disabled");
			},
			error:function(){
				//alert("Error de Conexión")
				$("body").overhang({
					  type: "error",
					  message: "Usuario o Password incorrecto!"
					});

				$("#loginForm button[type=submit]").html("Ingresar");
				$("#loginForm button[type=submit]").removeAttr("disabled");

			}
		});

		//alert("Enviar formulario");
		//cancelamos el envio 
		return false
	});

});