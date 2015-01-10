
<?php
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
if (isset ( $_POST ['pc_parent'] )) {
	$_SESSION ['pc_parent'] = $_POST ["pc_parent"];
}
if (isset ( $_POST ['pc_menu'] )) {
	$_SESSION ['pc_menu'] = $_POST ["pc_menu"];
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
	$productCategory = new ProductCategory();
	$productCategoryDAO = DAOFactory::getProductCategoryDAO();
	
	$productCategory->titleNed = $_POST ['pc_title'];
	//$productCategory->section = $_POST ['pc_menu'];
	$productCategory->parent = $_POST ['pc_parent'];
	$productCategory->descrNed = $_POST ['pc_description'];
	$productCategory->image = setImage ( 'pc_image' );
	$productCategory->active = $_SESSION ['pc_active'];
	
	// if($_SESSION['pc_active'] == 'true'){
	// $productCategory->active = 1;
	// }else{
	// $productCategory->active = 0;
	// }
	// if($_SESSION['pc_sold'] == 'true'){
	// $productCategory->sold = 1;
	// }else{
	// $productCategory->sold = 0;
	// }
	
	$productCategory->id = $productCategoryDAO->insert ( $productCategory );
	//section_x_category
	$prodXSection = new ProdXSection();
	$prodXSection->section = $_POST ['pc_menu'];
	$prodXSection->category = $productCategory->id;
	$prodXSection->active = $_SESSION ['pc_active'];
	$prodXSectionDAO = DAOFactory::getProdXSectionDAO();
	$prodXSection->id = $prodXSectionDAO->insert($prodXSection);
	$prodXSection->order = $prodXSection->id;
	$prodXSectionDAO->update($prodXSection);
	
	// save the images in the folder images/secondHand/[$id]/[imageName]
	// remove the session folder
	// reset the session vars
	if (isset ( $productCategory->id )) {
		// create id folder
		if (! file_exists ( "../images/productCategory/" . $productCategory->id )) {
			mkdir ( "../images/productCategory/" . $productCategory->id );
		}
		// move each image to id folder
		if (isset ( $_SESSION ['pc_image'] )) {
			saveUploadPhoto ( 'pc_image', $ses_id, $productCategory->id );
		}
		
		// remove session folder
		if (file_exists ( "../images/tempory/" . $ses_id )) {
			rmdir ( "../images/tempory/" . $ses_id );
		}
	}
	
	$_SESSION ['pc_active'] = null;
	$_SESSION ['pc_menu'] = null;
	$_SESSION ['pc_parent'] = null;
	$_SESSION ['pc_title'] = null;
	$_SESSION ['pc_description'] = null;
	$_SESSION ['pc_image'] = null;
	$_SESSION ['pc_image_location'] = null;
	
	// echo $_SESSION['pc_image_1'].'<br/>';
	// echo $_SESSION['pc_image_2'].'<br/>';
	// echo $_SESSION['pc_image_3'].'<br/>';
	// echo $_SESSION['pc_image_4'].'<br/>';
	// echo $_SESSION['pc_image_5'].'<br/>';
	include "../_/components/administration/php-version/category_grid.php";
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
	include "../_/components/administration/php-version/forms/productCategory.form.php";
}
function setImage($imageId) {
	if (isset ( $_SESSION [$imageId] )) {
		return $_SESSION [$imageId];
	} else {
		return null;
	}
}
function saveUploadPhoto($uploadId, $ses_id, $id) {
	copy ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId], "../images/productCategory/" . $id . "/" . $_SESSION [$uploadId] );
	unlink ( "../images/tempory/" . $ses_id . "/" . $_SESSION [$uploadId] );
	//add a directory 'sm', resize the image and save in this folder
	if (! file_exists ( "../images/productCategory/" . $id . "/sm/" )) {
		mkdir ( "../images/productCategory/" . $id . "/sm/" );
	}
	$img = new SimpleImage();
	$img->load("../images/productCategory/" . $id . "/" . $_SESSION [$uploadId])->best_fit(600, 600)->save("../images/productCategory/" . $id . "/sm/" . $_SESSION [$uploadId]);
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