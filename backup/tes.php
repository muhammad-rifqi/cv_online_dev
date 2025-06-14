<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php'); 
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 10); // margin bawah 10mm
$pdf->SetFont('helvetica', '', 12);
for ($i = 1; $i <= 100; $i++) {
    $pdf->Cell(0, 10, "Ini adalah baris ke-$i", 0, 1);
}
$pdf->Output('contoh.pdf', 'I');
?>