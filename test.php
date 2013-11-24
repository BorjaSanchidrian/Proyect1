<?php
	include("php_files/basic_objects.php");

	$email = $_POST['email'];
	$password = $_POST['password'];

	$encriptar = new InputEncrypt();
	$password = $encriptar->encryptMd5($password);

	$signIn = new SignIn($email,$password);
	echo $signIn->login();

?>