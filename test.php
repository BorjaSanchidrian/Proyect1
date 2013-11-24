<?php
	include("php_files/basic_objects.php");

	$email = $_POST['email'];
	$password = $_POST['password'];

	$encriptar = new InputEncrypt();
	$password = $encriptar->encryptMd5($password);

	$sqlr = mysql_query("Select * from usuarios where email='$email' and password='$password'");
	
	if(mysql_num_rows($sqlr)>=1) {
		//Cuenta existe
	} else {
		//Cuenta no existe -> Error
	}
?>