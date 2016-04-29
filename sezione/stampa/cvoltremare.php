<?php

require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B',12);

$pdf->SetFillColor(36,96,84);
$pdf->SetTextColor(255);
$pdf->SetLineWidth(1);

$pdf->SetMargins(40, 35, 20); 
// is eqaul to 

$pdf->SetAutoPageBreak(true, 35);



$pdf->Cell(100,16,"Hello World",1,0,'C', true);
$pdf->Output();
