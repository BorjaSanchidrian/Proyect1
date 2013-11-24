<?php
    error_reporting(0);
    require_once("class.inputfilter.php");

    $filter = new InputFilter();
    $_POST = $filter->process($_POST);

    $host_db = "localhost"; // Host de la BD 
    $usuario_db = "root"; // Usuario de la BD 
    $clave_db = "Gallego99"; // Contraseña de la BD 
    $nombre_db = "proyect1_db"; // Nombre de la BD 
     
    //conectamos y seleccionamos db 
    $con= mysql_connect($host_db, $usuario_db, $clave_db); 
	if (!$con)
	{
		die('No hemos podido conectar: ' . mysql_error());
	}
    mysql_select_db($nombre_db, $con);
?>