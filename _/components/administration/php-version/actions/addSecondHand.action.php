
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
if (isset ( $_POST ['sh_price'] )) {
	$_SESSION ['sh_price'] = $_POST ["sh_price"];
}
if (isset ( $_POST ['sh_hourswork'] )) {
	$_SESSION ['sh_hourswork'] = $_POST ["sh_hourswork"];
}
if (isset ( $_POST ['sh_buildyear'] )) {
	$_SESSION ['sh_buildyear'] = $_POST ["sh_buildyear"];
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
if (isset ( $_POST ['sh_sizetirefront'] )) {
	$_SESSION ['sh_sizetirefront'] = $_POST ["sh_sizetirefront"];
}
if (isset ( $_POST ['sh_sizetireback'] )) {
	$_SESSION ['sh_sizetireback'] = $_POST ["sh_sizetireback"];
}
// echo "setting session<br/>";
// echo 'sh_active(pre): '. $_SESSION["sh_active"].'<br/>';
if (isset ( $_POST ['sh_active'] )) {
	$_SESSION ['sh_active'] = '1';
} else {
	$_SESSION ['sh_active'] = '0';
}
if (isset ( $_POST ['sh_sold'] )) {
	$_SESSION ['sh_sold'] = '1';
} else {
	$_SESSION ['sh_sold'] = '0';
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
	$secondHand = new SecondHand ();
	$secondHandDAO = DAOFactory::getSecondHandDAO ();
	
	$secondHand->title = $_POST ['sh_title'];
	$secondHand->description = $_POST ['sh_description'];
	$secondHand->buildYear = $_POST ['sh_buildyear'];
	$secondHand->hoursWork = $_POST ['sh_hourswork'];
	$secondHand->price = $_POST ['sh_price'];
	$secondHand->sizeTireFront = $_POST ['sh_sizetirefront'];
	$secondHand->sizeTireBack = $_POST ['sh_sizetireback'];
	$secondHand->image1 = setImage ( 'sh_image_1' );
	$secondHand->image2 = setImage ( 'sh_image_2' );
	$secondHand->image3 = setImage ( 'sh_image_3' );
	$secondHand->image4 = setImage ( 'sh_image_4' );
	$secondHand->image5 = setImage ( 'sh_image_5' );
	// echo 'active(post): '.$_POST['sh_active'].'<br/>';
	// echo 'active(session): '.$_SESSION['sh_active'].'<br/>';
	$secondHand->active = $_SESSION ['sh_active'];
	$secondHand->sold = $_SESSION ['sh_sold'];
	
	// if($_SESSION['sh_active'] == 'true'){
	// $secondHand->active = 1;
	// }else{
	// $secondHand->active = 0;
	// }
	// if($_SESSION['sh_sold'] == 'true'){
	// $secondHand->sold = 1;
	// }else{
	// $secondHand->sold = 0;
	// }
	
	$secondHand->id = $secondHandDAO->insert ( $secondHand );
	// save the images in the folder images/secondHand/[$id]/[imageName]
	// remove the session folder
	// reset the session vars
	if (isset ( $secondHand->id )) {
		// create id folder
		if (! file_exists ( "../images/secondHand/" . $secondHand->id )) {
			mkdir ( "../images/secondHand/" . $secondHand->id );
		}
		// move each image to id folder
		if (isset ( $_SESSION ['sh_image_1'] )) {
			saveUploadPhoto ( 'sh_image_1', $ses_id, $secondHand->id );
		}
		if (isset ( $_SESSION ['sh_image_2'] )) {
			saveUploadPhoto ( 'sh_image_2', $ses_id, $secondHand->id );
		}
		if (isset ( $_SESSION ['sh_image_3'] )) {
			saveUploadPhoto ( 'sh_image_3', $ses_id, $secondHand->id );
		}
		if (isset ( $_SESSION ['sh_image_4'] )) {
			saveUploadPhoto ( 'sh_image_4', $ses_id, $secondHand->id );
		}
		if (isset ( $_SESSION ['sh_image_5'] )) {
			saveUploadPhoto ( 'sh_image_5', $ses_id, $secondHand->id );
		}
		// remove session folder
		if (file_exists ( "../images/tempory/" . $ses_id )) {
			rmdir ( "../images/tempory/" . $ses_id );
		}
	}
	
	$_SESSION ['sh_active'] = null;
	$_SESSION ['sh_sold'] = null;
	$_SESSION ['sh_title'] = null;
	$_SESSION ['sh_price'] = null;
	$_SESSION ['sh_sizetirefront'] = null;
	$_SESSION ['sh_sizetireback'] = null;
	$_SESSION ['sh_hourswork'] = null;
	$_SESSION ['sh_buildyear'] = null;
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
	include "../_/components/administration/php-version/secondHand_grid.php";
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
	include "../_/components/administration/php-version/forms/secondHand.form.php";
}
function setImage($imageId) {
	if (isset ( $_SESSION [$imageId] )) {
		return $_SESSION [$imageId];
	} else {
		return null;
	}
}
function saveUploadPhoto($uploadId, $ses_id, $id) {
	copy ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId], "../images/secondHand/" . $id . "/" . $_SESSION [$uploadId] );
	unlink ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId] );
	//add a directory 'sm', resize the image and save in this folder
	if (! file_exists ( "../images/secondHand/" . $id . "/sm/" )) {
		mkdir ( "../images/secondHand/" . $id . "/sm/" );
	}
	$img = new SimpleImage();
	$img->load("../images/secondHand/" . $id . "/" . $_SESSION [$uploadId])->best_fit(400, 400)->save("../images/secondHand/" . $id . "/sm/" . $_SESSION [$uploadId]);
}
function checkUploadPhoto($uploadId, $ses_id) {
// 	echo '$uploadId(begin): '.$uploadId.'<br>';
	if (isset ( $_FILES [$uploadId] )) {
		if ($_FILES [$uploadId] ['name'] != '') {
			$_SESSION [$uploadId] = $_FILES [$uploadId] ["name"];
		}
		if (! file_exists ( "../images/tempory/" . $ses_id )) {
			mkdir ( "../images/tempory/" . $ses_id );
		}
		if (! file_exists ( "../images/tempory/" . $ses_id . "/" . $_FILES [$uploadId] ["name"] )) {
			//testing upload class
// 			$uploaded = new Upload($_FILES[$uploadId]);
			
// 			$types  = array('image/png');
// 			$ext    = array('png');
// 			$size   = 1;
			
// 			$uploaded->validate($size, $ext, $types);
// 			$estado = $uploaded->save( "../images/tempory/" . $ses_id. "/");
			
// 			if($estado){
// 				echo "Imagen Guardada correctamente.";
// 				$uploaded->rename('imagen1.png');
			
// 			} else {
// 				echo "Imagen no valida.";
// 			}
						
			
			
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
// 		echo '$uploadId(end): '.$uploadId.'<br>';
	}
}
?>