<?php 

//check if deleteRental has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf
if (empty( $_REQUEST['id'])) {
	header("location:verhuur.php");
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
			<a href="verhuur.php">Verhuur</a> <span class="divider">/</span>
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
	include "../_/components/administration/php-version/actions/deleteRental.action.php";
	include "../_/components/administration/php-version/rental_grid.php";
}else{
	if(isset($_POST['no'])){
		include "../_/components/administration/php-version/rental_grid.php";
	}else{
		getRentalItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/deleteRental.form.php";
	}
	
}

function getRentalItem($id){
	$rental = new Rental();
	$rentalDAO = DAOFactory::getRentalDAO();
	$rental = $rentalDAO->load($id);
	if(isset($rental)){
		$ses_id = session_id();
		$_SESSION['sh_active'] 				= $rental->active;
		$_SESSION['sh_title'] 				= $rental->title;
		$_SESSION['sh_price_day']			= $rental->priceDay;
		$_SESSION['sh_price_weekend']		= $rental->priceWeekend;
		$_SESSION['sh_price_week']			= $rental->priceWeek;
		$_SESSION['sh_description']			= $rental->description;
		$_SESSION['sh_image_1']				= $rental->image1;
		$_SESSION['sh_image_1_location']	= '../images/rental/'.$rental->id.'/'.$rental->image1;
		$_SESSION['sh_image_2']				= $rental->image2;
		$_SESSION['sh_image_2_location']	= '../images/rental/'.$rental->id.'/'.$rental->image2;
		$_SESSION['sh_image_3']				= $rental->image3;
		$_SESSION['sh_image_3_location']	= '../images/rental/'.$rental->id.'/'.$rental->image3;
		$_SESSION['sh_image_4']				= $rental->image4;
		$_SESSION['sh_image_4_location']	= '../images/rental/'.$rental->id.'/'.$rental->image4;
		$_SESSION['sh_image_5']				= $rental->image5;
		$_SESSION['sh_image_5_location']	= '../images/rental/'.$rental->id.'/'.$rental->image5;
	}
}
?>


<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
