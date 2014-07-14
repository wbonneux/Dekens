<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-1">
			<div class="form-group">
		                <?php
							check_label ( 'fp_active', $required, $errors, $lang );
						?>
		                  <input type="checkbox" name="fp_active"
					class="form-control" id="fp_active" 
					<?php if(isset($_SESSION['fp_active'])){if($_SESSION['fp_active'] == 1){echo 'checked';}else{echo '';}}else{echo '';}?>>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
		                <?php
							check_label ( 'fp_title', $required, $errors, $lang );
						?>
		                  <input type="text" name="fp_title"
					class="form-control" id="fp_title"
					value="<?php if(isset($_SESSION['fp_title'])){echo $_SESSION['fp_title'];}?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
		              	<?php
							check_label ( 'fp_description', $required, $errors, $lang );
					  	?>
		                  <textarea name="fp_description" class="form-control" style="width: 100%"
					rows="10" id="fp_description"><?php if(isset($_SESSION['fp_description'])){echo $_SESSION['fp_description'];}?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
				<label for="fp_image"><?php echo $lang['fp_image']; ?></label>
				<input type="file" name="fp_image" id="fp_image" class="form-control"><br>
		</div>
		<!-- todo: transform into select box -->
		<div class="col-lg-6">
			<div class="form-group">
		                <?php
							check_label ( 'fp_image_pos', $required, $errors, $lang );
						?>
		                  <input type="text" name="fp_image_pos"
					class="form-control" id="fp_image_pos"
					value="<?php if(isset($_SESSION['fp_image_pos'])){echo $_SESSION['fp_image_pos'];}?>">
			</div>
		</div>
	</div>
	
	<?php
	if(isset($_SESSION['fp_image_location'])){
		echo '<br/><div class="row">';
			echo '<div class="col-lg-3">';
				if(isset($_SESSION['fp_image_location'])){
					echo '<img src="'.$_SESSION['fp_image_location'].'" height="100px">';
				}
			echo '</div>';
		echo '</div><br/>';
	} 
	?>
	<br/>
	<div class="row">
		<div class="clearfix"></div>
		<div class="form-group col-lg-12">
			<input type="hidden" value="<?php if(isset($_REQUEST['id'])){$_REQUEST['id'];}?>" id="fp_id" name="fp_id">
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