/* JQUERY TIME */

$(document).ready( function() {
	/* FUNCION AL ENVIAR EL SINGUP FORM */
		$("#closeButton").hide(); //ESCONDO EL BOTON QUE CERRARA EL MODAL UNA VEZ ENVIADO

	    $("#submitButton").click( function() {

	    	$("#signup-loader").delay(300).fadeIn("fast");
	    	$("#signUpwarningDiv").fadeOut("fast");

	        $.post("post_signup.php",$("#signupForm").serialize(),function(res){ // USO 'RES' COMO VARIABLE POR EJEMPLO, DARÍA IGUAL MIENTRAS CONCUERDE ABAJO 
	            if(res == 1){
	            	//USUARIO REGISTRADO CON EXITO
	            	$("#signup-form").delay(1000).fadeOut();
	                $("#signUpuserSuccess").delay(800).fadeIn("slow");
	               	$("#submitButton").hide();
	                $("#closeButton").show();
	            } else if(res == 2) {
	            	//ERROR DE QUE LA CUENTA YA EXISTE
	            	$("#signup-loader").delay(1000).fadeOut();
	            	$("#signup-loader").animate({height: "528px"}, 1);
	            	$("#signUpwarningDiv").delay(800).fadeIn("slow");
	    			$("#signUpwarningDivText").html("El email introducido ya está siendo utilizado...");
	            } else if(res == 3) {
	            	//SE DEJA UN CAMPO VACIO
	            	$("#signup-loader").delay(1000).fadeOut();
	            	$("#signup-loader").animate({height: "528px"}, 1);
	            	$("#signUpwarningDiv").delay(800).fadeIn("slow");
	    			$("#signUpwarningDivText").html("Todos los campos son obligatorios. No se puede dejar ninguno en blanco.");
	            } else if(res == 4) {
	            	//CONTRASEÑAS NO COINCIDEN
	            	$("#signup-loader").delay(1000).fadeOut();
	            	$("#signup-loader").animate({height: "528px"}, 1);
	            	$("#signUpwarningDiv").delay(800).fadeIn("slow");
	    			$("#signUpwarningDivText").html("Las contraseñas introducidas no coinciden.");
	            } else {
	            	//ERROR DESCONOCIDO
	            	$("#signup-form").delay(1000).fadeOut();
	                $("#signUpuserError").delay(800).fadeIn("slow");
	        	}
	        });
		});

		
	/* FUNCION AL ENVIAR EL SIGNIN FORM */
		function login () {
			$("#signin-loader").delay(300).fadeIn("medium");
			$("#signInwarningDiv").fadeOut("fast");

			$.post("test.php",$("#signinForm").serialize(),function(res){
				if(res==0) {
					//INICIA SESION
					$("#login-box").delay(790).fadeOut("slow");
					$("#loged-box").delay(800).fadeIn("slow");
				} else if(res==1) {
					//LA CUENTA ESTA BLOQUEADA
					$("#signin-loader").fadeOut();
					$("#login-form").delay(790).fadeOut("slow");
					$("#bannedAccount-text").delay(800).fadeIn("slow");
				} else if(res==2) {
					//LA CUENTA NO EXISTE O ESTAN MAL LOS DATOS
					$("#signin-loader").fadeOut();
					$("#signInwarningDiv").delay(800).fadeIn("slow");
	    			$("#signInwarningDivText").html("Los datos introducidos son incorrectos.");
				} else {

				}
			});
		}

		$("#loginButton").click(login);

		//SI SE PRESIONA ENTER
		$("#login-form").keypress(function(e) {
		    if(e.which == 13) {
		        login();
		    }
		});

});

