<?php
	session_start();
	$_SESSION['logueado'] = "NO";
	$_SESSION['nombre_usuario'] = '';
	$_SESSION['apellidos'] = '';
	$_SESSION['email'] = '';
	session_destroy();
	header("location: index.php");
?>