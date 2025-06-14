<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php'); 
include "get_api.php";

class MyPDF extends TCPDF {
    public function Header() {
        $this->SetY(10);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(0, 15, 'Online CV App, created by : muhammad rifqi', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(3);
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MyPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($data['name']);
$pdf->SetTitle('My Curiculum Vitae');
$pdf->SetSubject('Curiculum Vitae');
$pdf->SetKeywords('TCPDF, PDF, Curiculum Vitae');
$pdf->SetMargins(15, 27, 15);
$pdf->SetAutoPageBreak(TRUE, 25);
//----------------------------------------------Halaman Pertama ----------------------------------------------------
$pdf->AddPage();
$pdf->SetFont('times', 'B', 20);
$pdf->Write(0, $data['name'], '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(2);
$pdf->SetFont('times', '', 14);
$pdf->Write(0, 'IT Technical Leader, PT Arnawa Teknologi Solusi, '.$data['phone_number'].'', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, 'email : '.$data['email'].'', '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(5);
$pdf->Line(15, $pdf->GetY(), $pdf->getPageWidth() - 15, $pdf->GetY());
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 10);
$html = '';
$html .= '<h4 style="background-color:#ccc; width: 100%;">Description</h4>';
$html .= '<p>Hallo, Saya <b>'.$data['name'].'</b> , Saya Seorang Fullstack Developer,Pekerjaan terakhir saya sebagai <b>'.$data['last_position'].'</b>, Saya sudah bekerja kurang lebih 10 tahun di bidang yang sama. dan saya professional dalam bidang ini.</p>';

if (!empty($data['company'])) {
    $html .= '<table border="0" cellpadding="5" cellspacing="0" width="100%">';
    $html .= '<thead><tr bgcolor="#ccc"><th width="50%"><b>Company Name</b></th><th width="25%" align="right"><b>Start Date</b></th> <th width="25%" align="right"><b>End Date</b></th> </tr></thead>';
    $html .= '<tbody>';
    foreach ($data['company'] as $item) {
        $html .= '<tr>';
        $html .= '<td width="50%" align="left">' . htmlspecialchars($item['company_name']) . '</td>';
        $html .= '<td width="25%" align="right">' . htmlspecialchars($item['start_date']) . '</td>';
        $html .= '<td width="25%" align="right">' . htmlspecialchars($item['end_date']) . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';
} else {
    $html .= '<p>Tidak ada data ditemukan dari API.</p>';
}

$html .= '<h4 style="background-color:#ccc; width: 100%;">Skill Set</h4>';

if (!empty($data['skill'])) {
    $kolom=3;
    $i=0;
    $html .= '<table border="0" cellpadding="5" cellspacing="0" width="100%"><tr>';
    foreach ($data['skill'] as $items) {
    if($i >= $kolom){
        $html .= '</tr><tr>';
        $i=0;
    }
    $html .= '<td align="left"> <div style="background-color: #ccc;"> <b> ' . htmlspecialchars(strtoupper($items['description'])) . ' </b> - [ ' .htmlspecialchars(strtoupper($items['level'])). ' ] </div></td>';
    $i++;
    }
    $html .= '</tr></table>';
} else {
    $html .= '<p>Tidak ada data ditemukan dari API.</p>';
}
$pdf->writeHTML($html, true, false, true, false, '');
//----------------------------------------------Halaman Kedua ----------------------------------------------------
$pdf->AddPage();
$pdf->SetFont('times', 'B', 20);
$pdf->Write(0, $data['name'], '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(2);
$pdf->SetFont('times', '', 14);
$pdf->Write(0, 'IT Technical Leader, PT Arnawa Teknologi Solusi, '.$data['phone_number'].'', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, 'email : '.$data['email'].'', '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(5);
$pdf->Line(15, $pdf->GetY(), $pdf->getPageWidth() - 15, $pdf->GetY());
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 10);
$pages = '';
$pages .= '<h4 style="background-color:#ccc; width: 100%;">Project Apps</h4>';
$pages .='<div></div>';
$pages .= '<div>Berikut detail projek dari beberapa perusahaan yang tercantum diatas, diantaranya sebagai berikut : </div>';
$pages .='<div style="background-color:#ccc; width: 100%;"></div>';
$pages .= '<div></div>';
if (!empty($data['company'])) {
    for ($i = 0 ; $i < count($data['company']); $i++) {
        $pages .= '<div style="border: 1px solid #ccc;">';
        $pages .= '<span style="background-color:#ccc">'.htmlspecialchars($data['company'][$i]['company_name']).'</span>';
        $pages .= '<ul>';
        if(isset($data['company'][$i]['job_desc'])  && is_array($data['company'][$i]['job_desc'])){
            for($j=0; $j < count($data['company'][$i]['job_desc']); $j++){
                $pages .= '<li>'.htmlspecialchars($data['company'][$i]['job_desc'][$j]['job_description']).'</li>';
            }
        }
        $pages .= '</ul>';
        $pages .= '</div>';
        $pages .= '<div></div>';
        $pages .= '<div></div>';
    }
} else {
    $pages .= '<p>Tidak ada data ditemukan dari API.</p>';
}
$pdf->writeHTML($pages, true, false, true, false, '');

$pdf->Output('mycv.pdf', 'I');
?>


