<?php 

//SMTP needs accurate times, and the PHP time zone MUST be set 
//This should be done in your php.ini, but this is how to do it if you don't have access to that 
date_default_timezone_set('Etc/UTC'); 

require_once 'PHPMailerAutoload.php'; 


//1. send mail to Agri Technics
//Create a new PHPMailer instance 
$mail = new PHPMailer(); 
//Tell PHPMailer to use SMTP 
$mail->isSMTP(); 
//Enable SMTP debugging 
// 0 = off (for production use) 
// 1 = client messages 
// 2 = client and server messages 
$mail->SMTPDebug = 0; 
//Ask for HTML-friendly debug output 
$mail->Debugoutput = 'html'; 
//Set the hostname of the mail server 
$mail->Host = "mail.dekens-agritechnics.be"; 
//Set the SMTP port number - likely to be 25, 465 or 587 
$mail->Port = 587; 
//Whether to use SMTP authentication 
$mail->SMTPAuth = true;
$mail->Username = 'gert@dekens-agritechnics.be';
$mail->Password = 'dekens'; 
//Set who the message is to be sent from 
//$mail->setFrom($_SESSION['contact_email'], $_SESSION['contact_name']);


 $mail->addAddress('gert@dekens-agritechnics.be', 'Dekens Agri Technics');
$mail->addAddress('wbonneux@gmail.com', 'Dekens Agri Technics');


//Set an alternative reply-to address 
//$mail->addReplyTo('NoReply@dekens-agritechnics.be', 'Dekens Agri Technics'); 
//Set who the message is to be sent to 
//$mail->addAddress('info@dekens-agritechnics.be', 'Dekens Agri Technics');
$mail->setFrom("noreply@dekens-agritechnics.be", "Dekens Agri Technics");
//$mail->addAddress('wbonneux@gmail.com', 'Webbo WebDesign'); 
//Set the subject line 
$mail->Subject = 'Verkoopfiche - 2deHands'; 
//Read an HTML message body from an external file, convert referenced images to embedded, 
//convert HTML into a basic plain-text alternative body 
//$mail->msgHTML(file_get_contents($_SESSION['contact_message']), dirname(__FILE__)); 
//Replace the plain text body with one created manually
$body = 'Verkoopfiche in bijlage';
// $body = $body.'Email: '.$_SESSION['contact_email'].'<br/>';
// if(isset($_SESSION['contact_phone']) && $_SESSION['contact_phone'] != ''){
// 	$body = $body.'Telefoon/GSM: '.$_SESSION['contact_phone'].'<br/>';
// }
// $body = $body.'Bericht: <br/>'.$_SESSION['contact_message'].'<br/>';
$mail->msgHTML($body); 
//Attach an image file 
$mail->addAttachment('secondHand/VerkoopFiche.pdf'); 
//send the message, check for errors 
$mail->send();
?> 