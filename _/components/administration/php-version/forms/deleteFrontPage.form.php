<?php
	$frontPage = new ContentFrontPage();
	$frontPageDAO = DAOFactory::getContentFrontPageDAO();
	$frontPage = $frontPageDAO->load($_REQUEST['id']);
?>

<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<div class="row">
		<div class="col-lg-6">
			<h3>
				Bent u zeker om volgend item te verwijderen?<br/>
				<?php
					echo $frontPage->title.'<br/>';
					if(isset($frontPage->image) && $frontPage->image != ''){
						echo "<img src='../images/frontPage/".$frontPage->id."/".$frontPage->image."'>";
					}
					
				?>
			</h3>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="clearfix"></div>
		<div class="form-group col-lg-12">
			<input type="hidden" value="<?php echo $_REQUEST['id']?>" id="fp_id" name="fp_id">
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
// $frontPage = new FrontPage();
// $frontPageDAO = DAOFactory::getFrontPageDAO();
// // $frontPage->title = "testing title";

// // $frontPage->id = $frontPageDAO->insert($frontPage);

// $frontPage->id = 1;
// $frontPage->title = "updated title";
// $frontPageDAO->update($frontPage);

// $frontPageList = array();
// $frontPageList = $frontPageDAO->queryAll();
// foreach ($frontPageList as $frontPageItem) {
// echo 'frontPage(id)'.$frontPageItem->id.'/'.$frontPageItem->title.'<br/>';
// }
?>