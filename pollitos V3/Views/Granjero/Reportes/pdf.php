<?php

    require 'fpdf/fpdf.php';

   class pdf extends FPDF
    {
  public function header()
  {     
    $fecha= date('d-m-Y');
    $this->SetFont('Arial','B',14);
    $this->Cell(0,5,date('d/m/Y'),0,1); 
    //$this->Cell(0,5,date("d-m-Y",strtotime($fecha."- 1 days")),0,1,'L');
    $this->Image('imagen\1.png',165,10,40,30,'png');
  }

  public function footer()
  {
    $this->SetFont('Arial','B',12);
    $this->SetY(-15);
    $this->Write(5,'Cucuta,Colombia');
    $this->SetX(-25);
    $this->AliasNbPages();
    $this->Write(5,$this->PageNo().'/{nb}');
  }

    }



    ?>