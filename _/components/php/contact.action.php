<?php 
//configuration for the validation of the form
$validation = array (
		'contact_email' => 'email',
		'contact_phone' => 'phone',
);
$mandatory = array (
		'contact_name' => 'contact_name',
		'contact_email' => 'contact_email',
		'contact_message' => 'contact_message'
);
$sanitize = array ();
$validator = new FormValidator ( $validation, $mandatory, $sanitize );
$errors = array();
$required = array();

//setting the input vars in session
if(isset($_POST['contact_name'])){ $_SESSION['contact_name'] = $_POST["contact_name"];}
if(isset($_POST['contact_email'])){ $_SESSION['contact_email'] = $_POST["contact_email"];}
if(isset($_POST['contact_phone'])){ $_SESSION['contact_phone'] = $_POST["contact_phone"];}
if(isset($_POST['contact_message'])){ $_SESSION['contact_message'] = $_POST["contact_message"];}


if ($validator->validate ( $_POST )) {
	include '_/components/mail/sendMail.php';
	//echo 'mail: '.$_SESSION['contact_name'].';'.$_SESSION['contact_email'];
	if (!$mail->send()) {
		echo '<div class="alert alert-warning">Uw aanvraag is niet verstuurd! Gelieve opnieuw te vesturen!</div>';
	} else {
		echo '<div class="alert alert-success">Uw aanvraag is verstuurd! We zullen u zo snel mogelijk contacteren!</div>';
		$_SESSION['contact_name'] = null;
		$_SESSION['contact_email'] = null;
		$_SESSION['contact_phone'] = null;
		$_SESSION['contact_message'] = null;
	}
	
	
}else{
	$output = $validator->getJSON ();
	$errors = $output ['errors'];
	$required = $output ['required'];
	echo '<div class="alert alert-warning">';
	foreach ( $required as $key => $val ) {
		echo '$required: '.$required[$key];
		echo 'Gelieve het volgende veld in te vullen: ' . $lang[$key] . '<br/>';
	}
	foreach ( $errors as $key => $val ) {
		// echo $val;
		echo '$errors: '.$errors[$key];
		echo 'Het volgende veld is incorrect: ' .$lang[$key] . '<br/>';
	}
	echo '</div>';
}
?>