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
			//Cada vez que sea correcta  ejecutara la funcion
			success:function(){
				alert("Conectado")
			},
			error:function(){
				alert("Error de Conexión")
			}
		});

		//alert("Enviar formulario");
		//cancelamos el envio 
		return false
	});

});