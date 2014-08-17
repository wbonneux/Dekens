<?php 

//check if deleteRental has a request parameter id
//if no -> back the fuck up!
//if so -> granted access mtf
if (empty( $_REQUEST['id']) && empty($_POST)) {
	header("location:2dehands.php");
}
include "../_/components/administration/php-version/header.php";
?>

<!-- content -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="index.php">Dashboard</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="2dehands.php">2dehands</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Item printen
		</li>
	</ul>
</div>
<?php
/*
 * 1. ask the user if he is ok with deleting this item by viewing some data
 * 2. if button yes is pressed -> delete the record & return to grid
 * 3. if button no is pressed  -> return to grid
 */
$secondHandDAO = DAOFactory::getSecondHandDAO();
$secondHand = $secondHandDAO->load($_REQUEST['id']);
include "../_/components/administration/php-version/actions/printSecondHand.action.php";
//include "../_/components/administration/php-version/secondHand_grid.php";
?>


<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
