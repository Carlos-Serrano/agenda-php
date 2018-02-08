<?php
	class DataBase{

		var $servername = "localhost";
		var $username = "root";
		var $password = "root";
		var $dataBaseName = "db_agenda";

		function create_database(){
			// Create connection
			$conexion = new mysqli($this->servername, $this->username, $this->password);
			
			if ($conexion->connect_error) {
			    die("Connection failed: " . $conexion->connect_error);
			} 

			// Create database
			$sql = "CREATE DATABASE IF NOT EXISTS db_agenda";
			if ($conexion->query($sql) === TRUE) {
			    echo "Database created successfully";
			} else {
			    echo "Error creating database: " . $conexion->error;
			}

			$conexion->close();
		}
		function create_table_usuario(){
			$conexion = new mysqli($this->servername, $this->username, $this->password, $this->dataBaseName);

			$conexion->set_charset("utf8");

			// Check connection
			if ($conexion->connect_error) {
			   die("Connection failed: " . $conexion->connect_error);
			} else {
			    $sql = " CREATE TABLE IF NOT EXISTS usuario (
			    	id int(11) NOT NULL AUTO_INCREMENT,
					usuario varchar(30) NOT NULL,
					clave varchar(100) NOT NULL,
					nombre varchar(50) NOT NULL,
					fecha_nac date DEFAULT NULL,
					  PRIMARY KEY (id)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1";

				if ($conexion->query($sql) === TRUE) {
				    echo "Table usuario created successfully";
				} else {
				    echo "Error creating table: " . $conexion->error;
				}
			} 
			$conexion->close();
		}
		function create_table_eventos(){
			$conexion = new mysqli($this->servername, $this->username, $this->password, $this->dataBaseName);

			$conexion->set_charset("utf8");

			// Check connection
			if ($conexion->connect_error) {
			   die("Connection failed: " . $conexion->connect_error);
			} else {
			    $sql = " CREATE TABLE IF NOT EXISTS eventos (
			    	id int(11) NOT NULL AUTO_INCREMENT,
			    	id_usuario int(11) NOT NULL,
					titulo varchar(30) NOT NULL,
					fecha_i date NOT NULL,
					hora_i varchar(10) DEFAULT NULL,
					fecha_f date DEFAULT NULL,
					hora_f varchar(10) DEFAULT NULL,
					allday tinyint(1) DEFAULT NULL,
					  PRIMARY KEY (id)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1";

				if ($conexion->query($sql) === TRUE) {
				    echo "Table eventos created successfully";
				} else {
				    echo "Error creating table: " . $conexion->error;
				}
			} 
			$conexion->close();
		}

		function save_new_users($usuario, $clave, $nombre, $fecha){
			$conexion = new mysqli($this->servername, $this->username, $this->password, $this->dataBaseName);

			$conexion->set_charset("utf8");

			// Check connection
			if ($conexion->connect_error) {
			   die("Connection failed: " . $conexion->connect_error);
			} else {

				$insert = "INSERT INTO usuario(usuario, clave, nombre, fecha_nac) VALUES('$usuario', '$clave', '$nombre', '$fecha')";

				if ($conexion->query($insert) === TRUE) {
				    echo "User created successfully";
				} else {
				    echo "Error creating table: " . $conexion->error;
				}
			} 
			$conexion->close();
		}
	}
?>