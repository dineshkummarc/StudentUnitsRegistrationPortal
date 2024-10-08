<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 require('assets/fpdf/fpdf.php');

class FPDF extends CI_Controller {
    public function  __construct()
    {
        
        parent::__construct();
                $this->load->helper('url');
                $this->load->library('fpdf_gen');

          
    }
    
     // Page header
function Header()
{
      // Logounituni
        $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->Ln(20);
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
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();



  


   
   
    
}