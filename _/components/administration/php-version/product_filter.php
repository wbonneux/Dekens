<?php
	if (isset($_POST['filter_category'])) {
		$_SESSION['filter_category'] = $_POST['filter_category'];
		//echo 'post-session: '.$_SESSION['filter_category'];
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

			<select class="form-control" id="filter_category" name="filter_category">
				<option value=''><?php echo $lang['SELECT_CATEGORY']; ?></option>
				<?php
				$categories = DAOFactory::getProductCategoryDAO()->queryAll();
				foreach ( $categories as $category ) {
					if (isset ( $_SESSION ['filter_category'] ) && $_SESSION ['filter_category'] === $category->id) {
						echo '<option selected value=' . $category->id . '>' . $category->titleNed . '</option>';
					} else {
						echo '<option value=' . $category->id . '>' . $category->titleNed . '</option>';
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