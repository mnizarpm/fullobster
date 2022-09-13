<?php
require('../assets/fpdf/fpdf.php');
require('../config/config.php');
require('../function/function.php');
$id = base64_decode($_GET["i"]);
$dari = base64_decode($_GET["d"]);
$hingga = base64_decode($_GET["h"]);
$data = get_device2($conn, $id);
$nama_device = $data['nama_device'];

$data2 = get_data_device3($conn, $id, $dari, $hingga);
class PDF extends FPDF
{
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
// Move to the right
$pdf->Cell(80);
// Title
$pdf->Cell(30,7,'Data Monitoring',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,7,'Nilai pH, Suhu',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,7,'dan TDS',0,1,'C');
$pdf->SetLineWidth(0.5);
$pdf->Line(10, 35, 200, 35);
// Line break
$pdf->Ln(10);

$pdf->SetFont('Times','',12);
$pdf->Cell(20,7,'Nama',0,0);
$pdf->Cell(5,7,':',0,0);
$pdf->Cell(20,7,$nama_device,0,1);
$pdf->Cell(20,7,'Dari',0,0);
$pdf->Cell(5,7,':',0,0);
$pdf->Cell(20,7,tanggal($dari),0,1);
$pdf->Cell(20,7,'Hingga',0,0);
$pdf->Cell(5,7,':',0,0);
$pdf->Cell(20,7,tanggal($hingga),0,1);
$pdf->Ln(7);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(90, 92, 105);
$pdf->SetFillColor(133, 135, 150);
$pdf->Cell(10,7,'No',1,0,'C', true);
$pdf->Cell(40,7,'Tanggal',1,0,'C', true);
$pdf->Cell(30,7,'Jam',1,0,'C', true);
$pdf->Cell(18,7,'pH',1,0,'C', true);
$pdf->Cell(18,7,'Suhu',1,0,'C', true);
$pdf->Cell(19,7,'TDS',1,0,'C', true);
$pdf->Cell(19,7,'pH',1,0,'C', true);
$pdf->Cell(19,7,'Suhu',1,0,'C', true);
$pdf->Cell(19,7,'TDS',1,1,'C', true);
$no = 1;
$fill = false;
$pdf->SetTextColor(0,0,0);
// $pdf->SetDrawColor(133, 135, 150);
$pdf->SetFillColor(176, 177, 186);
foreach ($data2 as $key => $value) {
    $pdf->Cell(10,7,$no,1,0,'C', $fill);
    $pdf->Cell(40,7,tanggal($value['tanggal']),1,0,'C', $fill);
    $pdf->Cell(30,7,$value['waktu'],1,0,'C', $fill);
    $pdf->Cell(18,7,$value['ph'],1,0,'C', $fill);
    $pdf->Cell(18,7,$value['suhu'],1,0,'C', $fill);
    $pdf->Cell(19,7,$value['tds'],1,0,'C', $fill);
    $pdf->Cell(19,7,$value['do'],1,0,'C', $fill);
    $pdf->Cell(19,7,$value['nitrit'],1,0,'C', $fill);
    $pdf->Cell(19,7,$value['amonia'],1,1,'C', $fill);
    $no += 1;
    $fill = !$fill;
}
$pdf->Output();
?>