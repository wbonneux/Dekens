<?php
// echo 'form<br>';
// echo 'session info'.$_SESSION['obj_information']; 
?>
<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
	enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-1">
			<div class="form-group">
		                <?php
						check_label ( 'obj_active', $required, $errors, $lang );
						?>
		                  <input type="checkbox" name="obj_active"
					class="form-control" id="obj_active"
					<?php if(isset($_SESSION['obj_active'])){if($_SESSION['obj_active'] == 1){echo 'checked';}else{echo '';}}else{echo '';}?>>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10">
			<div class="form-group">
		                <?php
							check_label ( 'obj_information', $required, $errors, $lang );
							?>
		                   <textarea name="obj_information" class="form-control" style="width: 100%"
					rows="10" id="obj_information"><?php if(isset($_SESSION['obj_information'])){echo $_SESSION['obj_information'];}?></textarea>
			</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="clearfix"></div>
		<div class="form-group col-lg-12">
			<button type="submit" name="save" class="btn btn-primary">Verzenden</button>
			<button type="submit" name="cancel" class="btn btn-primary">Annuleren</button>
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