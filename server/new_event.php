<?php
   session_start();

   require("conexion.php");

   	$conexion = new mysqli($servername, $username, $password, $dataBaseName);

	$conexion->set_charset("utf8");

	if ($conexion->connect_error) {
	   die("Connection failed: " . $conexion->connect_error);
	}else{
		// Create database
		if($_POST['end_date'] == ""){
			$_POST['end_date'] = "2000-01-01";
		}
		$insert = "INSERT INTO eventos(id_usuario, titulo, fecha_i, hora_i, fecha_f, hora_f, allday) VALUES(".$_SESSION['_id_user'].", '".$_POST['titulo']."', '".$_POST['start_date']."', '".$_POST['start_hour']."', '".$_POST['end_date']."', '".$_POST['end_hour']."', ".$_POST['allDay'].")";
		// echo $insert;
		if ($conexion->query($insert) === TRUE) {
			$arrayName = array('msg' => 'OK', 'id' => $conexion->insert_id);
		} else {
		    $arrayName = array('msg' => 'error inesperado.'.$conexion->error);
		}
	}

	$conexion->close();

	echo json_encode($arrayName);
 ?>
