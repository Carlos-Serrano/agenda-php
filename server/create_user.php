<?php

	require("DataBase.php");
	
	$crear_base_de_datos = new Database();
	$crear_base_de_datos->create_database();
	echo "<br>";
	$crear_base_de_datos->create_table_usuario();
	echo "<br>";
	$crear_base_de_datos->create_table_eventos();
	echo "<br>";
	$crear_base_de_datos->save_new_users("carlos1@carlos.com", password_hash("12345", PASSWORD_DEFAULT), "Carlos", "1987-11-13");
	echo "<br>";
	$crear_base_de_datos->save_new_users("carlos2@carlos.com", password_hash("12345", PASSWORD_DEFAULT), "Carlos", "1987-11-13");
	echo "<br>";
	$crear_base_de_datos->save_new_users("carlos3@carlos.com", password_hash("12345", PASSWORD_DEFAULT), "Carlos", "1987-11-13");


 ?>
