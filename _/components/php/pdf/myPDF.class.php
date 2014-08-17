<?php
require ('fpdf.php');
class PDF extends FPDF {
	// Page header
	var $searchRequest = null;
	var $searchRequestDetails = null;
	var$userContact = null;
	var $userReply = null;
// 	var $searchArticle = null;
	var $baseCodeDAO = null;
	
// 	function fillObjects($searchRequest, $searchRequestDetails, $userContact, $userReply, $searchArticle){
// 		$this->searchRequest = $searchRequest;
// 		$this->searchRequestDetails = $searchRequestDetails;
// 		$this->searchArticle = $searchArticle;
// 		$this->userContact = $userContact;
// 		$this->userReply = $userReply;
// 		$this->baseCodeDAO = DAOFactory::getCodeTableDAO();
// 	}
	
	function fillObjects($searchRequest, $searchRequestDetails, $userContact){
		$this->searchRequest = $searchRequest;
		$this->searchRequestDetails = $searchRequestDetails;
		$this->userContact = $userContact;
		$this->baseCodeDAO = DAOFactory::getCodeTableDAO();
	}
	function Header() {
		// Logo
		// $this->Image('logo.png',10,6,30);
		// Arial bold 15
		$this->SetFont ( 'Arial', 'B', 15 );
		// Move to the right
		$this->Cell ( 40 );
		// Title
		//$this->Cell ( 100, 10, 'Zoekopdracht: '.$this->searchRequest->id, 1, 1, 'C' );
		// Line break
		$this->Ln(10);
	}
	
	function printHeader($headerTitle){
		$this->SetFont ( 'Arial', 'B', 14 );
		$this->SetFillColor(200,220,255);
		// Title
		$this->Cell (0, 6, $headerTitle, 0, 1, 'L',true );
		// Line break
		$this->Ln ( 4 );
	}
	
	function printHeaderValue($headerTitle, $value){
		$this->SetFont ( 'Arial', 'B', 14 );
		$this->SetFillColor(200,220,255);
		// Title
		$this->Cell (0, 6, $headerTitle.' '.$value, 0, 1, 'L',true );
		// Line break
		$this->Ln ( 4 );
	}
	
	function printHeaderWithId($headerTitle, $id, $table){
		$value = $this->baseCodeDAO->getDescrByLang($id, $table, 'nl');
		$this->SetFont ( 'Arial', 'B', 14 );
		$this->SetFillColor(200,220,255);
		// Title
		$this->Cell (0, 6, $headerTitle.' '.$value, 0, 1, 'L',true );
		// Line break
		$this->Ln ( 4 );
	}
	
	function printLabelValue($label, $value){
		$this->printLabel($label);
		$this->printSpace(2);
		if($value == null || $value == ''){
			$value = 'nihil';
		}
		$this->printValue($value);
		$this->Ln(2);
	}
	
	function printLabelYesNo($label, $value){
		$this->printLabel($label);
		$this->printSpace(2);
		if($value == 1){
			$value = 'Ja';
		}else{
			$value = 'Nee';
		}
		$this->printValue($value);
		$this->Ln(2);
	}
	
	function printSpace($width){
		$this->Cell($width);
	}
	
	function printLabelId($label,$id, $table){
		$this->printLabel($label);
		$this->printSpace(2);
		if($id == null || $id == ''){
			$value = 'nihil';
		}else{
			$value = $this->baseCodeDAO->getDescrByLang($id, $table, 'nl');
		}
		$this->printValue($value);
		$this->Ln(2);
	}
	
	function printTextArea($label,$value){
		$this->printLabel($label);
		$this->Ln(4);
		$this->MultiCell(0, 5, $value);
		$this->Ln(5);
	}
	
	function printImage($image)
	{
		if($image != null & $image != ''){
			$this->Ln(3);
			$this->Image($image,10,150,0,50);
			$this->Ln(60);
		}
		
	}
	

	
	function printLabel($label){
		$this->SetFont ( 'Arial', 'B', 10 );
		$this->SetFillColor(200,220,255);
		// label
		$this->Cell (40, 4, $label, 0, 0, 'L',true );
	}
	
	function printValue($value){
		$this->SetFont ( 'Arial', 'B', 10 );
		$this->SetFillColor(255,255,255);
		// label
		$this->Cell (25, 4, $value, 0, 1, 'L',true );
	}
	
	
	// Page footer
	function Footer() {
		// Position at 1.5 cm from bottom
		$this->SetY ( - 15 );
		// Arial italic 8
		$this->SetFont ( 'Arial', 'I', 8 );
		// Page number
		$this->Cell ( 0, 10, 'Page ' . $this->PageNo () . '/{nb}', 0, 0, 'C' );
	}
}

//Instanciation of inherited class
// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
// $pdf->Cell(0,10,'Printing line number '.$i,0,1);
// $pdf->Output();
?>
