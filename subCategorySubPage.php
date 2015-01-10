<h1 class="page-header">
	<?php
		echo $subCategory->titleNed; 
	?>
</h1>
<div class="row">
	<div class="col-xs-12">
		<ol class="breadcrumb">
		  <li><a href="menu.php?section=<?php echo $section->id; ?>"><?php echo $section->titleNed; ?></a></li>
		  <li><a href="menu.php?section=<?php echo $section->id.'&category='.$category->id; ?>"><?php echo $category->titleNed; ?></a></li>
		  <li class="active"><?php echo $subCategory->titleNed; ?></li>
		</ol>
	</div>
</div>
<div class="col-lg-9">
	<div class="row">
	<?php 
		if(isset($subCategory->image) && ($subCategory->image != ''))
		{
			echo '<div class="col-lg-5 hidden-xs hidden-sm hidden-md">';
				echo '<div style="padding-left:0px">';
					echo '<img  class="img-responsive"  src="images/productCategory/'.$subCategory->id.'/'.$subCategory->image.'" alt="'.$subCategory->titleNed.'">';
				echo '</div>';
			echo '</div>';
			echo '<div class="col-lg-7">';
				echo $subCategory->descrNed;
			echo '</div>';
		}
		else
		{
			echo '<div class="col-lg-12">';
				echo $category->descrNed;
			echo '</div>';
		}
	?>
	</div>
	<br />
	<div class="row">
	<?php
		$prodxCats = DAOFactory::getProdXCategoryDAO ()->getActiveProdXCategoryByCategoryOrder ( $subCategory->id );
		foreach ( $prodxCats as $prodxCat ) {
			$product = DAOFactory::getProductDAO ()->load ( $prodxCat->product );
			if ($product->active) {
				echo '<div class="col-lg-3 col-xs-3" text-align="center">';
					echo '<div class="thumbnail">';
						echo '<a href="menu.php?section='.$section->id.'&category='.$category->id.'&subcategory='.$subCategory->id.'&product=' . $product->id . '"><img class="img-responsive"  src="images/product/' . $product->id . '/sm/' . $product->image . '" alt="' . $product->titleNed . '"></a>';
						echo '<div class="caption">';
							echo '<h5>'. $product->titleNed . '</h5>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		}
	?>
	</div>
</div>
<div class="col-lg-3 hidden-xs hidden-sm hidden-md">
	<?php
		include 'secondHandslider.php'; 
	?>
</div>