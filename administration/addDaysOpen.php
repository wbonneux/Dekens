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
			<a href="index.php">Beschikbaarheid</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="daysOpen.php">Uitzonderlijk open</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item toevoegen
		</li>
	</ul>
</div>
<?php 
if(isset($_POST['save']))
{
	include "../_/components/administration/php-version/actions/addDaysOpen.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/daysOpen_grid.php";
	}else{
		$_SESSION['obj_active'] 			= null;
		$_SESSION['obj_day'] 				= null;
		include "../_/components/administration/php-version/forms/daysOpen.form.php";
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
