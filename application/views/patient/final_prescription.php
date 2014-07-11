<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2012-07-25
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

require_once('config/lang/eng.php');
require_once('tcpdf.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo.jpg';
		//$this->Image($image_file, 15, 10, 50, '', 'JPG', '', 'T', false, 500, '', false, false, 0, false, false, false);
		// Set font
		//$this->SetFont('helvetica', 'B', 15);
		// Title
		//$this->Cell(0, 20, 'Registered Patient Information', 0, false, 'L', 0, '', 0, false, 'B', 'B');
		
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		//$this->SetY(-15);
		// Set font
		//$this->SetFont('helvetica', 'I', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


		//$patient_id = $this->input->post('hptntID');	
		/*$patient_name = $this->input->post('hpName');
		$patient_sex = $this->input->post('hpSex');
		$patient_dob = $this->input->post('hpDob');
		$patient_address = $this->input->post('hpAddress');
		$patient_phone = $this->input->post('hpPhone');
		$patient_occupation = $this->input->post('hpOccupation');
		$patient_marital = $this->input->post('hpMarital');
		$patient_religion = $this->input->post('hpReligion');
		$patient_nid = $this->input->post('hpNid');
		$patient_center = $this->input->post('hpCenter');	*/
		$today =  date("d/m/Y");
		
		
		
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A5', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Motiaz');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE,0);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.


// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
//$pdf->setTextRenderingMode(0.1,true,false);
// define barcode style
$style = array(
	'position' => '',
	'align' => 'C',
	'stretch' => false,
	'fitwidth' => true,
	'cellfitalign' => '',
	'border' => true,
	'hpadding' => 'auto',
	'vpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255),
	'text' => true,
	'font' => 'helvetica',
	'fontsize' => 8,
	'stretchtext' => 4
);


//$pdf->Write($prescription);
//$pdf->setTextRenderingMode($stroke=0, $fill=true, $clip=false);
//$pdf->Write(0, '                     ' , '', 0, '', true, 0, false, false, 0);

//$pdf->Write(0, $prescription, '', 0, '', true, 0, false, false, 0);
//$pdf->SetFillColor(215, 235, 255);
$pdf->SetFont('dejavusans', 'B', 10, '', true);

$pdf->MultiCell(132, 30, $doc_name,0, 'R', 0, 0, 10, 10, true);
$pdf->SetFont('dejavusans', '', 6, '', true);

$pdf->MultiCell(132, 26, $doc_designation, 0, 'R', 0, 0, 10, 15, true);
$pdf->Image('images/logo1.jpg', 9, 5, 8, 16, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('dejavusans', '', 5, '', true);
$pdf->MultiCell(34, 15, 'SAMAMA Telemedicine'."\n".'204/10, Sargachera, 1 No. Sharak'."\n".'East Goalchamot, Faridpur'."\n"
        .'Cell: 01714-985425, 01917-985425'."\n".'E-Mail: samamabd@yahoo.com', 0, 'L', 0, 0, 8, 21, true);

$pdf->Line(7, 40, 142, 40);
$pdf->SetFont('dejavusans', 'B', 8, '', true);
$pdf->SetFillColor(215, 235, 255);
$pdf->MultiCell(35, 4, 'Patient ID: '. ($patient_id+101000), 0, 'L', 1, 0, 7, 45, true);
$pdf->MultiCell(35, 4, 'Examination ID: '.$exam_id, 0, 'L', 1, 0, 44, 45, true);
$pdf->SetFont('dejavusans', '', 8, '', true);
$pdf->MultiCell(95, 4, 'Name: '.$patient_name, 0, 'L', 1, 0, 7, 50, true);
$pdf->MultiCell(20, 4, 'Sex: '.$patient_sex, 0, 'L', 1, 0, 104, 50, true);
$pdf->MultiCell(15, 4, 'Age: '.$patient_age, 0, 'L', 1, 0, 126, 50, true);
$pdf->MultiCell(30, 4, 'Date: '.$today, 0, 'L', 1, 0, 111, 55, true);
$pdf->MultiCell(40, 4, 'Phone: '.$patient_phone, 0, 'L', 1, 0, 7, 55, true);
//$pdf->MultiCell(180, 32, $doc_designation, 0, 'R', 1, 0, 20, 15, true);
//$pdf->MultiCell(180, 200, $doc_designation, 0, 'L', 1, 0, '40', '', true);
$pdf->Image('images/rx.jpg', 57, 65, 8, 8, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('dejavusans', '', 8, '', true);
$pdf->MultiCell(85, 115, $prescription, 0, 'L', 0, 0, 57, 70, true);
$pdf->SetFillColor(211, 250, 185);
$pdf->SetFont('dejavusans', 'B', 8, '', true);
$pdf->MultiCell(45, 5, 'Symptom:', 0, 'L', 1, 0, 7, 65, true);
$pdf->SetFont('dejavusans', '', 6, '', true);
$pdf->MultiCell(45, 115, $symptom, 0, 'L', 1, 0, 7, 70, true);

$pdf->SetFont('dejavusans', 'B', 6, '', true);

$pdf->MultiCell(135, 20,'This prescription is given by Doctor through telemedicine software. Any handwritten prescription over this page is not valid.',0, 'L', 0, 0, 7, 190, true);

// Print text using writeHTMLCell()
//$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
//$pdf->write1DBarcode($patient_id, 'C128', '60', '', '150', '30','1', $style, 'C');
$pdf->Ln();

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output(($patient_id+101000).'_'.$exam_id.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
