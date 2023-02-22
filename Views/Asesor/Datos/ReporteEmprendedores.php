<?php
require('Assets/Fpdf/fpdf.php');

$nw=new FPDF ("p","mm","LETTER");

class pdf extends FPDF
{
    public function header ()
    {
        $this->Image('Assets/Img/Info/gnius.png',10,8,33);
    }
    function Footer()
    {
        $this->SetTextColor(0,0,0);
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,$this->PageNo(),0,0,'C');
    }
}
    $nombre = $_SESSION['nombre'];
    $fpdf = new pdf ('P', 'mm', 'letter', true);
    $fpdf->AddPage('portrait', 'letter');
    $fpdf->SetFont('Arial','B',10);
    $fpdf->SetTitle("Reporte Emprendedores");
    $fpdf->Cell(80);
    $fpdf->Cell(35,10,'Reporte de Empredendores - Formulario',0,0,'C');
    $fpdf->Ln(10);
    $fpdf->setMargins(10,30,20,20);
    $fpdf->SetFont("Arial","",9);
    $fpdf->SetTextColor(0,0,0);
    $fpdf->SetY(25);
    $fpdf->SetX(10);
    $fpdf->Write(5, 'Fecha: ' .Date("Y-m-d"));
    $fpdf->Ln();
    $fpdf->Write(5, 'Nombre del Asesor: '.utf8_decode($nombre));
    $fpdf->Ln();
    $fpdf->Line(10,$fpdf->GetY(),60,$fpdf->GetY());
    $fpdf->AliasNbPages();

    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","B",8);
    $fpdf->SetFillColor(93, 10, 40);
    $fpdf->SetTextColor(255, 255, 255);
    $fpdf->Cell(10,8,"#",1,0,"C",1);
    $fpdf->Cell(15,8,"Id Form.",1,0,"C",1);
    $fpdf->Cell(75,8,"Nombre",1,0,"C",1);
    $fpdf->Cell(80,8,"Correo",1,0,"C",1);
    $telefono = utf8_decode("Teléfono");
    $fpdf->Cell(20,8,$telefono,1,0,"C",1);
    $fpdf->SetLineWidth(0,3);
    $fpdf->SetDrawColor(80,80,80);
    $fpdf->Ln(8);

    $fpdf->SetFont("Arial","",8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
    foreach($stmt as $fll){
        $fpdf->Cell(10,10,$fll['id_datoEmprendedor'],0,0,"L",1);
        $fpdf->Cell(15,10,$fll['id_formulario'],0,0,"L",1);
        $fpdf->Cell(75,10,utf8_decode($fll['nombre_emprendedor']),0,0,"L",1);
        $fpdf->Cell(80,10,utf8_decode($fll['correo']),0,0,"L",1);
        $fpdf->Cell(20,10,utf8_decode($fll['telefono']),0,0,"L",1);
        $fpdf->Ln(8);
    }
    
    $fpdf->OutPut();

?>