<?php 

	 include 'pdf.php';
	 include 'conexion.php';
	 $conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);


	 $consulta = "SELECT id_pollo,peso,linea_genetica FROM pollito";


	$resultado= mysqli_query($conexion,$consulta);	
	
	//$resultado = $mysqli->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('portrait','LETTER');
	$pdf->SetFont('Arial','B',14);
	$pdf->SetY(25);
	$pdf->text(80,40,'REPORTE DE POLLOS',0,0,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->SetY(60);
	$pdf->SetX(50);
	$pdf->Cell(25,6,'id_pollo',1,0,'C',1);
	$pdf->Cell(25,6,'peso',1,0,'C',1);
	$pdf->Cell(25,6,'linea_genetica',1,0,'C',1);
	
	//**cuantos datos valla a pedir**
	//$row = mysqli_fetch_array($resultado);
	//print_r($row);
	 //die();

	while($row = mysqli_fetch_array($resultado)){
		//print_r($row);
		$pdf->SetY(66);
		$pdf->SetX(50);
		
		$pdf->Cell(25,6,$row['id_pollo'],1,0,'C');
		$pdf->Cell(25,6,$row['peso'],1,0,'C');
		$pdf->Cell(25,6,$row['linea_genetica'],1,0,'C');
		
		
	}


	 $pdf->Output();  // con d se descarga automaticamente 

?>