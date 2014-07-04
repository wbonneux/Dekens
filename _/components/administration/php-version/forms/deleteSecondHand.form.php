<?php
	$secondHand = new SecondHand();
	$secondHandDAO = DAOFactory::getSecondHandDAO();
	$secondHand = $secondHandDAO->load($_REQUEST['id']);
?>

<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<div class="row">
		<div class="col-lg-6">
			<h3>
				Bent u zeker om volgend item te verwijderen?<br/>
				<?php
					echo $secondHand->title.'<br/>';
					echo "<img src='../images/secondHand/".$secondHand->id."/".$secondHand->image1."'>"
					
				?>
			</h3>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="clearfix"></div>
		<div class="form-group col-lg-12">
			<input type="hidden" value="<?php echo $_REQUEST['id']?>" id="sh_id" name="sh_id">
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
// $secondHand = new SecondHand();
// $secondHandDAO = DAOFactory::getSecondHandDAO();
// // $secondHand->title = "testing title";

// // $secondHand->id = $secondHandDAO->insert($secondHand);

// $secondHand->id = 1;
// $secondHand->title = "updated title";
// $secondHandDAO->update($secondHand);

// $secondHandList = array();
// $secondHandList = $secondHandDAO->queryAll();
// foreach ($secondHandList as $secondHandItem) {
// echo 'secondHand(id)'.$secondHandItem->id.'/'.$secondHandItem->title.'<br/>';
// }
?>