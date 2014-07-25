<?php 

//check if deleteFrontPage has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf
if (empty( $_REQUEST['id']) && empty($_POST)) {
	header("location:voorpagina.php");
}
include "../_/components/administration/php-version/header.php";
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
			Item Verwijderen
		</li>
	</ul>
</div>
<?php
/*
 * 1. ask the user if he is ok with deleting this item by viewing some data
 * 2. if button yes is pressed -> delete the record & return to grid
 * 3. if button no is pressed  -> return to grid
 */
if(isset($_POST['yes']))
{
	include "../_/components/administration/php-version/actions/deleteFrontPage.action.php";
	include "../_/components/administration/php-version/frontPage_grid.php";
}else{
	if(isset($_POST['no'])){
		include "../_/components/administration/php-version/frontPage_grid.php";
	}else{
		getFrontPageItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/deleteFrontPage.form.php";
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
		$_SESSION['fp_image']				= $frontPage->image;
		$_SESSION['fp_image_pos']			= $frontPage->imagePos;
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
