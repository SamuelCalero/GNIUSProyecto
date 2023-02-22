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
    $fpdf->SetTitle("Reporte formularios");
    $fpdf->Cell(80);
    $fpdf->Cell(35,10,'Reporte Formulario',0,0,'C');
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
    $fpdf->Cell(200,8,"Datos Generales empresa:",1,0,"C",1);
    $fpdf->SetLineWidth(0,3);
    $fpdf->SetDrawColor(80,80,80);
    $fpdf->Ln(8);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,"Nombre Empresa:",0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->Cell(160,10,utf8_decode($fll['nombre_empresa']),0,0,"L",1);
    }
    $fpdf->Ln(8);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,utf8_decode("Dirección"),0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->Cell(160,10,utf8_decode($fll['direccion']),0,0,"L",1);
    }
    $fpdf->Ln(8);
    //-------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,"Correo:",0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->Cell(160,10,utf8_decode($fll['correo_empresa']),0,0,"L",1);
    }
    $fpdf->Ln(8);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,utf8_decode("Teléfono"),0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->Cell(160,10,$fll['telefono'],0,0,"L",1);
    }
    $fpdf->Ln(8);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,utf8_decode("Rubro"),0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->Cell(160,10,utf8_decode($fll['rubro']),0,0,"L",1);
    }
    $fpdf->Ln(8);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,utf8_decode("Título Investigación"),0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->Cell(160,10,utf8_decode($fll['titulo_investigacion']),0,0,"L",1);
    }
    $fpdf->Ln(8);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,utf8_decode("Vinculo UTEC"),0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(160,5,utf8_decode($fll['vinculo_utec']));
    }
    $fpdf->Ln(2);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(40,10,utf8_decode("Apoyo Solicitado"),0,0,"L",1);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(160,10,utf8_decode($fll['apoyo']));
    }
    $fpdf->Ln(2);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(200,10,utf8_decode("Descripción general"),0,0,"L",1);
    $fpdf->Ln(8);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(200,10,utf8_decode($fll['descripcion_emprendimiento']));
    }
    $fpdf->Ln(6);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(200,10,utf8_decode("Perfil empresa"),0,0,"L",1);
    $fpdf->Ln(8);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(200,10,utf8_decode($fll['perfil_investigacion']));
    }
    $fpdf->Ln(8);
    //--------------------------------    //--------------------------------
    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","B",8);
    $fpdf->SetFillColor(93, 10, 40);
    $fpdf->SetTextColor(255, 255, 255);
    $fpdf->Cell(200,8,"Datos Emprendimiento:",1,0,"C",1);
    $fpdf->SetLineWidth(0,3);
    $fpdf->SetDrawColor(80,80,80);
    $fpdf->Ln(7);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(200,10,utf8_decode("Planteamiento del problema"),0,0,"L",1);
    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(200,10,utf8_decode($fll['planteamiento_problema']));
    }
    $fpdf->Ln(6);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(200,10,utf8_decode("Antecedentes"),0,0,"L",1);
    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(200,10,utf8_decode($fll['antecedentes']));
    }
    $fpdf->Ln(6);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(200,10,utf8_decode("Delimitación"),0,0,"L",1);
    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(200,10,utf8_decode($fll['delimitacion']));
    }
    $fpdf->Ln(6);
    $fpdf->Ln();
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(200,10,utf8_decode("Justificación"),0,0,"L",1);
    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(200,10,utf8_decode($fll['justificacion']));
    }
    $fpdf->Ln(6);
    //--------------------------------
    $fpdf->SetFont("Arial","B",8);
    $fpdf->Cell(200,10,utf8_decode("Objetivos"),0,0,"L",1);
    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","",8);
    foreach($stmt as $fll){
        $fpdf->MultiCell(200,10,utf8_decode($fll['objetivos']));
    }
    $fpdf->Ln(6);
    //--------------------------------    //--------------------------------
    $fpdf->Ln(5);
    $fpdf->SetFont("Arial","B",8);
    $fpdf->SetFillColor(93, 10, 40);
    $fpdf->SetTextColor(255, 255, 255);
    $fpdf->Cell(200,8,"Datos Emprendedores:",1,0,"C",1);
    $fpdf->Ln();
    $fpdf->Cell(5,8,"#",1,0,"C",1);
    $fpdf->Cell(75,8,"Nombre Emprendedor",1,0,"C",1);
    $fpdf->Cell(70,8,"Correo ",1,0,"C",1);
    $fpdf->Cell(15,8,utf8_decode("Teléfono"),1,0,"C",1);
    $fpdf->Cell(35,8,utf8_decode("Dirección"),1,0,"C",1);
    $fpdf->SetLineWidth(0,3);
    $fpdf->SetDrawColor(80,80,80);
    $fpdf->Ln(9);
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->SetFillColor(255, 255, 255);
    $fpdf->SetFont("Arial","",8);
    foreach($data as $fll){
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->SetFillColor(255, 255, 255);
        $fpdf->Cell(5,6,$fll['id_datoEmprendedor'],0,0,"L",1);
        $fpdf->Cell(75,6,utf8_decode($fll['nombre_emprendedor']),0,0,"L",1);
        $fpdf->Cell(70,6,utf8_decode($fll['correo']),0,0,"L",1);
        $fpdf->Cell(15,6,$fll['telefono'],0,0,"L",1);
        $fpdf->MultiCell(35,6,utf8_decode($fll['direccion']));
        $fpdf->Ln(4);
    }

    $fpdf->OutPut();

?>