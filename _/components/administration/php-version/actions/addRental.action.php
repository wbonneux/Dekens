
<?php
require '../_/components/php/upload.class.php';
require '../_/components/php/SimpleImage.php';
// configuration for the validation of the form
$validation = array ();
$mandatory = array (
		'sh_title' => 'sh_title',
		'sh_description' => 'sh_description' 
);
$sanitize = array ();
$validator = new FormValidator ( $validation, $mandatory, $sanitize );
$errors = array ();
$required = array ();

// setting the input vars in session
if (isset ( $_POST ['sh_title'] )) {
	$_SESSION ['sh_title'] = $_POST ["sh_title"];
}
if (isset ( $_POST ['sh_description'] )) {
	$_SESSION ['sh_description'] = $_POST ["sh_description"];
}
if (isset ( $_POST ['sh_price_day'] )) {
	$_SESSION ['sh_price_day'] = $_POST ["sh_price_day"];
}
if (isset ( $_POST ['sh_price_weekend'] )) {
	$_SESSION ['sh_price_weekend'] = $_POST ["sh_price_weekend"];
}
if (isset ( $_POST ['sh_price_week'] )) {
	$_SESSION ['sh_price_week'] = $_POST ["sh_price_week"];
}
if (isset ( $_POST ['sh_image_1'] )) {
	$_SESSION ['sh_image_1'] = $_POST ["sh_image_1"];
}
if (isset ( $_POST ['sh_image_2'] )) {
	$_SESSION ['sh_image_2'] = $_POST ["sh_image_2"];
}
if (isset ( $_POST ['sh_image_3'] )) {
	$_SESSION ['sh_image_3'] = $_POST ["sh_image_3"];
}
if (isset ( $_POST ['sh_image_4'] )) {
	$_SESSION ['sh_image_4'] = $_POST ["sh_image_4"];
}
if (isset ( $_POST ['sh_image_5'] )) {
	$_SESSION ['sh_image_5'] = $_POST ["sh_image_5"];
}
// echo "setting session<br/>";
// echo 'sh_active(pre): '. $_SESSION["sh_active"].'<br/>';
if (isset ( $_POST ['sh_active'] )) {
	$_SESSION ['sh_active'] = '1';
} else {
	$_SESSION ['sh_active'] = '0';
}
// echo 'sh_active(post): '. $_SESSION["sh_active"].'<br/>';

// placing the images in a tempory file until the form is validated and data is inserted(also used for previewing)
$ses_id = session_id ();
// echo $_FILES['sh_image_1'];
checkUploadPhoto ( 'sh_image_1', $ses_id );
checkUploadPhoto ( 'sh_image_2', $ses_id );
checkUploadPhoto ( 'sh_image_3', $ses_id );
checkUploadPhoto ( 'sh_image_4', $ses_id );
checkUploadPhoto ( 'sh_image_5', $ses_id );

if ($validator->validate ( $_POST )) {
	$rental = new Rental ();
	$rentalDAO = DAOFactory::getRentalDAO ();
	
	$rental->title = $_POST ['sh_title'];
	$rental->description = $_POST ['sh_description'];
	$rental->priceDay = $_POST ['sh_price_day'];
	$rental->priceWeekend = $_POST ['sh_price_weekend'];
	$rental->priceWeek = $_POST ['sh_price_week'];
	$rental->image1 = setImage ( 'sh_image_1' );
	$rental->image2 = setImage ( 'sh_image_2' );
	$rental->image3 = setImage ( 'sh_image_3' );
	$rental->image4 = setImage ( 'sh_image_4' );
	$rental->image5 = setImage ( 'sh_image_5' );
	// echo 'active(post): '.$_POST['sh_active'].'<br/>';
	// echo 'active(session): '.$_SESSION['sh_active'].'<br/>';
	$rental->active = $_SESSION ['sh_active'];
	
	// if($_SESSION['sh_active'] == 'true'){
	// $rental->active = 1;
	// }else{
	// $rental->active = 0;
	// }
	// if($_SESSION['sh_sold'] == 'true'){
	// $rental->sold = 1;
	// }else{
	// $rental->sold = 0;
	// }
	
	$rental->id = $rentalDAO->insert ( $rental );
	// save the images in the folder images/rental/[$id]/[imageName]
	// remove the session folder
	// reset the session vars
	if (isset ( $rental->id )) {
		// create id folder
		if (! file_exists ( "../images/rental/" . $rental->id )) {
			mkdir ( "../images/rental/" . $rental->id );
		}
		// move each image to id folder
		if (isset ( $_SESSION ['sh_image_1'] )) {
			saveUploadPhoto ( 'sh_image_1', $ses_id, $rental->id );
		}
		if (isset ( $_SESSION ['sh_image_2'] )) {
			saveUploadPhoto ( 'sh_image_2', $ses_id, $rental->id );
		}
		if (isset ( $_SESSION ['sh_image_3'] )) {
			saveUploadPhoto ( 'sh_image_3', $ses_id, $rental->id );
		}
		if (isset ( $_SESSION ['sh_image_4'] )) {
			saveUploadPhoto ( 'sh_image_4', $ses_id, $rental->id );
		}
		if (isset ( $_SESSION ['sh_image_5'] )) {
			saveUploadPhoto ( 'sh_image_5', $ses_id, $rental->id );
		}
		// remove session folder(test if exist and if $ses_id != ""
		if ($ses_id != "" && file_exists ( "../images/tempory/" . $ses_id )) {
			rmdir ( "../images/tempory/" . $ses_id );
		}
	}
	
	$_SESSION ['sh_id'] = null;
	$_SESSION ['sh_active'] = null;
	$_SESSION ['sh_title'] = null;
	$_SESSION ['sh_price_day'] = null;
	$_SESSION ['sh_price_weekend'] = null;
	$_SESSION ['sh_price_week'] = null;
	$_SESSION ['sh_description'] = null;
	$_SESSION ['sh_image_1'] = null;
	$_SESSION ['sh_image_1_location'] = null;
	$_SESSION ['sh_image_2'] = null;
	$_SESSION ['sh_image_2_location'] = null;
	$_SESSION ['sh_image_3'] = null;
	$_SESSION ['sh_image_3_location'] = null;
	$_SESSION ['sh_image_4'] = null;
	$_SESSION ['sh_image_4_location'] = null;
	$_SESSION ['sh_image_5'] = null;
	$_SESSION ['sh_image_5_location'] = null;
	
	// echo $_SESSION['sh_image_1'].'<br/>';
	// echo $_SESSION['sh_image_2'].'<br/>';
	// echo $_SESSION['sh_image_3'].'<br/>';
	// echo $_SESSION['sh_image_4'].'<br/>';
	// echo $_SESSION['sh_image_5'].'<br/>';
	include "../_/components/administration/php-version/rental_grid.php";
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
	include "../_/components/administration/php-version/forms/rental.form.php";
}
function setImage($imageId) {
	if (isset ( $_SESSION [$imageId] )) {
		return $_SESSION [$imageId];
	} else {
		return null;
	}
}
function saveUploadPhoto($uploadId, $ses_id, $id) {
	copy ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId], "../images/rental/" . $id . "/" . $_SESSION [$uploadId] );
	unlink ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId] );
	
	if (! file_exists ( "../images/rental/" . $id . "/sm/" )) {
		mkdir ( "../images/rental/" . $id . "/sm/" );
	}
	$img = new SimpleImage();
	$img->load("../images/rental/" . $id . "/" . $_SESSION [$uploadId])->best_fit(600, 600)->save("../images/rental/" . $id . "/sm/" . $_SESSION [$uploadId]);
}
function checkUploadPhoto($uploadId, $ses_id) {
	if (isset ( $_FILES [$uploadId] )) {
		if ($_FILES [$uploadId] ['name'] != '') {
			$_SESSION [$uploadId] = $_FILES [$uploadId] ["name"];
		}
		if (! file_exists ( "../images/tempory/" . $ses_id )) {
			mkdir ( "../images/tempory/" . $ses_id );
		}
		if (! file_exists ( "../images/tempory/" . $ses_id . "/" . $_FILES [$uploadId] ["name"] )) {
			$tempFile = $_FILES [$uploadId] ['tmp_name'];
			move_uploaded_file ( $_FILES [$uploadId] ["tmp_name"], "../images/tempory/" . $ses_id . "/" . $_FILES [$uploadId] ["name"] );
			$_SESSION [$uploadId . '_location'] = "../images/tempory/" . $ses_id . "/" . $_FILES [$uploadId] ["name"];
			// echo "uploaded";
			// echo "Stored in: " . $_FILES["uploadPhoto"]["tmp_name"];
			// echo "Stored in: " . $_FILES["uploadPhoto"]["name"];
			// Check $_FILES['upfile']['error'] value.
			switch ($_FILES [$uploadId] ['error']) {
				case UPLOAD_ERR_OK :
					break;
				case UPLOAD_ERR_NO_FILE :
					throw new RuntimeException ( 'No file sent.' );
				case UPLOAD_ERR_INI_SIZE :
				case UPLOAD_ERR_FORM_SIZE :
					throw new RuntimeException ( 'Exceeded filesize limit.' );
				default :
					throw new RuntimeException ( 'Unknown errors.' );
			}
		}
	}
}
?>