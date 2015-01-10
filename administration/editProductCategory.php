<?php 
//check if editFrontPage has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf

if (!isset( $_REQUEST['id']) && !isset($_POST['save'])) {
	header("location:category.php");
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
			<a href="category.php">Category</a> <span class="divider">/</span>
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
	include "../_/components/administration/php-version/actions/editProductCategory.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/ProductCategory_grid.php";
	}else{
		getItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/ProductCategory.form.php";
	}
	
}

function getItem($id){
$_SESSION['pc_id']	 				= null;
$_SESSION['pc_active'] 				= null;
$_SESSION['pc_title'] 				= null;
$_SESSION['pc_menu'] 				= null;
$_SESSION['pc_parent'] 				= null;
$_SESSION['pc_description']			= null;
$_SESSION['pc_image']				= null;
$_SESSION['pc_image_location']		= null;
	$object = new ProductCategory();
	$DAO = DAOFactory::getProductCategoryDAO();
	$object = $DAO->load($id);
	$object2 = DAOFactory::getProdXSectionDAO()->getProdXSectionByCategory($id);
	
	if(isset($object)){
		$ses_id = session_id();
		$_SESSION['pc_active'] 				= $object->active;
		$_SESSION['pc_parent'] 				= $object->parent;
		if(isset($object2) && isset($object2[0]->section))
		{
			$_SESSION['pc_menu']			= $object2[0]->section;
		}else 
		{
			$_SESSION['pc_menu']			= null;
		}
		
		$_SESSION['pc_title'] 				= $object->titleNed;
		$_SESSION['pc_description']			= $object->descrNed;
		if($object->image != ''){
			$_SESSION['pc_image']				= $object->image;
			$_SESSION['pc_image_location']	= '../images/productCategory/'.$object->id.'/'.$object->image;
		}
		
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
