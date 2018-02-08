<?php
   session_start();

   require("conexion.php");

   	$conexion = new mysqli($servername, $username, $password, $dataBaseName);

	$conexion->set_charset("utf8");

	if ($conexion->connect_error) {
	   die("Connection failed: " . $conexion->connect_error);
	}else{
		// Create database
		$delete = "DELETE FROM eventos WHERE id = ".$_POST["id"];

		if ($conexion->query($delete) === TRUE) {
			$arrayName = array('msg' => 'OK');
		} else {
		    $arrayName = array('msg' => 'No tiene evento cargado');
		}
	}

	$conexion->close();

	echo json_encode($arrayName);
 ?>
