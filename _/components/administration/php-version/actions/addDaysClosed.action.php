<?php
// configuration for the validation of the form
$validation = array ();
$mandatory = array ('obj_day' => 'obj_day');
$sanitize = array ();
$validator = new FormValidator ( $validation, $mandatory, $sanitize );
$errors = array ();
$required = array ();

// setting the input vars in session
if (isset ( $_POST ['obj_day'] )) {
	$_SESSION ['obj_day'] = $_POST ["obj_day"];
}
if (isset ( $_POST ['obj_active'] )) {
	$_SESSION ['obj_active'] = '1';
} else {
	$_SESSION ['obj_active'] = '0';
}

if ($validator->validate ( $_POST )) {
	$object = new AvDaysClosed();
	$objDAO = DAOFactory::getDaysClosedDAO();
	
	$object->day = $_POST ['obj_day'];
	$object->active = $_SESSION ['obj_active'];
	$object->id = $objDAO->insert ( $object );
	
	$_SESSION ['obj_day'] = null;
	$_SESSION ['obj_active'] = null;
	include "../_/components/administration/php-version/daysClosed_grid.php";
} else {
	$output = $validator->getJSON ();
	$errors = $output ['errors'];
	$required = $output ['required'];
	echo '<div class="alert alert-error">';
	foreach ( $required as $key => $val ) {
		// echo $val;
		echo 'Verplicht veld: ' . $lang [$key] . '<br/>';
	}
	foreach ( $errors as $key => $val ) {
		// echo $val;
		echo 'Veld niet correct: ' . $lang [$key] . '<br/>';
	}
	echo '</div>';
	include "../_/components/administration/php-version/forms/daysClosed.form.php";
}
?>