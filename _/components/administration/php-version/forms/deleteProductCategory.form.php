<?php
	$productCategory = new ProductCategory();
	$productCategoryDAO = DAOFactory::getProductCategoryDAO();
	$productCategory = $productCategoryDAO->load($_REQUEST['id']);
?>

<form method="POST"
	action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<div class="row">
		<div class="col-lg-6">
			<h3>
				Bent u zeker om volgend item te verwijderen?<br/>
				<?php
					echo $productCategory->titleNed.'<br/>';
					if(isset($productCategory->image) && $productCategory->image != ''){
						echo "<img src='../images/productCategory/".$productCategory->id."/".$productCategory->image."'>";
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
// $productCategory = new FrontPage();
// $productCategoryDAO = DAOFactory::getFrontPageDAO();
// // $productCategory->title = "testing title";

// // $productCategory->id = $productCategoryDAO->insert($productCategory);

// $productCategory->id = 1;
// $productCategory->title = "updated title";
// $productCategoryDAO->update($productCategory);

// $productCategoryList = array();
// $productCategoryList = $productCategoryDAO->queryAll();
// foreach ($productCategoryList as $productCategoryItem) {
// echo 'productCategory(id)'.$productCategoryItem->id.'/'.$productCategoryItem->title.'<br/>';
// }
?>