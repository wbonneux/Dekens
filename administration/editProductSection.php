<?php 
//check if editFrontPage has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf

if (!isset( $_REQUEST['id']) && !isset($_POST['save'])) {
	header("location:section.php");
}else{
	include "../_/components/administration/php-version/header.php";
	if(!isset($_POST['save'])){
		$_SESSION['pc_id'] = $_REQUEST['id'];
	}else{
		
	}
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
			<a href="section.php">Menu</a> <span class="divider">/</span>
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
	
	
	include "../_/components/administration/php-version/actions/editProductSection.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/section_grid.php";
	}else{
		getItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/ProductSection.form.php";
	}
	
}

function getItem($id){
	$object = new ProductCategory();
	$DAO = DAOFactory::getProductSectionDAO();
	$object = $DAO->load($id);
	if(isset($object)){
		$ses_id = session_id();
		$_SESSION['pc_active'] 				= $object->active;
		$_SESSION['pc_title'] 				= $object->titleNed;
		$_SESSION['pc_description']			= $object->descrNed;
		if($object->image != ''){
			$_SESSION['pc_image']				= $object->image;
			$_SESSION['pc_image_location']	= '../images/productSection/'.$object->id.'/'.$object->image;
		}
		
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
