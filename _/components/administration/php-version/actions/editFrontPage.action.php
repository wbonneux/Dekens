
<?php
//configuration for the validation of the form
$validation = array ();
$mandatory = array (
		'fp_title' => 'fp_title',
		'fp_description' => 'fp_description'
);
$sanitize = array ();
$validator = new FormValidator ( $validation, $mandatory, $sanitize );
$errors = array();
$required = array();
//setting the input vars in session
if(isset($_POST['fp_id'])){ $_SESSION['fp_id'] = $_POST["fp_id"];}
if(isset($_POST['fp_title'])){ $_SESSION['fp_title'] = $_POST["fp_title"];}
if(isset($_POST['fp_description'])){ $_SESSION['fp_description'] = $_POST["fp_description"];}
if(isset($_POST['fp_image'])){ $_SESSION['fp_image'] = $_POST["fp_image"];}
if(isset($_POST['fp_image_pos'])){ $_SESSION['fp_image_pos'] = $_POST["fp_image_pos"];}
if(isset($_POST['fp_active'])){$_SESSION['fp_active'] = '1';}else{$_SESSION['fp_active'] = '0';}

//placing the images in a tempory file until the form is validated and data is inserted(also used for previewing)
$ses_id = session_id();
//echo $_FILES['fp_image_1'];

checkUploadPhoto('fp_image',$_SESSION['fp_id']);



if ($validator->validate ( $_POST )) {
	$frontPage = new ContentFrontPage();
	$frontPageDAO = DAOFactory::getContentFrontPageDAO();
	
	$frontPage->id					= $_SESSION['fp_id'];
	$frontPage->title 				= $_POST['fp_title'];
	$frontPage->description 		= $_POST['fp_description'];
	$frontPage->image				= setImage('fp_image');
	$frontPage->imagePos			= setImage('fp_image_pos');
	$frontPage->active				= $_SESSION['fp_active']; 
	
// 	if($_SESSION['fp_active'] == 'true'){
// 		$frontPage->active = 1;
// 	}else{
// 		$frontPage->active = 0;
// 	}
// 	if($_SESSION['fp_sold'] == 'true'){
// 		$frontPage->sold = 1;
// 	}else{
// 		$frontPage->sold = 0;
// 	}
	
	
	
//  	echo 'ses-id: '.$_SESSION['fp_id'].'<br>';
	$frontPageDAO->update($frontPage);
	//save the images in the folder images/frontPage/[$id]/[imageName]
	//remove the session folder
	//reset the session vars
	if(isset($frontPage->id)){
		//create id folder
// 		if(!file_exists("../images/frontPage/".$frontPage->id)){
// 			mkdir("../images/frontPage/".$frontPage->id);
// 		}
// 		//move each image to id folder
// 		saveUploadPhoto('fp_image_1',$ses_id,$frontPage->id);
// 		saveUploadPhoto('fp_image_2',$ses_id,$frontPage->id);
// 		saveUploadPhoto('fp_image_3',$ses_id,$frontPage->id);
// 		saveUploadPhoto('fp_image_4',$ses_id,$frontPage->id);
// 		saveUploadPhoto('fp_image_5',$ses_id,$frontPage->id);
		//remove session folder
// 		if(file_exists("../images/tempory/".$ses_id)){
// 			rmdir("../images/tempory/".$ses_id);
// 		}
	}
	
	$_SESSION['fp_id']	 				= null;
	$_SESSION['fp_active'] 				= null;
	$_SESSION['fp_title'] 				= null;
	$_SESSION['fp_description']			= null;
	$_SESSION['fp_image']				= null;
	$_SESSION['fp_image_pos']			= null;
		
	
// 	echo $_SESSION['fp_image_1'].'<br/>';
// 	echo $_SESSION['fp_image_2'].'<br/>';
// 	echo $_SESSION['fp_image_3'].'<br/>';
// 	echo $_SESSION['fp_image_4'].'<br/>';
// 	echo $_SESSION['fp_image_5'].'<br/>';
	include "../_/components/administration/php-version/frontPage_grid.php";
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
	include "../_/components/administration/php-version/forms/frontPage.form.php";
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
	copy("../images/tempory/".$ses_id."/".$_SESSION[$uploadId],"../images/frontPage/".$id."/".$_SESSION[$uploadId]);
	unlink("../images/tempory/".$ses_id."/".$_SESSION[$uploadId]);
}

function checkUploadPhoto($uploadId,$id){
	if(isset($_FILES[$uploadId])){
		if($_FILES[$uploadId]['name'] != '')
		{
			$_SESSION[$uploadId] = $_FILES[$uploadId]["name"];
		}
		if(!file_exists("../images/frontPage/".$id)){
			mkdir("../images/frontPage/".$id);
		}
		if(!file_exists("../images/frontPage/".$id."/".$_FILES[$uploadId]["name"])){
			$tempFile = $_FILES[$uploadId]['tmp_name'];
			move_uploaded_file($_FILES[$uploadId]["tmp_name"], "../images/frontPage/".$id."/".$_FILES[$uploadId]["name"]);
			$_SESSION[$uploadId.'_location'] = "../images/frontPage/".$id."/".$_FILES[$uploadId]["name"];
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