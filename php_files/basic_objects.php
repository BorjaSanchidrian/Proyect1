<?php
	include("config/db_connect.php");

	//CLASE DEL HEADER
	class Header {
		function __construct () {
			echo '
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<script type="text/javascript" src="bootstrap/js/jquery-latest.js"></script>
				<script src="bootstrap/js/bootstrap.min.js"></script>
				<link rel="stylesheet" type="text/css" href="css/basic_style.css">
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css"/>
				<script type="text/javascript" src="js/functions.js"></script>
				';
		}
	}

	//CLASE DEL MENU
	class Navbar {

		function __construct () {

			$sqlr = mysql_query("select * from navbar_config where active='1'");
			
				$numButtons++;
					echo '
					<div id="navbar" class="navbar navbar-fixed-top">
						<div class="navbar-inner">
							<div class="container">
								<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="index.php" class="brand logo">Proyect 1</a>
								<div class="nav-collapse collapse">
									<ul class="nav">
						 ';

						while($row=mysql_fetch_array($sqlr)) {
							//SI EL HREF DEL BOTON ES IGUAL AL NOMBRE DEL ARCHIVO (VER FUNCION DE ARRIBA) LE ASIGNA LA CLASE ACTIVE AL LI
							if($this->phpFile($row['button_href'])) {
								echo '
											<li class="active"><a href="' . $row["button_href"] . '">' . $row["button_name"] . '</a></li>
								 ';
							} else {
								echo '
											<li><a href="' . $row["button_href"] . '">' . $row["button_name"] . '</a></li>
									 ';
							}
						}
						
						echo '
									</ul>
									<form class="navbar-search" action="search.php" method="get">
									  <input type="text" class="input-medium search-query" name="search" placeholder="Buscar...">
									</form>
								<!--
									<ul class="nav pull-right">
										<li class="dropdown divider-vertical">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones<b class="caret"></b></a>
										<ul class="dropdown-menu">
										  <li><a tabindex="-1" href="#">Ayuda</a></li>
										  <li><a tabindex="-1" href="options_privacidad.php">Configuración</a></li>
										  <li><a tabindex="-1" href="options_perfil.php">Editar mí perfil</a></li>
										  <li class="divider"></li>
										  <li><a tabindex="-1" href="logout.php">Salir</a></li>
										</ul>
									  </li>
									</ul>
								-->
								</div>
							</div>
						</div>
					</div>'; #FIN DEL ECHO
		}

		//FUNCION QUE ME DICE SI EL ARCHIVO PHP EN EL QUE ESTOY COINCIDE CON EL HREF DEL BOTON DEL MENU

	//EXISTEN CONFLICTOS CUANDO EN LA URL HAY VARIABLES, CAMBIAR POR UN SWITCH SI SE USARÁ HTACCESS DE POR MEDIO TIPO (/perfil)
	/*
		switch (variable) {
			case 'perfil':
				# code...
				break;
			
			default:
				# code...
				break;
		}
	*/

	public function phpFile ($href) {
			$href = basename($href);
			$actual_file = basename($_SERVER['PHP_SELF']);
			if($href == $actual_file) {
				return 1;
			} else {
				return NULL;
			}
		}
	}

	/*ACABA CLASS NAVBAR*/


	//CLASE DEL SLIDER
	class Slider {

		function __construct () {
			$sqlr = mysql_query("select * from slider_config where active='1'");

			echo '
				<div id="slider" class="carousel slide hidden-phone">
				  <!--<ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				  </ol>-->
				  <!-- Carousel items -->
				  <div class="carousel-inner">
				  ';

				while($row=mysql_fetch_array($sqlr)) {
					if($row['id']==1) {
						echo '<div class="active item">';
					} else {
						echo '<div class="item">';
					}
					echo '
						<!--/* SE USA EL DIV ANTERIOR */-->
					    	<img class="foto" src="' . $row["photo_location"] . '">
					    	<div class="carousel-caption">
						   		<h4>' . utf8_encode($row["photo_name"]) .'</h4>
						   		<p>' . utf8_encode($row["photo_description"]) .'</p>
						   	</div>
					   </div>
						 ';
				}
			echo '
				  </div>
				  <!-- Carousel nav -->
				  <a class="carousel-control left" href="#slider" data-slide="prev">&lsaquo;</a>
				  <a class="carousel-control right" href="#slider" data-slide="next">&rsaquo;</a>
				</div>
				';
		}
	}

	//CLASE DE LOS THUMBNAILS
	class Thumbnails {

		/*
		TIPO DE THUMBNAILS {
			1 => RECIENTES
			2 => MEJOR VALORADOS
		}
		*/
		
		public $type;

		function __construct ($type) {
			$this->type = $type;
			switch ($type) {
				case 1:
					$this->recentThumbnails();
					break;
				case 2:
					$this->masVotos();
					break;
			}
		}
		function recentThumbnails () {
			$sqlr = mysql_query("select * from portadas_historias where active='1' order by upload_date asc LIMIT 3");
			echo '<ul class="thumbnails">
					<li class="span12">
				 ';
			while($row=mysql_fetch_array($sqlr)) {
				echo '<div class="thumbnail">
						<div class="photo-thumbnail">
							<img class="img-polaroid" src="' . $row["history_photo"] . '" alt="' . $row["history_name"] . '">
						</div>
						<div class="info-thumbnail">
							<h3>' . $row["history_name"] . '</h3>
							<button class="btn btn-small" type="button">&iexcl;Leer m&aacute;s!</button>
							<div class="rating">
					 ';
						//Apaño de la votacion, cutre
						for($i=1;$i<=$row['votos'];$i++) {
							echo '<span href="#" class="encendida"></span>';
						}

						$estrellas_byn = 5 - $row['votos'];
						for($i=1;$i<=$estrellas_byn;$i++) {
							echo '<span href="#" class="apagada"></span>';
						}

				echo '
							</div>
						</div>
					 </div>
					';
			}

			echo '		</li>
					</ul>
				 ';
		}

		function masVotos () {
			$sqlr = mysql_query("select * from portadas_historias where active='1' order by votos desc LIMIT 3");
			echo '<ul class="thumbnails">
					<li class="span12">
				 ';
			while($row=mysql_fetch_array($sqlr)) {
				echo '<div class="thumbnail">
						<div class="photo-thumbnail">
							<img class="img-polaroid" src="' . $row["history_photo"] . '" alt="' . $row["history_name"] . '">
						</div>
						<div class="info-thumbnail">
							<h3>' . $row["history_name"] . '</h3>
							<button class="btn btn-small btn-warning" type="button">&iexcl;Leer m&aacute;s!</button>
							<div class="rating">
					 ';
						//Apaño de la votacion, cutre
						for($i=1;$i<=$row['votos'];$i++) {
							echo '<span href="#" class="encendida"></span>';
						}

						$estrellas_byn = 5 - $row['votos'];
						for($i=1;$i<=$estrellas_byn;$i++) {
							echo '<span href="#" class="apagada"></span>';
						}

				echo '
							</div>
						</div>
					 </div>
					';
			}

			echo '		</li>
					</ul>
				 ';
		}
	}

	//CLASE DEL FOOTER
	class Footer {
		function __construct () {
			echo '<div class="footer">
					<p>&copy;2013 Proyect 1</p>
				  </div>
				  ';
		}
	}

	//CLASE PARA LA ENCRIPTACION DE CONTRASEÑAS
	/**
	  * Uso {
	  *		1º Creamos el objeto -> new InputEncrypt(); pudiendo pasarle un valor que actuará de key
	  *		2º Llamar al método que se quiera -> $example->count('Borja'); devolviendo la suma de los caracteres pasados al método + los de la key
	  *  }
	  */

	class InputEncrypt {

		var $key; //clave necesaria para encriptar/desencriptar una contraseña. Por defecto 'k.J{^q0.'

		function __construct ($key = 'k.J{^q0.') {
			$this->key = $key;
		}

		function count ($string) {
			$keyLen = strlen($this->key);
			$stringLen = strlen($string);
			$totalLen = $keyLen + $stringLen;

			return $totalLen;
		}

		function encrypt ($string) {
			$result = '';
			$totalLen = $this->count($string);

			for($i=0; $i<$totalLen; $i++) {
			  $char = substr($string, $i, 1);
			  $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
			  $char = chr(ord($char)+ord($keychar));
			  $result.=$char;
			}
		  	
		   return base64_encode($result);
		}

		function encryptMd5 ($string) {
			$string = md5($this->encrypt($string));

			return $string;
		}

		function decrypt ($string) {
		   $result = '';
		   $string = base64_decode($string);

		   for($i=0; $i<strlen($string); $i++) {
			  $char = substr($string, $i, 1);
			  $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
			  $char = chr(ord($char)-ord($keychar));
			  $result.=$char;
		   }
		   return $result;
		}
	}

	//CLASE PARA EL REGISTRO DE UN NUEVO USUARIO
	/**
	  * Uso {
	  *		1º Creamos el objeto -> new Usuario(); pasando los valores que actuarán
	  *		2º Llamar al método que se quiera -> $example->createAccount();
	  *  }
	  */
	class Usuario {
		var $nombre;
		var $apellidos;
		var $email;
		var $password;
		var $checkbox_terminos;
		var $fecha_registro;

		function __construct ($nombre='', $apellidos='', $email='', $password='', $repassword='', $checkbox_terminos=FALSE, $fecha_registro='') {
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->email = $email;
			$this->password = $password;
			$this->repassword = $repassword;
			$this->checkbox_terminos = $checkbox_terminos;
			$this->fecha_registro = $fecha_registro;
		}

		//Valida el formulario. -> Por ahora comprueba si algun campo esta en blanco y si coinciden las contraseñas
		function formValidate () {
			if(($this->nombre==='') || ($this->apellidos==='') || ($this->email==='') || ($this->password==='') || ($this->repassword==='') || ($this->checkbox_terminos==FALSE)) {
				return 1;
			} else if($this->password != $this->repassword) {
				return 2;
			} else {
				return 0;
			}
		}

		//Si la cuenta ya existe devuelve un 1, sino 0
		function accountExists () {
			$sqlr = mysql_query("select * from usuarios where email='$this->email'");
			if(mysql_num_rows($sqlr)>=1) {
				return 1;
			} else {
				return 0;
			}
		}

		//comprueba los anteriores metodos y crea una cuenta nueva en caso de que todo este perfecto
		function createAccount () {
			if(($this->formValidate() == 1)) {
				return 3;	//ERROR DE QUE SE HA DEJADO ALGUN CUADRO EN BLANCO
			} else if(($this->formValidate() == 2)) {
				return 4;	//LAS CONTRASEÑAS NO COINCIDEN
			} else if($this->accountExists()) {
				return 2;	//ERROR DE QUE YA EXISTE LA CUENTA
			} else {
				$sqlr = mysql_query("Insert into usuarios (nombre,apellidos,email,password,fecha_registro) values ('$this->nombre','$this->apellidos','$this->email','$this->password','$this->fecha_registro')");
				return 1;
			}
		}

		//Simple singIn, nada que comentar
		function singIn () {
			//do something
		}
	}

	//CLASE DEL LOGIN
	class Login {
				
		/*CUIDADO SI SE HA LOGUEADO YA*/
		function __construct () {
			echo '<div class="page-header">
							<h1><i class="icon-user"></i>&iquest;Tienes una cuenta?<small>&iexcl;inicia sesi&oacute;n ya!</small></h1>
						</div>
						<div id="login-form">
							<form method="post" action="#" class="form horizontal">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Email</label>
									<div class="controls">
										<input type="email" id="inputEmail" placeholder="Email" name="email" disabled>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
									<div class="controls">
										<input type="password" id="inputPassword" placeholder="Password" name="password" disabled>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<a href="#modal" role="button" class="link" data-toggle="modal">S&iacute; no la tienes... &iexcl;Reg&iacute;strate ya!</a>
										<label class="checkbox">
											<input type="checkbox" name="checkbox_remember">Recordar mis datos
										</label>
										<button type="submit" class="btn btn-inverse">Acceder</button>
									</div>
								</div>
							</form>
						</div>
					';
		}
	}
?>