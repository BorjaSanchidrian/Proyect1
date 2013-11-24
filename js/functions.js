/* JQUERY TIME */

$(document).ready( function() {
	/* FUNCION AL ENVIAR EL SINGUP FORM */
		$("#closeButton").hide(); //ESCONDO EL BOTON QUE CERRARA EL MODAL UNA VEZ ENVIADO

	    $("#submitButton").click( function() {

	    	$("#signup-loader").delay(300).fadeIn("fast");
	    	$("#warningDiv").fadeOut("fast");

	        $.post("post_signup.php",$("#signupForm").serialize(),function(res){ // USO 'RES' COMO VARIABLE POR EJEMPLO, DARÍA IGUAL MIENTRAS CONCUERDE ABAJO 
	            if(res == 1){
	            	//USUARIO REGISTRADO CON EXITO
	            	$("#signup-form").delay(1000).fadeOut();
	                $("#userSuccess").delay(800).fadeIn("slow");
	               	$("#submitButton").hide();
	                $("#closeButton").show();
	            } else if(res == 2) {
	            	//ERROR DE QUE LA CUENTA YA EXISTE
	            	$("#signup-loader").delay(1000).fadeOut();
	            	$("#signup-loader").animate({height: "528px"}, 1);
	            	$("#warningDiv").delay(800).fadeIn("slow");
	    			$("#warningDivText").html("El email introducido ya está siendo utilizado...");
	            } else if(res == 3) {
	            	//SE DEJA UN CAMPO VACIO
	            	$("#signup-loader").delay(1000).fadeOut();
	            	$("#signup-loader").animate({height: "528px"}, 1);
	            	$("#warningDiv").delay(800).fadeIn("slow");
	    			$("#warningDivText").html("Todos los campos son obligatorios. No se puede dejar ninguno en blanco.");
	            } else if(res == 4) {
	            	//CONTRASEÑAS NO COINCIDEN
	            	$("#signup-loader").delay(1000).fadeOut();
	            	$("#signup-loader").animate({height: "528px"}, 1);
	            	$("#warningDiv").delay(800).fadeIn("slow");
	    			$("#warningDivText").html("Las contraseñas introducidas no coinciden.");
	            } else {
	            	//ERROR DESCONOCIDO
	            	$("#signup-form").delay(1000).fadeOut();
	                $("#userError").delay(800).fadeIn("slow");
	        	}
	        });
		});


});

