<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php'); 

class MyPDF extends TCPDF {
    public function Header() {
    }

    public function Footer() {
    }
}

$pdf = new MyPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Muhammad Rifqi');
$pdf->SetTitle('My Curiculum Vitae');
$pdf->SetSubject('Curiculum Vitae');
$pdf->SetKeywords('TCPDF, PDF, Curiculum Vitae');
$pdf->SetMargins(15, 27, 15);
$pdf->SetAutoPageBreak(TRUE, 25);
$pdf->AddPage();
$pdf->SetFont('times', 'B', 20);
$pdf->Write(0, 'MUHAMMAD RIFQI', '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(2);
$pdf->SetFont('times', '', 14);
$pdf->Write(0, 'Fullstack Developer, PT Arnawa Teknologi Solusi, +6281927067602', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, 'email : muhammad45rifki@gmail.com', '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(5);
$pdf->Line(15, $pdf->GetY(), $pdf->getPageWidth() - 15, $pdf->GetY());
$pdf->Ln(5);
$pdf->SetFont('times', '', 12);
$html = <<<EOD

EOD;

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('mycv.pdf', 'I');
?>


