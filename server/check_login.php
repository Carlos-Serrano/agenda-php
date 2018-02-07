<?php
	require("conexion.php");

	$conexion = new mysqli($servername, $username, $password, $dataBaseName);

	$conexion->set_charset("utf8");

	// Check connection
	if ($conexion->connect_error) {
	   die("Connection failed: " . $conexion->connect_error);
	} else {
	    $sql = "SELECT * FROM usuario WHERE usuario = '".$_POST['user']."' AND clave = '".$_POST['pass']."'";
	    $result = $conexion->query($sql);
	    if($result->num_rows > 0){
	    	$arrayName = array('msg' => 'OK');
	    }else{
	    	$arrayName = array('msg' => 'Usuario o clave errada.');
	    }
	} 
	$conexion->close();
	echo json_encode($arrayName);
 ?>
