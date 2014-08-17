<?php
//============================================================+
// File name   : myTcpdf.php
// Begin       : 2014/07/28
// Last Update : ??
//
// Description : Class that has some abstracter methods for creating pdf
//
// Author: Bonneux Wim

//============================================================+


// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');


/**
 * Extend TCPDF to work with multiple columns
 */
class myTcpdf extends TCPDF {
	

	/**
	 * print header
	 * @param $label (string) header title
	 * @public
	 */
	public function printHeader($label) {
		$this->SetFont('helvetica', '', 18);
		$this->SetFillColor(192,192,192);
		$this->Cell(180, 7,$label, 0, 1, '', 1);
		$this->Ln(4);
	}
	
	public function printSmallHeader($label) {
		$this->SetFont('helvetica', '', 15);
		$this->SetFillColor(192,192,192);
		$this->Cell(180, 7,$label, 0, 1, '', 1);
		$this->Ln(3);
	}
	
	/**
	 * print label
	 * @param $label (string) label
	 * @public
	 */
	public function printLabel($label) {
		$this->SetFont('helvetica', '', 14);
		$this->SetFillColor(200, 220, 255);
		$this->Cell (50, 4, $label, 0, 0, 'L',true );
	}
	
	/**
	 * print option label
	 * @param $label (string) label
	 * @public
	 */
	public function printOptionLabel($label) {
		$this->SetFont('helvetica', '', 12);
		$this->SetFillColor(192,192,192);
		$this->Cell (40, 4, $label, 0, 0, 'L',true );
	}
	
	/**
	 * print dealer label
	 * @param $label (string) label
	 * @public
	 */
	public function printDealerLabel($label) {
		$this->SetFont('helvetica', '', 14);
		$this->SetFillColor(200, 220, 255);
		$this->Cell (35, 4, $label, 0, 0, 'L',true );
	}
	
	/**
	 * print value
	 * @param $value (string) label
	 * @public
	 */
	function printValue($value){
		$this->SetFont('helvetica', '', 14);
		$this->SetFillColor(255,255,255);
		$this->Cell (40, 4, $value, 0, 1, 'L',true );
	}
	
	/**
	 * print option value
	 * @param $value (string) label
	 * @public
	 */
	function printOptionValue($value){
		$this->SetFont('helvetica', '', 12);
		$this->SetFillColor(255,255,255);
		$this->Cell (50, 4, $value, 0, 1, 'L',true );
	}
	
	/** 
	 * print label & value
	 * @param $label (string) label
	 * @param $value (string) value
	 * @public
	 */
	public function printLabelValue($label,$value) {
// 		$this->SetFont('helvetica', '', 14);
// 		$this->SetFillColor(200, 220, 255);
// 		$this->Cell (180, 6,$label, 0, 1, '', 1);
// 		$this->Cell (180, 6,$label, 0, 1, '', 1);
// 		$this->Ln(4);
		
		$this->printLabel($label);
		$this->printSpace(2);
		if($value == null || $value == ''){
			$value = 'nihil';
		}
		$this->printValue($value);
		$this->Ln(2);
	}
	
	public function printOption($label, $value){
		$this->printOptionLabel($label);
		$this->printSpace(2);
		if($value == null || $value == ''){
			$value = 'nihil';
		}
		$this->printOptionValue($value);
		$this->Ln(2);
	}
	
	function printImage($image)
	{
		if($image != null & $image != ''){
			$this->Ln(3);
			$this->Image ($image,10,20,100,0);
			$this->Ln(60);
		}
	
	}
	
	/**
	 * Prints space
	 * @param $width (int) positions in space
	 * @public
	 */
	function printSpace($width){
		$this->Cell($width);
	}
	
	/**
	 * Set chapter title
	 * @param $num (int) chapter number
	 * @param $title (string) chapter title
	 * @public
	 */
	public function ChapterTitle($num, $title) {
		$this->SetFont('helvetica', '', 14);
		$this->SetFillColor(200, 220, 255);
		$this->Cell(180, 6, 'Chapter '.$num.' : '.$title, 0, 1, '', 1);
		$this->Ln(4);
	}
}
