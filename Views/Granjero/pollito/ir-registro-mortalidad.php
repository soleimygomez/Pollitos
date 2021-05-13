<?php 
	  require_once('../../../Controllers/db/connection.php');


	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		
		$controller=$_GET['controller'];
		$action=$_GET['action'];
	}else{
		$controller='mortalidad';
		$action='register';
	
	}
	require_once('../Layouts/Pollitos/layout.php');	
 ?>