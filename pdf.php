<?php 
require_once('tcpdf/examples/config/tcpdf_config_alt.php');
require_once('tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('My Application');
$pdf->SetAuthor('John Doe');
$pdf->SetTitle('My PDF Document');
$pdf->SetSubject('Document subject');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Add a new page to the PDF document
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 16);

// Add text to the PDF document
$pdf->Cell(0, 10, 'Hello, world!', 0, 1);

// Output the PDF document
$pdf->Output('example.pdf', 'I');
?>