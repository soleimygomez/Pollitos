<?php

$hostname_localhost="localhost";
$database_localhost="pollitos";
$username_localhost="root";
$password_localhost="";

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost)
or die("error al conectar".mysql_error());


?>