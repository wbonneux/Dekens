
<?php
require '../_/components/php/SimpleImage.php';
//configuration for the validation of the form
$validation = array ();
$mandatory = array (
 		'pc_title' => 'pc_title',
		'pc_description' => 'pc_description'
);
$sanitize = array ();
$validator = new FormValidator ( $validation, $mandatory, $sanitize );
$errors = array();
$required = array();
//setting the input vars in session
if(isset($_POST['pc_id'])){ $_SESSION['pc_id'] = $_POST["pc_id"];}
if(isset($_POST['pc_title'])){ $_SESSION['pc_title'] = $_POST["pc_title"];}
if (isset ( $_POST ['pc_category'] )) {$_SESSION ['pc_category'] = $_POST ["pc_category"];}
if(isset($_POST['pc_description'])){ $_SESSION['pc_description'] = $_POST["pc_description"];}
if(isset($_POST['pc_image'])){ $_SESSION['pc_image'] = $_POST["pc_image"];}
if(isset($_POST['pc_active'])){$_SESSION['pc_active'] = '1';}else{$_SESSION['pc_active'] = '0';}

//placing the images in a tempory file until the form is validated and data is inserted(also used for previewing)
$ses_id = session_id();
//echo $_FILES['pc_image_1'];

checkUploadPhoto('pc_image',$_SESSION['pc_id']);



if ($validator->validate ( $_POST )) {
	
	$product = new Product();
	$productDAO = DAOFactory::getProductDAO();
	$product->id				= $_SESSION['pc_id'];
	$product->titleNed			= $_POST['pc_title'];
	$product->descrNed	 		= $_POST['pc_description'];
	$product->image				= setImage('pc_image');
	$product->active			= $_SESSION['pc_active']; 
	
// 	if($_SESSION['pc_active'] == 'true'){
// 		$product->active = 1;
// 	}else{
// 		$product->active = 0;
// 	}
// 	if($_SESSION['pc_sold'] == 'true'){
// 		$product->sold = 1;
// 	}else{
// 		$product->sold = 0;
// 	}
	
	
	
//  	echo 'ses-id: '.$_SESSION['pc_id'].'<br>';
	$productDAO->update($product);
	$prodxCat = new ProdXCategory();
	//echo 'id: '.$product->id;
	$prodxCatDAO = DAOFactory::getProdXCategoryDAO();
	$prodxCat = $prodxCatDAO->getProdXCategoryByProduct($product->id);
	if(isset($prodxCat->id)){
		$prodxCat->category = $_SESSION['pc_category'];
		$prodxCat->active = true;
		$prodxCatDAO->update($prodxCat);
	}else{
		$prodxCat = new ProdXCategory();
		$prodxCat->product = $product->id;
		$prodxCat->category = $_SESSION['pc_category'];
		$prodxCat->active = true;
		$prodxCat->id = $prodxCatDAO->insert($prodxCat);
		$prodxCat->order = $prodxCat->id;
		$prodxCatDAO->update($prodxCat);
	}
	
	//save the images in the folder images/product/[$id]/[imageName]
	//remove the session folder
	//reset the session vars
	if(isset($product->id)){
		//create id folder
// 		if(!file_exists("../images/product/".$product->id)){
// 			mkdir("../images/product/".$product->id);
// 		}
// 		//move each image to id folder
// 		saveUploadPhoto('pc_image_1',$ses_id,$product->id);
// 		saveUploadPhoto('pc_image_2',$ses_id,$product->id);
// 		saveUploadPhoto('pc_image_3',$ses_id,$product->id);
// 		saveUploadPhoto('pc_image_4',$ses_id,$product->id);
// 		saveUploadPhoto('pc_image_5',$ses_id,$product->id);
		//remove session folder
// 		if(file_exists("../images/tempory/".$ses_id)){
// 			rmdir("../images/tempory/".$ses_id);
// 		}
	}
	
	$_SESSION['pc_id']	 				= null;
	$_SESSION['pc_active'] 				= null;
	$_SESSION['pc_title'] 				= null;
	$_SESSION['pc_description']			= null;
	$_SESSION['pc_image']				= null;
	$_SESSION['pc_category']			= null;
		
	
// 	echo $_SESSION['pc_image_1'].'<br/>';
// 	echo $_SESSION['pc_image_2'].'<br/>';
// 	echo $_SESSION['pc_image_3'].'<br/>';
// 	echo $_SESSION['pc_image_4'].'<br/>';
// 	echo $_SESSION['pc_image_5'].'<br/>';
	include "../_/components/administration/php-version/product_grid.php";
}else{
	$output = $validator->getJSON ();
	$errors = $output ['errors'];
	$required = $output ['required'];
	echo '<div class="alert alert-error">';
	foreach ( $required as $key => $val ) {
		// echo $val;
		echo 'Verplicht veld: ' . $lang[$key] . '<br/>';
	}
	foreach ( $errors as $key => $val ) {
		// echo $val;
		echo 'Veld niet correct: ' . $lang[$key] . '<br/>';
	}
	echo '</div>';
	include "../_/components/administration/php-version/forms/product.form.php";
}

function setImage($imageId){
	if(isset($_SESSION[$imageId])){
		return $_SESSION[$imageId];
	}
	else{
		return null;
	}
}

function saveUploadPhoto($uploadId, $ses_id, $id){
	copy("../images/tempory/".$ses_id."/".$_SESSION[$uploadId],"../images/product/".$id."/".$_SESSION[$uploadId]);
	unlink("../images/tempory/".$ses_id."/".$_SESSION[$uploadId]);
}

function checkUploadPhoto($uploadId,$id){
	if(isset($_FILES[$uploadId]) && $_FILES[$uploadId]['name'] != ''){
		if($_FILES[$uploadId]['name'] != '')
		{
			$_SESSION[$uploadId] = $_FILES[$uploadId]["name"];
		}
		if(!file_exists("../images/product/".$id)){
			mkdir("../images/product/".$id);
		}
		if (! file_exists ( "../images/product/" . $id . "/sm/" )) {
			mkdir ( "../images/product/" . $id . "/sm/" );
		}
		//echo "../images/product/".$id."/".$_FILES[$uploadId]["name"];
		if(file_exists("../images/product/".$id."/".$_FILES[$uploadId]["name"])){
			unlink("../images/product/".$id."/".$_FILES[$uploadId]["name"]);
		}
		if(file_exists("../images/product/".$id."/sm/".$_FILES[$uploadId]["name"])){
			unlink("../images/product/".$id."/sm/".$_FILES[$uploadId]["name"]);
		}
		if(!file_exists("../images/product/".$id."/".$_FILES[$uploadId]["name"])){
			$tempFile = $_FILES[$uploadId]['tmp_name'];
			move_uploaded_file($_FILES[$uploadId]["tmp_name"], "../images/product/".$id."/".$_FILES[$uploadId]["name"]);
			$img = new SimpleImage();
			$img->load("../images/product/" . $id . "/" . $_SESSION [$uploadId])->best_fit(600, 600)->save("../images/product/" . $id . "/sm/" . $_SESSION [$uploadId]);
			$_SESSION[$uploadId.'_location'] = "../images/product/".$id."/".$_FILES[$uploadId]["name"];
			$_SESSION[$uploadId.'_location'] = "../images/product/".$id."/".$_FILES[$uploadId]["name"];
			// 			echo "uploaded";
			// 			echo "Stored in: " . $_FILES["uploadPhoto"]["tmp_name"];
			// 			echo "Stored in: " . $_FILES["uploadPhoto"]["name"];
			// Check $_FILES['upfile']['error'] value.
			switch ($_FILES[$uploadId]['error']) {
				case UPLOAD_ERR_OK:
					break;
				case UPLOAD_ERR_NO_FILE:
					throw new RuntimeException('No file sent.');
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					throw new RuntimeException('Exceeded filesize limit.');
				default:
					throw new RuntimeException('Unknown errors.');
			}
		}
	}	
}
?>