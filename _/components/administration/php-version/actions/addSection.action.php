
<?php
require '../_/components/php/SimpleImage.php';
// configuration for the validation of the form
$validation = array ();
$mandatory = array (
 		'pc_title' => 'pc_title',
		'pc_description' => 'pc_description' 
);
$sanitize = array ();
$validator = new FormValidator ( $validation, $mandatory, $sanitize );
$errors = array ();
$required = array ();

// setting the input vars in session
if (isset ( $_POST ['pc_title'] )) {
	$_SESSION ['pc_title'] = $_POST ["pc_title"];
}
if (isset ( $_POST ['pc_description'] )) {
	$_SESSION ['pc_description'] = $_POST ["pc_description"];
}
if (isset ( $_POST ['pc_image'] )) {
	$_SESSION ['pc_image'] = $_POST ["pc_image"];
}
if (isset ( $_POST ['pc_active'] )) {
	$_SESSION ['pc_active'] = '1';
} else {
	$_SESSION ['pc_active'] = '0';
}

// placing the images in a tempory file until the form is validated and data is inserted(also used for previewing)
$ses_id = session_id ();
// echo $_FILES['pc_image_1'];
checkUploadPhoto ( 'pc_image', $ses_id );

if ($validator->validate ( $_POST )) {
	$section = new ProductSection();
	$sectionDAO = DAOFactory::getProductSectionDAO();
	
	$section->titleNed = $_POST ['pc_title'];
	$section->descrNed = $_POST ['pc_description'];
	$section->image = setImage ( 'pc_image' );
	$section->active = $_SESSION ['pc_active'];
	
	// if($_SESSION['pc_active'] == 'true'){
	// $section->active = 1;
	// }else{
	// $section->active = 0;
	// }
	// if($_SESSION['pc_sold'] == 'true'){
	// $section->sold = 1;
	// }else{
	// $section->sold = 0;
	// }
	
	$section->id = $sectionDAO->insert ( $section );
	$section->order = $section->id;
	$sectionDAO->update($section);
	// save the images in the folder images/secondHand/[$id]/[imageName]
	// remove the session folder
	// reset the session vars
	if (isset ( $section->id )) {
		// create id folder
		if (! file_exists ( "../images/productSection/" . $section->id )) {
			mkdir ( "../images/productSection/" . $section->id );
		}
		// move each image to id folder
		if (isset ( $_SESSION ['pc_image'] )) {
			saveUploadPhoto ( 'pc_image', $ses_id, $section->id );
		}
		
		// remove session folder
		if (file_exists ( "../images/tempory/" . $ses_id )) {
			rmdir ( "../images/tempory/" . $ses_id );
		}
	}
	
	$_SESSION ['pc_active'] = null;
	$_SESSION ['pc_title'] = null;
	$_SESSION ['pc_description'] = null;
	$_SESSION ['pc_image'] = null;
	$_SESSION ['pc_image_location'] = null;
	
	// echo $_SESSION['pc_image_1'].'<br/>';
	// echo $_SESSION['pc_image_2'].'<br/>';
	// echo $_SESSION['pc_image_3'].'<br/>';
	// echo $_SESSION['pc_image_4'].'<br/>';
	// echo $_SESSION['pc_image_5'].'<br/>';
	include "../_/components/administration/php-version/section_grid.php";
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
	include "../_/components/administration/php-version/forms/productSection.form.php";
}
function setImage($imageId) {
	if (isset ( $_SESSION [$imageId] )) {
		return $_SESSION [$imageId];
	} else {
		return null;
	}
}
function saveUploadPhoto($uploadId, $ses_id, $id) {
	copy ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId], "../images/productSection/" . $id . "/" . $_SESSION [$uploadId] );
	unlink ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId] );
	//add a directory 'sm', resize the image and save in this folder
	if (! file_exists ( "../images/productSection/" . $id . "/sm/" )) {
		mkdir ( "../images/productSection/" . $id . "/sm/" );
	}
	$img = new SimpleImage();
	$img->load("../images/productSection/" . $id . "/" . $_SESSION [$uploadId])->best_fit(600, 600)->save("../images/productSection/" . $id . "/sm/" . $_SESSION [$uploadId]);
	
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