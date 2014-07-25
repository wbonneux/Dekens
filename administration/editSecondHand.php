<?php 
//check if editSecondHand has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf

if (!isset( $_REQUEST['id']) && !isset($_POST['save'])) {
	header("location:2deHands.php");
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
			<a href="2dehands.php">2deHands</a> <span class="divider">/</span>
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
	
	
	include "../_/components/administration/php-version/actions/editSecondHand.action.php";
}else{
	if(isset($_POST['cancel'])){
		include "../_/components/administration/php-version/secondHand_grid.php";
	}else{
		getSecondHandItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/secondHand.form.php";
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
		if($secondHand->image1 != ''){
			$_SESSION['sh_image_1']				= $secondHand->image1;
			$_SESSION['sh_image_1_location']	= '../images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image1;
		}
		if($secondHand->image2 != ''){
			$_SESSION['sh_image_2']				= $secondHand->image2;
			$_SESSION['sh_image_2_location']	= '../images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image2;
		}
		if($secondHand->image3 != ''){
			$_SESSION['sh_image_3']				= $secondHand->image3;
			$_SESSION['sh_image_3_location']	= '../images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image3;
		}
		if($secondHand->image4 != ''){
			$_SESSION['sh_image_4']				= $secondHand->image4;
			$_SESSION['sh_image_4_location']	= '../images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image4;
		}
		if($secondHand->image5 != ''){
			$_SESSION['sh_image_5']				= $secondHand->image5;
			$_SESSION['sh_image_5_location']	= '../images/secondHand/'.$secondHand->id.'/sm/'.$secondHand->image5;
		}
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
