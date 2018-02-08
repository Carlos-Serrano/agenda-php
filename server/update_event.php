<?php
   session_start();

   require("conexion.php");

   	$conexion = new mysqli($servername, $username, $password, $dataBaseName);

	$conexion->set_charset("utf8");

	if ($conexion->connect_error) {
	   die("Connection failed: " . $conexion->connect_error);
	}else{
		// Create database
		
		$update = "UPDATE eventos SET fecha_i = '".$_POST['start_date']."', hora_i = '".$_POST['start_hour']."', fecha_f = '".$_POST['end_date']."', hora_f = '".$_POST['end_hour']."' WHERE id = ".$_POST["id"];
		// echo $update;
		if ($conexion->query($update) === TRUE) {
			$arrayName = array('msg' => 'OK');
		} else {
		    $arrayName = array('msg' => 'error inesperado.'.$conexion->error);
		}
	}

	$conexion->close();

	echo json_encode($arrayName);
 ?>
