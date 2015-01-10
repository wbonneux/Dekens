<?php 
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
			<a href="Category.php">Category</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item toevoegen
		</li>
	</ul>
</div>
<?php 
if(isset($_POST['save']))
{
	include "../_/components/administration/php-version/actions/addProductCategory.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/productCategory_grid.php";
	}else{
		$_SESSION['pc_active'] 				= null;
		$_SESSION['pc_parent'] 				= null;
		$_SESSION['pc_section'] 				= null;
		$_SESSION['pc_title'] 				= null;
		$_SESSION['pc_description']			= null;
		$_SESSION['pc_image']				= null;
		$_SESSION['pc_image_location']	= null;
		include "../_/components/administration/php-version/forms/ProductCategory.form.php";
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
