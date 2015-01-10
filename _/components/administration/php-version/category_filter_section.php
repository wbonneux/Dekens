<?php
	if (isset($_POST['filter_section'])) {
		$_SESSION['filter_section'] = $_POST['filter_section'];
		//echo 'post-session: '.$_SESSION['filter_section'];
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

			<select class="form-control" id="filter_section" name="filter_section">
				<option value=''><?php echo $lang['SELECT_MENU']; ?></option>
				<?php
				$sections = DAOFactory::getProductSectionDAO()->getAllProductSectionOrderByTitle();
				foreach ( $sections as $section ) {
					if (isset ( $_SESSION ['filter_section'] ) && $_SESSION ['filter_section'] === $section->id) {
						echo '<option selected value=' . $section->id . '>' . $section->titleNed . '</option>';
					} else {
						echo '<option value=' . $section->id . '>' . $section->titleNed . '</option>';
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