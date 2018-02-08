<?php
   session_start();

   require("conexion.php");

   	$conexion = new mysqli($servername, $username, $password, $dataBaseName);

	$conexion->set_charset("utf8");

	if ($conexion->connect_error) {
	   die("Connection failed: " . $conexion->connect_error);
	}else{
		// Create database
		$sql = "SELECT id, titulo, fecha_i, hora_i, fecha_f, hora_f, allday FROM eventos WHERE id_usuario = ".$_SESSION["_id_user"];

		$result = $conexion->query($sql);

		if ($result->num_rows > 0) {
			$arrayEvents = array();
			while($row = $result->fetch_assoc()){
				$arrayInfo["id"] = $row["id"];
				$arrayInfo["title"] = $row["titulo"];
				$arrayInfo["start"] = $row["fecha_i"]." ".$row["hora_i"];
				$arrayInfo["end"] = $row["fecha_f"]." ".$row["hora_f"];
				$arrayInfo["allDay"] = $row["allday"];
				array_push($arrayEvents, $arrayInfo);
			}
			$arrayName = array('msg' => 'OK', 'eventos' => $arrayEvents);
		} else {
		    $arrayName = array('msg' => 'No tienen eventos cargado');
		}
	}

	$conexion->close();

	echo json_encode($arrayName);
 ?>
