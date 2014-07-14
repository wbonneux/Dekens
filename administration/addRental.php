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
			<a href="verhuur.php">Verhuur</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item toevoegen
		</li>
	</ul>
</div>
<?php 
if(isset($_POST['save']))
{
	include "../_/components/administration/php-version/actions/addRental.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/rental_grid.php";
	}else{
		$_SESSION['sh_id']	 				= null;
		$_SESSION['sh_active'] 				= null;
		$_SESSION['sh_title'] 				= null;
		$_SESSION['sh_price_day']			= null;
		$_SESSION['sh_price_weekend']		= null;
		$_SESSION['sh_price_week']			= null;
		$_SESSION['sh_description']			= null;
		$_SESSION['sh_image_1']				= null;
		$_SESSION['sh_image_1_location']	= null;
		$_SESSION['sh_image_2']				= null;
		$_SESSION['sh_image_2_location']	= null;
		$_SESSION['sh_image_3']				= null;
		$_SESSION['sh_image_3_location']	= null;
		$_SESSION['sh_image_4']				= null;
		$_SESSION['sh_image_4_location']	= null;
		$_SESSION['sh_image_5']				= null;
		$_SESSION['sh_image_5_location']	= null;
		include "../_/components/administration/php-version/forms/rental.form.php";
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
