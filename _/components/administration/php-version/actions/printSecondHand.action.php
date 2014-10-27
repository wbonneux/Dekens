<?php
//Get all the attributes of the secondHand from the DB
//print the attributes and first photo in specific format
//email the pdf to the specific recipient



//print the pdf
require_once('../_/components/tcp_pdf/myTcpdf.php');
include "../_/components/phpqrcode/qrlib.php";
//QR code
//set it to writable location, a place for temp generated PNG files
//$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
$PNG_TEMP_DIR = "../images/2deHands/QR/";

//html PNG location prefix
$PNG_WEB_DIR = '../images/2deHands/QR/';

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
	mkdir($PNG_TEMP_DIR);


$filename = $PNG_TEMP_DIR.'2dehandsdetail.png';
$errorCorrectionLevel = 'L';
$matrixPointSize = 2;
QRcode::png("http://www.dekens-agritechnics.be/2dehandsDetail.php?id=".$secondHand->id, $filename, $errorCorrectionLevel, $matrixPointSize, 2);



//display generated file
//echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';


//end QR code
$pdf = new myTcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('dejavusans', '', 14, '', true);
$pdf->AddPage();
$pdf->printHeader("Tweedehands - ".$secondHand->title);
//$pdf->printLabel("Aantal werkuren: ",$secondHand->hoursWork);
$pdf->printImage("../images/secondHand/".$secondHand->id."/".$secondHand->image1);
//$pdf->writeHTMLCell(100, 100, 100, 100,"testing",0,0,false,false,"left",true);
$absY = 20;
$pdf->SetAbsXY(115, $absY);
if($secondHand->buildYear != null && $secondHand->buildYear != 0){
	$pdf->printOption("Bouwjaar ",$secondHand->buildYear);
	$absY = $absY + 8;
	$pdf->SetAbsXY(115, $absY);
}

if($secondHand->hoursWork != null && $secondHand->hoursWork != 0){
	$pdf->printOption("Aantal werkuren ",$secondHand->hoursWork);
	$absY = $absY + 8;
	$pdf->SetAbsXY(115, $absY);
}

if($secondHand->sizeTireFront != null && $secondHand->sizeTireFront != ""){
	//$pdf->printOption("Bandenmaat(voor) ",$secondHand->sizeTireFront);
	$pdf->printOptionLabel("Bandenmaat(voor)");
	$absY = $absY + 8;
	$pdf->SetAbsXY(115, $absY);
	$pdf->printOptionValue($secondHand->sizeTireFront);
	$absY = $absY + 8;
	$pdf->SetAbsXY(115, $absY);
}

if($secondHand->sizeTireBack != null && $secondHand->sizeTireBack != ""){
// 	$pdf->printOption("Bandenmaat(achter) ",$secondHand->sizeTireBack);
	$pdf->printOptionLabel("Bandenmaat(achter)");
	$absY = $absY + 8;
	$pdf->SetAbsXY(115, $absY);
	$pdf->printOptionValue($secondHand->sizeTireBack);
	$absY = $absY + 8;
	$pdf->SetAbsXY(115, $absY);
}

//print QR image
//$absY = $absY + 5;
$pdf->SetAbsXY(115, $absY);
$pdf->Image($PNG_WEB_DIR.basename($filename));
// $pdf->printImage($PNG_WEB_DIR.basename($filename));


//description
$pdf->SetAbsXY(10, 100);
$pdf->printSmallHeader("Details");
$pdf->SetAbsXY(10, 110);
$pdf->writeHTML($secondHand->description);

//printDealerInformation(Name, address, phone, email
$pdf->SetAbsXY(10,230);
$pdf->printSmallHeader("Dealer Info");
//$pdf->printDealerLabel("Dealer info");
$pdf->SetAbsXY(10,240);
$pdf->printValue("Dekens Agri Technics");
$pdf->printValue("Roosbeekstraat 52");
$pdf->printValue("3800 Zepperen");
$pdf->SetAbsXY(70, 240);
$pdf->printValue("T:011/68.44.10");
$pdf->SetAbsX(70);
$pdf->printValue("F:011/68.24.53");
$pdf->SetAbsX(70);
$pdf->printValue("E:info@dekens-agritechnics.be");
$pdf->SetAbsX(70);
$pdf->printValue("W:dekens-agritechnics.be");
$PNG_TEMP_DIR = "../images/DekensAgriTechnics/QR/";
$PNG_WEB_DIR = '../images/DekensAgriTechnics/QR/';
$filename = $PNG_TEMP_DIR.'DekensAgriTechnics.png';
$errorCorrectionLevel = 'L';
$matrixPointSize = 2;

QRcode::png("http://www.dekens-agritechnics.be", $filename, $errorCorrectionLevel, $matrixPointSize, 2);
$pdf->SetAbsXY(160,240);
$pdf->Image($PNG_WEB_DIR.basename($filename));


//Overwrite the 
$pdf->Output('secondHand/VerkoopFiche.pdf', 'F'); //->DEV
//email the pdf(for prod)
include '../_/components/mail/sendVerkoopFiche.php';
//$attachment = $pdf->Output('Verkoopsfiche: '.$secondHand->title,'E'); //->Attachment
 
?>	