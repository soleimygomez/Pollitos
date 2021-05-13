<?php

include ("db/conexion.php");


//inicio sesion 
  session_start(); 

 
// Recibir los datos y almacenarlos en variables
// $id = $_POST['id'];  
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$tipo = $_POST['tipo'];


//Validar
 $consulta = "SELECT * FROM usuarios  WHERE usuario = '$usuario' and clave = '$clave' and tipo ='$tipo' " ;

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $consulta);

//traer datos de la base de datos
$row= mysqli_fetch_array($resultado);

//Condicion
 $usuarioyclave= mysqli_num_rows($resultado);

if ($usuarioyclave>0){

	//almacena en variables de sesion
    $_SESSION['id'] = $row['id'];
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['clave'] = $row['clave'];

  if ($row['tipo']=='1') {

     header("location: ../Views/admin/inicio.php");

     }if ($row['tipo']=='2') {
          

          header("location: ../Views/Granjero/principal.php");

       }

 


	

} else {
    
    echo '<script>
        alert("usuario o contraseña invalidos");
         location.href="../index.php";
        </script>';
    
    
    exit;  
}

//Cerrar conexion
mysqli_free_result($resultado);
mysqli_close($conexion);


?>