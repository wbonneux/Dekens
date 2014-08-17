<?php
	$obj = new AvDaysOpen();
	$objDAO = DAOFactory::getDaysOpenedDAO();
	$obj = $objDAO->load($_REQUEST['id']);
?>

<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<div class="row">
		<div class="col-lg-6">
			<h3>
				Bent u zeker om volgend item te verwijderen?<br/>
				<?php
					echo $obj->day.'<br/>';
				?>
			</h3>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="clearfix"></div>
		<div class="form-group col-lg-12">
			<input type="hidden" value="<?php echo $_REQUEST['id']?>" id="obj_id" name="obj_id">
			<button type="submit" name="yes" class="btn btn-warning">Ja</button>
			<button type="submit" name="no" class="btn btn-primary">Nee</button>
		</div>
	</div>
</form>
<?php
function check_label($field, $required, $errors, $lang) {
	if (isset ( $required [$field] ) || isset ( $errors [$field] )) {
		echo '<label style="color:red" for="input1">' . $lang [$field] . '</label>';
	} else {
		echo '<label for="input1">' . $lang [$field] . '</label>';
	}
}

?>






 <?php
// require_once 'include_dao.php';
// error_reporting(0);
// $obj = new FrontPage();
// $objDAO = DAOFactory::getFrontPageDAO();
// // $obj->title = "testing title";

// // $obj->id = $objDAO->insert($obj);

// $obj->id = 1;
// $obj->title = "updated title";
// $objDAO->update($obj);

// $objList = array();
// $objList = $objDAO->queryAll();
// foreach ($objList as $objItem) {
// echo 'frontPage(id)'.$objItem->id.'/'.$objItem->title.'<br/>';
// }
?>