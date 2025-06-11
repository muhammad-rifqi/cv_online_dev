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
$pdf->SetFont('helvetica', 'B', 20);
$pdf->Write(0, 'Muhammad Rifqi', '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(2);
$pdf->SetFont('helvetica', '', 14);
$pdf->Write(0, 'Fullstack Developer, PT Arnawa Teknologi Solusi, +6281927067602', '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(5);
$pdf->Line(15, $pdf->GetY(), $pdf->getPageWidth() - 15, $pdf->GetY());
$pdf->Ln(5);

// $pdf->SetFont('helvetica', 'B', 14);
// $pdf->Write(0, 'Personal Information', '', 0, 'L', true, 0, false, false, 0);
// $pdf->Line(15, $pdf->GetY(), $pdf->getPageWidth() - 15, $pdf->GetY());
// $pdf->Ln(5);

$pdf->SetFont('helvetica', '', 12);
// $pdf->Write(0, 'Ini adalah halaman pertama.', '', 0, 'L', true, 0, false, false, 0);

$html = <<<EOD
<table border="1" cellpadding="10">
    <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
     <tr>
        <td width="50%">Ini konten kolom kiri.<br>Baris kedua di kiri.</td>
        <td width="50%">Ini konten kolom kanan.<br>Baris kedua di kanan.</td>
    </tr>
</table>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('mycv.pdf', 'I');
?>

// $pdf->Write(0, 'Ini adalah halaman pertama.', '', 0, 'L', true, 0, false, false, 0);
// $pageWidth = $pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right'];
// $columnWidth = $pageWidth / 2;

// Konten kolom kiri
// $leftContent = "Ini adalah konten kolom kiri.\nBaris kedua di kolom kiri.";
// Konten kolom kanan
// $rightContent = "Ini adalah konten kolom kanan.\nBaris kedua di kolom kanan.";

// Posisi Y awal
// $y = $pdf->GetY();

// Tulis kolom kiri
// $pdf->MultiCell($columnWidth, 0, $leftContent, 1, 'L', 0, 0, '', '', true, 0, false, true, 0);

// Tulis kolom kanan
// $pdf->MultiCell($columnWidth, 0, $rightContent, 1, 'L', 0, 1, '', '', true, 0, false, true, 0);

// Tambahkan halaman kedua
// $pdf->AddPage();
// $pdf->Write(0, 'Ini adalah halaman kedua.', '', 0, 'L', true, 0, false, false, 0);

// Tambahkan halaman ketiga
// $pdf->AddPage();
// $pdf->Write(0, 'Ini adalah halaman ketiga.', '', 0, 'L', true, 0, false, false, 0);

// Output file PDF (bisa juga simpan ke file dengan 'F' dan nama file)

