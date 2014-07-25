<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-1">
			<div class="form-group">
		                <?php
							check_label ( 'sh_active', $required, $errors, $lang );
						?>
		                  <input type="checkbox" name="sh_active"
					class="form-control" id="sh_active" 
					<?php if(isset($_SESSION['sh_active'])){if($_SESSION['sh_active'] == 1){echo 'checked';}else{echo '';}}else{echo '';}?>>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
		                <?php
							check_label ( 'sh_title', $required, $errors, $lang );
						?>
		                  <input type="text" name="sh_title"
					class="form-control" id="sh_title"
					value="<?php if(isset($_SESSION['sh_title'])){echo $_SESSION['sh_title'];}?>">
			</div>
		</div>
	</div>
	<div class="row">
		
		<div class="col-lg-2">
			<div class="form-group">
		                <?php
							check_label ( 'sh_price_day', $required, $errors, $lang );
						?>
		                  <input type="text" name="sh_price_day"
					class="form-control" id="sh_price_day"
					value="<?php if(isset($_SESSION['sh_price_day'])){echo $_SESSION['sh_price_day'];}?>">
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
		                <?php
							check_label ( 'sh_price_weekend', $required, $errors, $lang );
						?>
		                  <input type="text" name="sh_price_weekend"
					class="form-control" id="sh_price_weekend"
					value="<?php if(isset($_SESSION['sh_price_weekend'])){echo $_SESSION['sh_price_weekend'];}?>">
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
		                <?php
							check_label ( 'sh_price_week', $required, $errors, $lang );
						?>
		                  <input type="text" name="sh_price_week"
					class="form-control" id="sh_price_week"
					value="<?php if(isset($_SESSION['sh_price_week'])){echo $_SESSION['sh_price_week'];}?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="form-group">
		              	<?php
							check_label ( 'sh_description', $required, $errors, $lang );
					  	?>
		                  <textarea name="sh_description" class="form-control" style="width: 100%"
					rows="10" id="sh_description"><?php if(isset($_SESSION['sh_description'])){echo $_SESSION['sh_description'];}?></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
				<label for="sh_image_1"><?php echo $lang['sh_image_1']; ?></label>
				<input type="file" name="sh_image_1" id="sh_image_1" class="form-control"><br>
		</div>
		<div class="col-lg-3">
				<label for="sh_image_2"><?php echo $lang['sh_image_2']; ?></label>
				<input type="file" name="sh_image_2" id="sh_image_2" class="form-control"><br>
		</div>
		<div class="col-lg-3">
				<label for="sh_image_3"><?php echo $lang['sh_image_3']; ?></label>
				<input type="file" name="sh_image_3" id="sh_image_3" class="form-control"><br>
		</div>
	</div>
	
	<?php
	if(isset($_SESSION['sh_image_1_location']) || isset($_SESSION['sh_image_2_location']) || isset($_SESSION['sh_image_3_location'])){
		echo '<br/><div class="row">';
			echo '<div class="col-lg-3">';
				if(isset($_SESSION['sh_image_1_location'])){
					echo '<img src="'.$_SESSION['sh_image_1_location'].'" height="100px">';
				}
			echo '</div>';
			echo '<div class="col-lg-3">';
				if(isset($_SESSION['sh_image_2_location'])&&$_SESSION['sh_image_2_location'] != ""){
					echo '<img src="'.$_SESSION['sh_image_2_location'].'" height="100px">';
				}
			echo '</div>';
			echo '<div class="col-lg-3">';
				if(isset($_SESSION['sh_image_3_location'])){
					echo '<img src="'.$_SESSION['sh_image_3_location'].'" height="100px">';
				}
			echo '</div>';
		echo '</div><br/>';
	} 
	?>
	<div class="row">
		<div class="col-lg-3">
			<label for="sh_image_4"><?php echo $lang['sh_image_4']; ?></label>
			<input type="file" name="sh_image_4" id="sh_image_4" class="form-control"><br>
		</div>
		<div class="col-lg-3">
			<label for="sh_image_5"><?php echo $lang['sh_image_5']; ?></label>
			<input type="file" name="sh_image_5" id="sh_image_5" class="form-control"><br>
		</div>
	</div>
	<?php
	if(isset($_SESSION['sh_image_4_location']) || isset($_SESSION['sh_image_5_location'])){
		echo '<br/><div class="row">';
			echo '<div class="col-lg-3">';
				if(isset($_SESSION['sh_image_4_location'])){
					echo '<img src="'.$_SESSION['sh_image_4_location'].'" height="100px">';
				}
			echo '</div>';
			echo '<div class="col-lg-3">';
				if(isset($_SESSION['sh_image_5_location'])){
					echo '<img src="'.$_SESSION['sh_image_5_location'].'" height="100px">';
				}
			echo '</div>';
		echo '</div>';
	} 
	?>
	<br/>
	<div class="row">
		<div class="clearfix"></div>
		<div class="form-group col-lg-12">
			<input type="hidden" value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];}?>" id="sh_id" name="sh_id">
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