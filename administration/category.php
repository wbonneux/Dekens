<?php include "../_/components/administration/php-version/header.php"; ?>

<!-- content -->
<div>
	<ul class="breadcrumb">
		<li>
			<a href="index.php">Dashboard</a> <span class="divider">/</span>
		</li>
		<li class="active">
			Categorie/Merk
		</li>
	</ul>
</div>
<?php include "../_/components/administration/php-version/category_filter_section.php"; ?>
<?php 
// include "../_/components/administration/php-version/category_filter_parent.php"; ?>


<?php
	if (isset($_SESSION['filter_section']) && $_SESSION['filter_section'] != '') {
		include "../_/components/administration/php-version/category_grid_filtered_section.php";		
	}
	elseif(isset($_SESSION['filter_parent']) && $_SESSION['filter_parent'] != '')
	{
		include "../_/components/administration/php-version/category_grid_filtered_parent.php";
	}else 
	{
		include "../_/components/administration/php-version/category_grid.php";
	}

 ?>


<!-- end content -->
<?php include "../_/components/administration/php-version/footer.php"; ?>
