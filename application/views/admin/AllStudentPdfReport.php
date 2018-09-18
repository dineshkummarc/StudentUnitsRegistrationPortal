<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //no unaauthorized acess
 //require('assets/fpdf/fpdf.php');
$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'unitdb');

class AllStudentPdfReport extends FPDF {
   
  
  
	   // Page header
function Header()
{
      // Logo
        $this->Image('assets/img/embu-logo.jpg',85,6,30);
        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        $this->Cell(70);
        // Title
        // $this->Ln(1);
        $this->Cell(40,60,'UNIVERSITY OF EMBU',0,0,'C');
       //  $this->Ln(5);
        //empty cell

       // $this->Cell(200,70,'',1,'C');
        $this->Ln(10);
        $this->Cell(180,60,'All Students',0,0,'C');
        $this->Ln(30);
       
        /* $this->Ln(40);
        $this->Cell(50,5,'Academic Year :',0,0,'L');
        $this->Cell(50,5,"".$this->CI->session->userdata('academicyear')."",0,0,'L');
         $this->Cell(40,5,'Semester :',0,0,'R');
         $this->Cell(40,5,""."".$this->CI->session->userdata('semester').""."",0,1,'L');
       // $this->Cell(30,5,'Programme',1,1,'L');
          $this->Ln(5);
        $this->Cell(180,5,"".$this->CI->session->userdata('programme')."",0,0,'C');*/
    
       /* $this->Cell(30,5,'Programme',1,0,'L');
        $this->Cell(80,5,'Bachelor of science in IT',1,0,'L');
        $this->Cell(30,5,'Academic Year',1,0,'L');
        $this->Cell(30,5,'2017/2018',1,0,'L');
        $this->Cell(20,5,'Semester',1,1,'L');*/
        // Line break
        $this->Ln(10);

         // Colors, line width and bold font
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $this->cell(40,7,'RegNo',1,0,'',true);
        $this->cell(40,7,'First Name',1,0,'',true);
        $this->cell(40,7,'Last Name',1,0,'',true);
        $this->cell(20,7,'Gender',1,0,'',true);
        $this->cell(50,7,'Phone Number',1,1,'',true);
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

    $this->cell(60,5,'RegNo',1,0,'',true);
    $this->cell(60,5,'First Name',1,0,'',true);
    $this->cell(60,5,'Last Name',1,0,'',true);
    $this->cell(60,5,'Gender',1,0,'',true);
    $this->cell(60,5,'Phone Number',1,0,'',true);
   


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
$this->Myfpdf=new AllStudentPdfReport();
$this->Myfpdf->AliasNbPages();
$this->Myfpdf->AddPage();
//$this->Myfpdf->examcard($unit);
$this->Myfpdf->SetFont('Times','',12);
$myq="SELECT * FROM student";
$query=mysqli_query($conn,$myq) or die(mysqli_error($conn));
while($data=mysqli_fetch_array($query)){
   // print_r($data);
      $this->Myfpdf->cell(40,7,$data['REGNO'],1,0);
       $this->Myfpdf->cell(40,7,$data['FIRSTNAME'],1,0);
       $this->Myfpdf->cell(40,7,$data['LASTNAME'],1,0);
       $this->Myfpdf->cell(20,7,$data['GENDER'],1,0);
       $this->Myfpdf->cell(50,7,$data['PHONENUMBER'],1,1);

}
//foreach ($student as $data ) {
    # code...
      // $this->Myfpdf->cell(60,7,$data['REGNO'],1,0);
      /* $this->Myfpdf->cell(60,7,$data['FIRSTNAME'],1,0);
       $this->Myfpdf->cell(60,7,$data['LASTNAME'],1,0);
       $this->Myfpdf->cell(60,7,$data['GENDER'],1,0);
       $this->Myfpdf->cell(60,7,$data['PHONENUMBER'],1,1);/*/
//}




//for($i=1;$i<=40;$i++)
  //  $this->Myfpdf->Cell(0,10,'Printing line number '.$i,0,1);
$this->Myfpdf->Output();



  
   



?>