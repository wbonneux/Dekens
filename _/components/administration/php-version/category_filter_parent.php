<?php
	if (isset($_POST['filter_parent'])) {
		$_SESSION['filter_parent'] = $_POST['filter_parent'];
		//echo 'post-session: '.$_SESSION['filter_parent'];
	}
?>
<form role="form" method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="row">
		<div class="form-group col-sm-5">
			<?php
				//echo '<label for="input1">'.$lang['lbl_select_category'].'</label>';
			?>
			<!-- 		<input type="text" name="contact_name" class="form-control" -->
			<!-- 			id="input1"> -->

			<select class="form-control" id="filter_parent" name="filter_parent">
				<option value=''><?php echo $lang['SELECT_PARENT']; ?></option>
				<?php
				$parents = DAOFactory::getProductCategoryDAO()->getAllProductCategoryParents();
				foreach ( $parents as $parent ) {
					if (isset ( $_SESSION ['filter_parent'] ) && $_SESSION ['filter_parent'] === $parent->id) {
						echo '<option selected value=' . $parent->id . '>' . $parent->titleNed . '</option>';
					} else {
						echo '<option value=' . $parent->id . '>' . $parent->titleNed . '</option>';
					}
				}
				?>			
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<button type="submit" name="save" class="btn btn-primary">Filter</button>
		</div>
	</div>
</form>