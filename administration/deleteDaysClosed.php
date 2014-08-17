<?php 

//check if deleteFrontPage has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf
if (empty( $_REQUEST['id']) && empty($_POST)) {
	header("location:daysClosed.php");
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
			<a href="index.php">Dashboard </a><span class="divider">/ </span>
		</li>
		<li>
			<a href="index.php">Beschikbaarheid</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="daysClosed.php">Dagen open</a> <span class="divider">/</span>
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
	include "../_/components/administration/php-version/actions/deleteDaysClosed.action.php";
	include "../_/components/administration/php-version/daysClosed_grid.php";
}else{
	if(isset($_POST['no'])){
		include "../_/components/administration/php-version/daysClosed_grid.php";
	}else{
		getItem($_REQUEST['id']);
		include "../_/components/administration/php-version/forms/deleteDaysClosed.form.php";
	}
	
}

function getItem($id){
	$object = new AvDaysClosed();
	$objDAO = DAOFactory::getDaysClosedDAO();
	$object = $objDAO->load($id);
	if(isset($object)){
		$ses_id = session_id();
		$_SESSION['obj_active'] 			= $object->active;	
		$_SESSION['obj_day'] 				= $object->day;
	}
}
?>



<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
