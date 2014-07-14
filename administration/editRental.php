<?php 
//check if editRental has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf

if (!isset( $_REQUEST['id']) && !isset($_POST['save'])) {
	header("location:verhuur.php");
}else{
	include "../_/components/administration/php-version/header.php";
	if(!isset($_POST['save'])){
	$_SESSION['sh_id'] = $_REQUEST['id'];
	}else{
		
	}
	//echo $_SESSION['sh_id'];
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
			<a href="verhuur.php">Verhuur</a> <span class="divider">/</span>
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
	//echo 'save';
	include "../_/components/administration/php-version/actions/editRental.action.php";
}else{
	if(isset($_POST['cancel'])){
		//echo 'cancel';
		include "../_/components/administration/php-version/rental_grid.php";
	}else{
		//echo 'no save or cancel';
		getRentalItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/rental.form.php";
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
		if($rental->image1 != ''){
			$_SESSION['sh_image_1']				= $rental->image1;
			$_SESSION['sh_image_1_location']	= '../images/rental/'.$rental->id.'/'.$rental->image1;
		}
		if($rental->image2 != ''){
			$_SESSION['sh_image_2']				= $rental->image2;
			$_SESSION['sh_image_2_location']	= '../images/rental/'.$rental->id.'/'.$rental->image2;
		}
		if($rental->image3 != ''){
			$_SESSION['sh_image_3']				= $rental->image3;
			$_SESSION['sh_image_3_location']	= '../images/rental/'.$rental->id.'/'.$rental->image3;
		}
		if($rental->image4 != ''){
			$_SESSION['sh_image_4']				= $rental->image4;
			$_SESSION['sh_image_4_location']	= '../images/rental/'.$rental->id.'/'.$rental->image4;
		}
		if($rental->image5 != ''){
			$_SESSION['sh_image_5']				= $rental->image5;
			$_SESSION['sh_image_5_location']	= '../images/rental/'.$rental->id.'/'.$rental->image5;
		}
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
