<?php
	session_start();
	
	require("conexion.php");

	$conexion = new mysqli($servername, $username, $password, $dataBaseName);

	$conexion->set_charset("utf8");

	// Check connection
	if ($conexion->connect_error) {
	   die("Connection failed: " . $conexion->connect_error);
	} else {
		
	    $sql = "SELECT * FROM usuario WHERE usuario = '".$_POST['user']."' ";
	    $result = $conexion->query($sql);
	    if($result->num_rows > 0){
	    	$row = $result->fetch_assoc();
	    	if(password_verify($_POST['pass'], $row["clave"])){
	    		$arrayName = array('msg' => 'OK');
		    	
		    	$_SESSION["_id_user"] = $row["id"];
	    	}else{
	    		$arrayName = array('msg' => 'Usuario o clave errada.');
	    	}
	    	
	    }else{
	    	$arrayName = array('msg' => 'Usuario o clave errada.');
	    }
	} 
	$conexion->close();
	echo json_encode($arrayName);
 ?>
