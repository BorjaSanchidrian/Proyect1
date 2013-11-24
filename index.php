<?php
	session_start();
	include("php_files/basic_objects.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php new Header(); ?>
	<title>Proyect 1 - Inicio</title>
	<script type="text/javascript">
	
	</script>
</head>
<body>
	<?php
		//CREO EL MENU -> basic_objects.php SE PUEDE CONFIGURAR
		new Navbar();
	?>
	<div class="primary container">

		<!-- SLIDER Y CUADRO DE NOVEDADES -->
		<div id="sliderNovedades" class="row-fluid">
			<div class="span8">
				<?php
					//CREO EL SLIDER -> basic_objects.php SE PUEDE CONFIGURAR
					new Slider();
				?>
			</div>
			<div class="span4">
				<div class="page-header">
					<h1><i class="icon-info-sign"></i>Novedades</h1>
				</div>
				<p>21 de Noviembre del 2013</p>
				<p>Vuelvo a continuar con esto, la base de datos se había jodido y he tenido que cambiarla.
					Aún es una 'porqueria' pero confio en que con el tiempo esto mole!
				</p>
				<hr>
				<p>29 de Octubre del 2013</p>
				<p>Cogerá forma poco a poco :P</p>
			</div>
		</div>

		<!-- COLUMNA CENTRAL E IZQUIERDA (LOGIN)-->
		<div class="row-fluid">
			<div class="span8 centerColumn">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
				dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>

				Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque 
				ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia 
				voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. 
				Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi 
				tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem 
				ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea 
				voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
			</div>
			<div class="span4 leftColumn">

				<?php
					#new Login();
				?>
				<!-- CUADRO UNA VEZ LOGUEADO (FALTA TERMINAR) -->
				<?php 
					if($_SESSION['logueado'] != "SI") {
						echo '<div id="loged-box" style="display: none;">';
					} else {
						echo '<div id="loged-box">';
					}
				?>

					<div class="page-header">
						<h1><i class="icon-user"></i>¡Bienvenido!<small><?php echo $_SESSION['nombre_usuario'] . " " . $_SESSION['apellidos']; ?></small></h1>
					</div>

					<div id="test" class="alert alert-block alert-warning">
						<h4>Pues aquí habrá algo, digo yo...</h4>
						<p><a href="salir.php">Salir cutre</a></p>
					</div>
				</div>

				<!-- CUADRO DEL LOGIN, SI NO ESTAS LOGUEADO -->
				<?php 
					if($_SESSION['logueado'] != "SI") {
						echo '<div id="login-box">';
					} else {
						echo '<div style="display: none;" id="login-box">';
					}
				?>

					<!-- SIGNIN LOADER -->
						<div id="signin-loader" style="display: none;">
							<div class="img-loader"><img src="css/images/ajax-loader.gif" alt="Loading..."></div>
						</div>
					<!-- SIGNIN LOADER -->

					<div class="page-header">
						<h1><i class="icon-user"></i>&iquest;Tienes una cuenta?<small>&iexcl;inicia sesi&oacute;n ya!</small></h1>
					</div>

					<!-- DIVS DE AVISOS -->
				  	<div id="signInwarningDiv" style="display:none;" class="alert alert-block alert-warning">
						<h4>¡Error!</h4>
						<p id="signInwarningDivText"></p>
					</div>

					<div id="userError" style="display:none;" class="alert alert-block alert-danger">
						<h4>&iexcl;Error!</h4>
						Ha ocurrido un error desconocido.
					</div>

					<div id="bannedAccount-text" style="display:none;" class="alert alert-block alert-danger">
						<h4>&iexcl;Error!</h4>
						Lo lamentamos, pero tu cuenta ha sido bloqueada.
					</div>
					<!-- FIN DIVS DE AVISOS -->

					<div id="login-form">

						

						<form method="post" id="signinForm" class="form horizontal">
							<div class="control-group">
								<label class="control-label" for="inputEmail">Email</label>
								<div class="controls">
									<input type="email" id="inputEmail" placeholder="Email" name="email">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
									<input type="password" id="inputPassword" placeholder="Password" name="password">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<a href="#modal" role="button" class="link" data-toggle="modal">S&iacute; no la tienes... &iexcl;Reg&iacute;strate ya!</a>
									<label class="checkbox">
										<input type="checkbox" name="checkbox_remember">Recordar mis datos
									</label>
								</div>
							</div>
						</form>
						<button id="loginButton" class="btn btn-inverse">Acceder</button>
					</div>
				</div>
			</div>


		</div>

		<!-- THUMBNAILS Y REDES SOCIALES -->
		<div class="row-fluid">
			<div class="span4">
				<div class="page-header">
					<h1><i class="icon-upload"></i>Publicaciones recientes<small>&iexcl;lo m&aacute;s nuevo!</small></h1>
				</div>
				<!-- THUMBNAILS RECIENTES -->
				<?php new Thumbnails(1); ?>
			</div>
			<div class="span4">
				<div class="page-header">
					<h1><i class="icon-star"></i>Mejor valoradas<small>por nuestros usuarios</small></h1>
				</div>
				<!-- THUMBNAILS MEJOR VALORADOS -->
				<?php new Thumbnails(2); ?>
			</div>
			<div class="span4">
				<div class="page-header">
					<h1>&iexcl;S&iacute;guenos!<small>si te apetece :P</small></h1>
				</div>
				<p>Facebook...</p>
				<p>El lat&iacute;n de arriba mola ehh :D</p>
			</div>
		</div>

		<!-- FIN DEL CONTAINER PRINCIPAL -->
	</div>

	<!-- MODALES -->
		<!-- MODAL REGISTRO -->
			<div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="myModalLabel">&iexcl;Reg&iacute;strate ya!</h3>
			  </div>
			  <div class="modal-body">

			  	<!-- DIVS DE AVISOS -->
			  	<div id="signUpwarningDiv" style="display: none;" class="alert alert-block alert-warning">
					<h4>¡Error!</h4>
					<p id="signUpwarningDivText"></p>
				</div>
				<!-- FIN DIVS DE AVISOS -->

				<div id="signup-form">
					<form method="post" class="form horizontal" id="signupForm" name="signupForm">
						<div class="control-group">
							<!-- NOMBRE -->
							<label class="control-label" for="inputNombre">Nombre</label>
							<div class="controls">
								<input type="text" id="inputNombre" placeholder="Nombre" name="nombre">
							</div>

							<!-- APELLIDOS -->
							<label class="control-label" for="inputApellidos">Apellidos</label>
							<div class="controls">
								<input type="text" id="inputApellidos" placeholder="Apellidos" name="apellidos">
							</div>

							<!-- EMAIL -->
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
								<input type="email" id="inputEmail" placeholder="Email" name="email">
							</div>

						</div>
						<hr>
						<div class="control-group">
							<!-- PASSWORD -->
							<label class="control-label" for="inputPassword">Password</label>
							<div class="controls">
								<input type="password" id="inputPassword" placeholder="Password" name="password">
							</div>

							<!-- CONFIRMAR PASSWORD -->
							<label class="control-label" for="inputRePassword">Confirma el password</label>
							<div class="controls">
								<input type="password" id="inputRePassword" placeholder="Confirma el password" name="repassword">
							</div>

						</div>
						<div class="control-group">

							<!-- TERMINOS Y CONDICIONES -->
							<div class="controls">
								<label class="checkbox">
									<input type="checkbox" name="checkbox_terminos">Acepto los <a href="#" class="link">terminos y condiciones</a>.
								</label>
							</div>
						</div>
						<!--<button class="btn btn-warning" type="submit">Aceptar</button>-->
					</form>

					<!-- SIGNUP LOADER -->
					<div id="signup-loader" class="loader" style="display:none;">
						<div class="img-loader"><img src="css/images/ajax-loader.gif" alt="Loading..."></div>
					</div>
					<!-- SIGNUP LOADER -->

				</div>
				<div id="signUpuserSuccess" style="display:none;" class="alert alert-block alert-success">
					<h4>&iexcl;El usuario ha sido registrado correctamente!</h4>
					¡Ya puedes iniciar sesión con tu email y contraseña!
				</div>
		        <div id="signUpuserError" style="display:none;" class="alert alert-block alert-danger">
					<h4>&iexcl;Error!</h4>
					Ha ocurrido un error desconocido.
				</div>
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				<button class="btn btn-warning" id="submitButton" aria-hidden="true">Aceptar</button>
				<button class="btn btn-warning" data-dismiss="modal" id="closeButton" aria-hidden="true">Aceptar</button> <!-- Boton que cerrará el modal una vez enviado ; al principio del functions.js lo escondo -->
			  </div>
			</div>

	<!-- FIN MODALES -->

	<!-- FOOTER -->
	<?php
		new Footer();
	?>
</body>
</html>