<?php 

	 include 'pdf.php';
	 include 'conexion.php';

	
	 
	 

	
	 
	
	 $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);


if (isset($_POST['causa'])) 
	

	 $causa          =  $_POST['causa'];
	 $desdefecha     =  $_POST['desdefecha'];
	 $hastafecha     =  $_POST['hastafecha'];
	 $linea_genetica =  $_POST['lineaGenetica'];

	 		// $consulta = "SELECT id_pollo, peso,  causa, linea_genetica FROM mortalidadd 
    //         WHERE CURDATE() BETWEEN $desdefecha AND $hastafecha and linea_genetica=$linea_genetica AND causa=$causa";


	 $consulta = "SELECT id_pollo, peso,  causa, linea_genetica 
	 				 FROM mortalidadd 
	 					WHERE fecha  
	 						BETWEEN '$desdefecha'  AND '$hastafecha'
 							  AND '$causa' = causa
	 		  				    AND '$linea_genetica' = linea_genetica ";

 

	$resultado= mysqli_query($conexion,$consulta);	
	
	//$resultado = $mysqli->quer
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','LETTER');
	$pdf->SetFont('Arial','B',14);
	$pdf->SetY(25);
	$pdf->text(80,40,'REPORTE DE LINEA GENETICA Y MORTALIDAD',0,0,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->SetY(60);
	$pdf->SetX(50);
	$pdf->Cell(25,6,'id_pollo',1,0,'C',1);
	$pdf->Cell(25,6,'peso',1,0,'C',1);
	$pdf->Cell(25,6,'Linea Genetica',1,0,'C',1);
	$pdf->Cell(25,6,'causa',1,1,'C',1);
	//**cuantos datos valla a pedir**
	//$row = mysqli_fetch_array($resultado);
	//print_r($row);
	 //die();

		while($row = mysqli_fetch_array($resultado)){
		//print_r($row);
		$pdf->Cell(20);
		$pdf->setX(50);
		
		$pdf->Cell(25,6,$row['id_pollo'],1,0,'C');
		$pdf->Cell(25,6,$row['peso'],1,0,'C');
		$pdf->Cell(25,6,$row['linea_genetica'],1,0,'C');
		$pdf->Cell(25,6,$row['causa'] ,1,1,'C');
		
		
	}


// 	$consulta = "SELECT sum(venta.total_producto) as cantidad, sum(producto.precioUnitario) precioUnitario, sum(venta.total_venta) precioVenta FROM venta INNER JOIN producto on producto.id_producto=venta.id_producto where venta.fecha_hora_venta=CURDATE() ";

// 	$resultado= mysqli_query($conexion,$consulta);	

// 	while($row = mysqli_fetch_array($resultado)){
// 		//print_r($row);
// 		$pdf->Cell(20);
// 		$pdf->Cell(25,6,'',0,0,'C');
// 		$pdf->Cell(25,6,'',0,0,'C');
// 		$pdf->Cell(25,6,'TOTAL',0,0,'C');
// 		$pdf->Cell(25,6,$row['cantidad'] ,1,0,'C');
// 		$pdf->Cell(25,6,$row['precioUnitario'],1,0,'C');
// 		$pdf->Cell(25,6,$row['precioVenta'],1,1,'C');
// 	}
	
// //_-----------------------------------------------------------------------------------_
// 	 $con = "SELECT id_servicio,id_usuario,marca,modelo,falla,precio FROM servicio where estadoServicio = 1 and servicio.fecha_servicio=CURDATE()";
// 	 $res= mysqli_query($conexion,$con); 

// 	 $pdf->AliasNbPages();
// 	 $pdf->AddPage('portrait','LETTER');
// 	 $pdf->SetFont('Arial','B',14);
// 	 $pdf->SetY(25);
// 	 $pdf->text(80,40,'REPORTES DE SERVICIOS',0,0,'C');


// 	 $pdf->SetFillColor(232,232,232);
// 	 $pdf->SetFont('Arial','B',8);
// 	 $pdf->SetY(50);
// 	 $pdf->SetX(30);
// 	 $pdf->Cell(25,6,'id_servicio',1,0,'C',1);
// 	 $pdf->Cell(25,6,'id_usuario',1,0,'C',1);
// 	 $pdf->Cell(25,6,'marca',1,0,'C',1);
// 	 $pdf->Cell(25,6,'modelo ',1,0,'C',1);
// 	 $pdf->Cell(25,6,'falla',1,0,'C',1);
// 	 $pdf->Cell(25,6,'precio',1,1,'C',1);
// 	 //**cuantos datos valla a pedir**

// 	 while($row = $res->fetch_assoc())
// 	 {
// 	 $pdf->Cell(20);
// 	 $pdf->Cell(25,6,$row['id_servicio'],1,0,'C');
// 	 $pdf->Cell(25,6,$row['id_usuario'],1,0,'C');
// 	 $pdf->Cell(25,6,$row['marca'],1,0,'C');
// 	 $pdf->Cell(25,6,$row['modelo'] ,1,0,'C');
// 	 $pdf->Cell(25,6,$row['falla'],1,0,'C');
// 	 $pdf->Cell(25,6,$row['precio'],1,1,'C');

// 	 }

// 	 $consulta = "SELECT sum(servicio.precio) precioVenta FROM servicio where servicio.fecha_servicio=CURDATE() ";

// 	$resultado= mysqli_query($conexion,$consulta);	

// 	while($row = mysqli_fetch_array($resultado)){
// 		//print_r($row);
		
// 		$pdf->Cell(20);
// 		$pdf->Cell(25,6,'',0,0,'C');
// 		$pdf->Cell(25,6,'',0,0,'C');
// 		$pdf->Cell(25,6,'',0,0,'C');
// 		$pdf->Cell(25,6,'',0,0,'C');
// 		$pdf->Cell(25,6,'TOTAL',0,0,'C');
// 		$pdf->Cell(25,6,$row['precioVenta'],1,1,'C');
// 	}
/*
	 $con = "SELECT sum('cantidad') FROM detalleventa";
	 $resp= mysqli_query($conexion,$con);
	 $pdf->SetFillColor(232,232,232);
	 $pdf->SetFont('Arial','B',12);
	 $pdf->Cell(120);
	 $pdf->Cell(50,6,$row['cantidad'],1,0,'C');
	 */
	 $pdf->Output();  // con d se descarga automaticamente 

	// con f se guarda directamente en el disco pero se tiene q poner nombre
	  //$pdf->Output('F','REPORTE.PDF');



		
?>