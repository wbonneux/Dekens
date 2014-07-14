<?php

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: contact.php'); exit;
}
	
// get the posted data
$name = $_POST['contact_name'];
$email_address = $_POST['contact_email'];
$phone = $_POST['contact_phone'];
$message = $_POST['contact_message'];
	
// check that a name was entered
if (empty($name))
    $error = 'U moet een naam opgeven.';
// check that an email address was entered
elseif (empty($email_address)) 
    $error = 'U moet een email adres opgeven.';
// check for a valid email address
elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email_address))
    $error = 'U moet een geldig email adres opgeven.';
// check that a phone number was entered
if (empty($phone))
    $error = 'U moet een telefoonnummer opgeven.';
// check that a message was entered
elseif (empty($message))
    $error = 'U moet een bericht opgeven.';
		
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: contact.php?e='.urlencode($error)); exit;
}

$headers = "From: $email_address\r\n"; 
$headers .= "Reply-To: $email_address\r\n";

// write the email content
$email_content = "Naam: $name\n";
$email_content .= "Email adres: $email_address\n";
$email_content .= "Telefoon: $phone\n";
$email_content .= "Bericht:\n\n$message";
	
// send the email
//ENTER YOUR INFORMATION BELOW FOR THE FORM TO WORK!
mail ('info@dekens-agritechnis.be.be', 'Agri Technics Dekens - Contact formulier', $email_content, $headers);
	
// send the user back to the form
header('Location: contact.php?s='.urlencode('Hartelijk bedankt voor uw bericht!.')); exit;

//testing

//define the receiver of the email
$to = 'info@dekens-agritechnics.be';
//define the subject of the email
$subject = 'Test email'; 
//define the message to be sent. Each line should be separated with \n
$message = "Hello World!\n\nThis is my first mail."; 
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: wbonneux@gmail.com\r\nReply-To: wbonneux@gmail.com";
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
// echo $mail_sent ? "Mail sent" : "Mail failed";


?>