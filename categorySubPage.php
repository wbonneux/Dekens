<h1 class="page-header">
	<?php
// 		echo $category->id;
		echo $category->titleNed; 
	?>
</h1>
<div class="row">
	<div class="col-xs-12">
		<ol class="breadcrumb">
		  <li><a href="menu.php?section=<?php echo $section->id; ?>"><?php echo $section->titleNed; ?></a></li>
		  <li class="active"><?php echo $category->titleNed; ?></li>
		</ol>
	</div>
</div>
<div class="col-lg-9">
	<div class="row">
	<?php 
		if(isset($category->image) && ($category->image != ''))
		{
			echo '<div class="col-lg-5 hidden-xs hidden-sm hidden-md">';
				echo '<div style="padding-left:0px">';
					echo '<img  class="img-responsive"  src="images/productCategory/'.$category->id.'/'.$category->image.'" alt="'.$category->titleNed.'">';
				echo '</div>';
			echo '</div>';
			echo '<div class="col-lg-7">';
				echo $category->descrNed;
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
		$subcategories = DAOFactory::getProductCategoryDAO ()->getActiveProductCategoryByParentOrder ( $category->id );
		$items = 0;
		foreach ( $subcategories as $subCategory ) {
			if($items == 4 || $items == 8 || $items == 12){
				echo '</div>';
				echo '<div class="row news">';
			}
			echo '<div class="col-lg-3 col-xs-6" text-align="center">';
				echo '<div class="thumbnail"  style="min-height:200px;max-height:300px">';
					echo '<a href="menu.php?section='.$section->id.'&category='.$category->id.'&subcategory=' . $subCategory->id . '"><img class="img-responsive"  src="images/productCategory/' . $subCategory->id . '/sm/' . $subCategory->image . '" alt="'.$subCategory->titleNed.'"></a>';
						echo '<div class="caption" style="text-align:center;vertical-align:bottom;">';
							echo '<h5>'. $subCategory->titleNed . '</h5>';
						echo '</div>';
				echo '</div>';
			echo '</div>';
			$items++;
		}
	?>
	</div>
	<div class="row">
		<?php
			$prodxCats = DAOFactory::getProdXCategoryDAO ()->getActiveProdXCategoryByCategoryOrder ( $category->id );
			$items = 0;
			foreach ( $prodxCats as $prodxCat ) {
				if($items == 4 || $items == 8 || $items == 12){
						echo '</div>';
					echo '<div class="row">';
				}
				$product = DAOFactory::getProductDAO ()->load ( $prodxCat->product );
				if ($product->active) {
					echo '<div class="col-lg-3 col-xs-6" text-align="center">';
						echo '<div class="thumbnail" style="min-height:200px;max-height:300px">';
							echo '<a href="menu.php?section='.$section->id.'&category='.$category->id.'&product=' . $product->id . '"><img class="img-responsive"  src="images/product/' . $product->id . '/sm/' . $product->image . '" alt="' . $product->titleNed . '"></a>';
								echo '<div class="caption" style="text-align:center;vertical-align:bottom;">';
									echo '<h5>'. $product->titleNed . '</h5>';
								echo '</div>';
						echo '</div>';
					echo '</div>';
				}
				$items++;
			}
		?>
	</div>
</div>
<div class="col-lg-3 hidden-xs hidden-sm hidden-md">
	<?php
		include 'secondHandslider.php'; 
	?>
</div>