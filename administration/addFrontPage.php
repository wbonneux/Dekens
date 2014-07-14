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
			<a href="voorpagina.php">Voorpagina</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item toevoegen
		</li>
	</ul>
</div>
<?php 
if(isset($_POST['save']))
{
	include "../_/components/administration/php-version/actions/addFrontPage.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/frontPage_grid.php";
	}else{
		$_SESSION['fp_active'] 				= null;
		$_SESSION['fp_title'] 				= null;
		$_SESSION['fp_description']			= null;
		$_SESSION['fp_image']				= null;
		$_SESSION['fp_image_pos']			= null;
		$_SESSION['fp_image_location']	= null;
		include "../_/components/administration/php-version/forms/frontPage.form.php";
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
