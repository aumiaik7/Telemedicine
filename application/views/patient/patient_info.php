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
	//	$this->SetFont('helvetica', 'I', 8);
		// Page number
	//	$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


		$patient_id = $this->input->post('hptntID');	
		$patient_name = $this->input->post('hpName');
		$patient_sex = $this->input->post('hpSex');
		$patient_dob = $this->input->post('hpDob');
		$patient_address = $this->input->post('hpAddress');
		$patient_phone = $this->input->post('hpPhone');
		$patient_occupation = $this->input->post('hpOccupation');
		$patient_marital = $this->input->post('hpMarital');
		$patient_religion = $this->input->post('hpReligion');
		$patient_nid = $this->input->post('hpNid');
		//$patient_center = $this->input->post('hpCenter');	
		$patient_ref = $this->input->post('hpRef');
		
		
		
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A5', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Motiaz');
$pdf->SetTitle('Patient Information');
$pdf->SetSubject('Patient Information');
$pdf->SetKeywords('Patient, Information');

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
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
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
// Set some content to print
$html = <<<EOD

<h1 align="center">Registered Patient Information</h1>

	<table cellpadding="5" cellspacing="0" >
	<tr>
	<td align="center" style="background-color:#3366FF; font-weight:bold font-size:28px" colspan="2">
	Patient id: $patient_id
	</td>
	</tr>
	<tr>
	<td colspan="2">
	<b>Patient Name:</b> $patient_name 
	</td>
	
	</tr>
	<tr>
	<td>
	<b>Sex:</b> $patient_sex
	</td>
	<td>
	<b>Date of Birth:</b> $patient_dob
	</td>
	</tr>
	<tr>
	<td colspan="2">
	<b>Address:</b> $patient_address 
	</td>
	
	</tr>
	<tr>
	<td >
	<b>Phone:</b> $patient_phone
	</td>
	<td >
	<b>Occupation:</b> $patient_occupation
	</td>
	
	</tr>
	
	<tr>
	<td >
	<b>Marital Status:</b> $patient_marital
	</td>
	<td >
	<b>Religion:</b> $patient_religion
	</td>
	
	</tr>
	
	<tr>
	<td colspan="2">
	<b>National ID No.:</b> $patient_nid
	</td>
	
	</tr>
	<tr>
	<td>
	<b>Reference ID:</b> $patient_ref
	</td>
	<td>
	
	</td>
	
	</tr>
	
	<tr>
	<td colspan="2">
	
	</td>
	</tr>
	
	
	
	</table>

EOD;

// CODE 128 AUTO
//$pdf->Cell(0, 0, 'CODE 128 AUTO', 0, 1);




// Print text using writeHTMLCell()
$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='45', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->write1DBarcode($patient_id, 'C128', '25', '', '100', '30','1', $style, 'C');
$pdf->Ln();

		
		
//$fontname = $pdf->addTTFfont('fonts/SolaimanLipi.ttf', 'TrueTypeUnicode', '', 32);
//$fontname = $pdf->addTTFfont('fonts/vrinda.ttf', 'TrueTypeUnicode', '', 32);
//$pdf->SetFont('SolaimanLipi', 'BI', 20, '', 'false');
//$pdf->SetFont('solaimanlipi', '', 20, '', true);
//$pdf->SetFont('vrinda', '', 10, '', true);

//$pdf->MultiCell(34, 15, 'Ami ababuba অবসা', 0, 'L', 0, 0, 65, 98, true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($patient_id.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
