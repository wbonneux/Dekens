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
			<a href="product.php">Produkt</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item toevoegen
		</li>
	</ul>
</div>
<?php 
if(isset($_POST['save']))
{
	include "../_/components/administration/php-version/actions/addProduct.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/product_grid.php";
	}else{
		$_SESSION['pc_active'] 				= null;
		$_SESSION['pc_title'] 				= null;
		$_SESSION['pc_description']			= null;
		$_SESSION['pc_image']				= null;
		$_SESSION['pc_category']				= null;
		$_SESSION['pc_image_location']	= null;
		include "../_/components/administration/php-version/forms/Product.form.php";
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
