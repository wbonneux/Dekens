<?php 
//check if editFrontPage has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf

if (!isset( $_REQUEST['id']) && !isset($_POST['save'])) {
	header("location:voorpagina.php");
}else{
	include "../_/components/administration/php-version/header.php";
	if(!isset($_POST['save'])){
		$_SESSION['fp_id'] = $_REQUEST['id'];
	}else{
		
	}
	//echo $_SESSION['sh_id'];
}

$required = null;
$errors = null;
include_once '../_/components/lang/lang.nl.php';
require_once '../_/components/classes/FormValidator.class.php'; 
?>

<!-- content -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="index.php">Dashboard</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="voorpagina.php">Voorpagina</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item bijwerken
		</li>
	</ul>
</div>
<?php
/*
 * 1. get the data from the ID for the first time and place in session vars
 * 2. if form is valid -> saved update the record with the post data
 * 3. if form is not valid -> view the session vars in the form
 * 4. if form is cancelled -> go to the grid
 */

if(isset($_POST['save']))
{
	
	
	include "../_/components/administration/php-version/actions/editFrontPage.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/frontPage_grid.php";
	}else{
		getFrontPageItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/frontPage.form.php";
	}
	
}

function getFrontPageItem($id){
	$frontPage = new ContentFrontPage();
	$frontPageDAO = DAOFactory::getContentFrontPageDAO();
	$frontPage = $frontPageDAO->load($id);
	if(isset($frontPage)){
		$ses_id = session_id();
		$_SESSION['fp_active'] 				= $frontPage->active;
		$_SESSION['fp_title'] 				= $frontPage->title;
		$_SESSION['fp_description']			= $frontPage->description;
		$_SESSION['fp_image_pos']			= $frontPage->imagePos;
		if($frontPage->image != ''){
			$_SESSION['fp_image']				= $frontPage->image;
			$_SESSION['fp_image_location']	= '../images/frontPage/'.$frontPage->id.'/'.$frontPage->image;
		}
		
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
