<?php 

//check if deleteSecondHand has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf
if (empty( $_REQUEST['id']) && empty($_POST)) {
	header("location:2dehands.php");
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
			<a href="2dehands.php">2deHands</a> <span class="divider">/</span>
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
	include "../_/components/administration/php-version/actions/deleteSecondHand.action.php";
	include "../_/components/administration/php-version/secondHand_grid.php";
}else{
	if(isset($_POST['no'])){
		include "../_/components/administration/php-version/secondHand_grid.php";
	}else{
		getSecondHandItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/deleteSecondHand.form.php";
	}
	
}

function getSecondHandItem($id){
	$secondHand = new SecondHand();
	$secondHandDAO = DAOFactory::getSecondHandDAO();
	$secondHand = $secondHandDAO->load($id);
	if(isset($secondHand)){
		$ses_id = session_id();
		$_SESSION['sh_active'] 				= $secondHand->active;
		$_SESSION['sh_sold'] 				= $secondHand->sold;
		$_SESSION['sh_title'] 				= $secondHand->title;
		$_SESSION['sh_price']				= $secondHand->price;
		$_SESSION['sh_sizetirefront']		= $secondHand->sizeTireFront;
		$_SESSION['sh_sizetireback']		= $secondHand->sizeTireBack;
		$_SESSION['sh_hourswork']			= $secondHand->hoursWork;
		$_SESSION['sh_buildyear']			= $secondHand->buildYear;
		$_SESSION['sh_description']			= $secondHand->description;
		$_SESSION['sh_image_1']				= $secondHand->image1;
		$_SESSION['sh_image_1_location']	= '../images/secondHand/'.$secondHand->id.'/'.$secondHand->image1;
		$_SESSION['sh_image_2']				= $secondHand->image2;
		$_SESSION['sh_image_2_location']	= '../images/secondHand/'.$secondHand->id.'/'.$secondHand->image2;
		$_SESSION['sh_image_3']				= $secondHand->image3;
		$_SESSION['sh_image_3_location']	= '../images/secondHand/'.$secondHand->id.'/'.$secondHand->image3;
		$_SESSION['sh_image_4']				= $secondHand->image4;
		$_SESSION['sh_image_4_location']	= '../images/secondHand/'.$secondHand->id.'/'.$secondHand->image4;
		$_SESSION['sh_image_5']				= $secondHand->image5;
		$_SESSION['sh_image_5_location']	= '../images/secondHand/'.$secondHand->id.'/'.$secondHand->image5;
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
