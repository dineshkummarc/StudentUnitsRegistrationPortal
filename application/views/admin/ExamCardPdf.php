<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //no unaauthorized acess
 //require('assets/fpdf/fpdf.php');
$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'unitdb');

class ExamCardPdf extends FPDF {
	   // Page header
function Header()
{
      // Logo
       // $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        $this->Cell(70);
        // Title
        $this->Cell(60,10,'Exam Card',0,0,'C');
        // Line break
        $this->Ln(20);

         // Colors, line width and bold font
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $this->cell(40,5,'UnitCode',1,0,'',true);
        $this->cell(25,5,'Unit Name',1,0,'',true);
        $this->cell(65,5,'Email',1,0,'',true);
        $this->cell(60,5,'Address',1,0,'',true);
}
// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($data);$i++)
        $this->Cell($w[$i],7,$data[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
function examcard(){
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');

    $this->cell(40,5,'Name',1,0,'',true);
    $this->cell(25,5,'Phone',1,0,'',true);
    $this->cell(65,5,'Email',1,0,'',true);
    $this->cell(60,5,'Address',1,0,'',true);
   


}

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
$this->Myfpdf=new ExamCardPdf();
$this->Myfpdf->AliasNbPages();
$this->Myfpdf->AddPage();
//$this->Myfpdf->examcard($unit);
//$$this->Myfpdf->SetFont('Times','',12);

$query=mysqli_query($conn,"SELECT * FROM registered_units");
while($data=mysqli_fetch_array($query)){
        $this->Myfpdf->cell(40,5,$data['UNITID'],1,0);
        $this->Myfpdf->cell(25,5,$data['STATUS'],1,0);
        $this->Myfpdf->cell(65,5,$data['SEMESTER'],1,0);
        $this->Myfpdf->cell(60,5,$data['ACADEMIC_YEAR'],1,1);

}



//for($i=1;$i<=40;$i++)
  //  $this->Myfpdf->Cell(0,10,'Printing line number '.$i,0,1);
$this->Myfpdf->Output();



  
   



?>