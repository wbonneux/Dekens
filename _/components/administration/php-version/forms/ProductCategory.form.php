<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
	enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-1">
			<div class="form-group">
		                <?php
																		check_label ( 'lbl_active', $required, $errors, $lang );
																		?>
		                  <input type="checkbox" name="pc_active"
					class="form-control" id="pc_active"
					<?php if(isset($_SESSION['pc_active'])){if($_SESSION['pc_active'] == 1){echo 'checked';}else{echo '';}}else{echo '';}?>>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="form-group">
		                <?php
																		check_label ( 'lbl_parent', $required, $errors, $lang );
																		?>
		                 
					
					<select class="form-control" id="pc_parent" name="pc_parent">
					<option value='0'><?php echo $lang['SELECT_PARENT']; ?></option>
				<?php
				$parentCategories = DAOFactory::getProductCategoryDAO()->getActiveProductCategoryOrderByTitle();
				echo 'testing: '.$_SESSION ['pc_parent'] ;
				foreach ( $parentCategories as $parent) {
					if (isset ( $_SESSION ['pc_parent'] ) & $_SESSION ['pc_parent'] == $parent->id) {
						echo '<option selected value=' . $parent->id . '>' . $parent->titleNed . '</option>';
					} else {
						if (isset($_REQUEST['id']) && $_REQUEST['id'] == $parent->id) {
							//nothing
						}else{
							echo '<option value=' . $parent->id . '>' . $parent->titleNed . '</option>';
						}
					}
				}
				?>			
			</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9">
			<div class="form-group">
		                <?php
																		check_label ( 'lbl_menu', $required, $errors, $lang );
																		?>
		                 
					
					<select class="form-control" id="pc_menu" name="pc_menu">
					<option value='0'><?php echo $lang['SELECT_MENU']; ?></option>
				<?php
				$menuArr = DAOFactory::getProductSectionDAO()->getAllProductSectionOrderByTitle();
				foreach ( $menuArr as $menu) {
					if (isset ( $_SESSION ['pc_menu'] ) & $_SESSION ['pc_menu'] == $menu->id) {
						echo '<option selected value=' . $menu->id . '>' . $menu->titleNed . '</option>';
					} else {
						if (isset($_REQUEST['id']) && $_REQUEST['id'] == $menu->id) {
							//nothing
						}else{
							echo '<option value=' . $menu->id . '>' . $menu->titleNed . '</option>';
						}
					}
				}
				?>			
			</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9">
			<div class="form-group">
		                <?php
																		check_label ( 'lbl_title', $required, $errors, $lang );
																		?>
		                  <input type="text" name="pc_title"
					class="form-control" id="pc_title"
					value="<?php if(isset($_SESSION['pc_title'])){echo $_SESSION['pc_title'];}?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-11">
			<div class="form-group">
		              	<?php
																	check_label ( 'lbl_description', $required, $errors, $lang );
																	?>
		                  <textarea name="pc_description" class="form-control"
					rows="15" id="pc_description"><?php if(isset($_SESSION['pc_description'])){echo $_SESSION['pc_description'];}?></textarea>
					            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'pc_description',{
                    height:400
                } );
            </script>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<label for="pc_image"><?php echo $lang['lbl_image']; ?></label> <input
				type="file" name="pc_image" id="pc_image" class="form-control"><br>
		</div>
		<!-- todo: transform into select box -->

		<div class="col-lg-4"></div>
	</div>
	
	<?php
	if (isset ( $_SESSION ['pc_image_location'] )) {
		echo '<br/><div class="row">';
		echo '<div class="col-lg-3">';
		if (isset ( $_SESSION ['pc_image_location'] )) {
			echo '<img src="' . $_SESSION ['pc_image_location'] . '" height="100px">';
		}
		echo '</div>';
		echo '</div><br/>';
	}
	?>
	<br />
	<div class="row">
		<div class="clearfix"></div>
		<div class="form-group col-lg-12">
			<input type="hidden"
				value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];}?>"
				id="pc_id" name="pc_id">
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