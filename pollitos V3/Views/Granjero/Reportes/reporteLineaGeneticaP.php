<?php 

	 include 'pdf.php';
	 include 'conexion.php';
	
	
	 $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

     $linea_genetica =  $_POST['lineaGenetica'];
	 $desdefecha     =  $_POST['desdefecha'];
	 $hastafecha     =  $_POST['hastafecha'];


	 		 $consulta = "SELECT id_pollo, peso,  fecha, linea_genetica, galpon 
	 				 FROM pollito 
	 					WHERE fecha  
	 						BETWEEN '$desdefecha'  AND '$hastafecha'
 							  AND '$linea_genetica' = linea_genetica";



	$resultado= mysqli_query($conexion,$consulta);	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','LETTER');
	$pdf->SetFont('Arial','B',14);
	$pdf->SetY(25);
	$pdf->text(46,40,'REPORTE DE POLLOS POR LINEA GENETICA ',0,0,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->SetY(60);
	$pdf->SetX(50);
	$pdf->Cell(25,6,'id_pollo',1,0,'C',1);
	$pdf->Cell(25,6,'peso',1,0,'C',1);
	$pdf->Cell(25,6,'Linea Genetica',1,0,'C',1);
	$pdf->Cell(25,6,'Galpon',1,0,'C',1);
	$pdf->Cell(25,6,'Fecha de Ingreso',1,1,'C',1);
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
		$pdf->Cell(25,6,$row['galpon'] ,1,0,'C');
		$pdf->Cell(25,6,$row['fecha'] ,1,1,'C');
		
	}


	 $pdf->Output();  // con d se descarga automaticamente 

	// con f se guarda directamente en el disco pero se tiene q poner nombre
	  //$pdf->Output('F','REPORTE.PDF');



		
?>