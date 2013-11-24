<?php
	/* SIGNUP RULES NIGGA! :P
	 *
	 *	Aquí se reciben los campos del formulario de registro, se encriptan las contraseñas y se envia mediante la clase usuarios al metodo
	 *	createAccount() definido en basic_objects
	 *
	 *	P.D: Queda pendiente hacer alguna comprobación mas sobre la longitud de los campos y los valores introducidos
	 */

	include("php_files/basic_objects.php");



	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$checkbox_terminos = $_POST['checkbox_terminos'];
	$fecha_registro = date("Y-m-d");

	$encriptar = new InputEncrypt();
	$password = $encriptar->encryptMd5($password);
	$repassword = $encriptar->encryptMd5($repassword);



	$account = new Usuario($nombre,$apellidos,$email,$password,$repassword,$checkbox_terminos,$fecha_registro);
	echo $account->createAccount();
?>