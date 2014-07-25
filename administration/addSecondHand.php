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
			<a href="2dehands.php">2deHands</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item toevoegen
		</li>
	</ul>
</div>
<?php 
if(isset($_POST['save']))
{
	include "../_/components/administration/php-version/actions/addSecondHand.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/secondHand_grid.php";
	}else{
		$_SESSION['sh_active'] 				= null;
		$_SESSION['sh_sold'] 				= null;
		$_SESSION['sh_title'] 				= null;
		$_SESSION['sh_price']				= null;
		$_SESSION['sh_sizetirefront']		= null;
		$_SESSION['sh_sizetireback']		= null;
		$_SESSION['sh_hourswork']			= null;
		$_SESSION['sh_buildyear']			= null;
		$_SESSION['sh_description']			= null;
		$_SESSION['sh_image_1']				= null;
		$_SESSION['sh_image_1_location']	= null;
		$_SESSION['sh_image_2']				= null;
		$_SESSION['sh_image_3']				= null;
		$_SESSION['sh_image_4']				= null;
		$_SESSION['sh_image_5']				= null;
// 		echo ini_get('max_file_uploads').'<br>';
// 		echo ini_get('upload_max_filesize').'<br>';
		include "../_/components/administration/php-version/forms/secondHand.form.php";
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
