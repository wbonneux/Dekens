<?php 
include "../_/components/administration/php-version/header.php"; 
?>

<!-- content -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="index.php">Dashboard</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Produkt
		</li>
	</ul>
</div>
<?php include "../_/components/administration/php-version/product_filter.php"; ?>

<?php
	if (isset($_SESSION['filter_category']) && $_SESSION['filter_category'] != '') {
		include "../_/components/administration/php-version/product_grid_filtered.php";		
	}else{
		include "../_/components/administration/php-version/product_grid.php";
	}

 ?>

<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
