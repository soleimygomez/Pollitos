<?php

require_once('parametros.php'); //hacemos referencia a las variables de conexión

		try{


			$conexion = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE); 

			}catch(Exeption $e){
				die("Error" . $e>-getMessage());


		}

		return $conexion;



?>