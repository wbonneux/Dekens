<h1 class="page-header">
	<?php
		echo $section->titleNed; 
	?>
</h1>
<div class="col-lg-9">
	<div class="row">
		<?php 
			if(isset($section->image) && ($section->image != ''))
			{
				echo '<div class="col-lg-5 hidden-xs hidden-sm hidden-md">';
					echo '<div style="padding-left:15px">';
						echo '<img  class="img-responsive"  src="images/productSection/'.$section->id.'/'.$section->image.'" alt="'.$section->titleNed.'">';
					echo '</div>';
				echo '</div>';
				echo '<div class="col-lg-7">';
					echo $section->descrNed;
				echo '</div>';
			}
			else
			{
// 				echo '<div class="col-lg-5 hidden-xs hidden-sm hidden-md">';
// 					echo '<div style="padding-left:15px">';
// 						echo '<img  class="img-responsive"  src="images/productSection/'.$section->id.'/'.$section->image.'" alt="...">';
// 	        		echo '</div>';
// 				echo '</div>';
				echo '<div class="col-lg-12">';
					echo $section->descrNed;
				echo '</div>';
			}
		?>
		
	</div>
	<br />
	<div class="row">
		<?php
		$prodxSections = DAOFactory::getProdXSectionDAO()->getActiveProdXSectionBySectionOrder($section->id);
		$items = 0;
		foreach ($prodxSections as $prodxSection)
		{
			if($items == 4 || $items == 8 || $items == 12){
				echo '</div>';
				echo '<div class="row news">';
			}
			$category = DAOFactory::getProductCategoryDAO()->load($prodxSection->category);
			if(isset($category) && isset($category->id)){
				echo '<div class="col-lg-3 col-xs-6" text-align="center">';
					echo '<div class="thumbnail" style="min-height:200px;max-height:300px">';
					//echo $category->image;
					echo '<a href="Menu.php?section='.$section->id.'&category=' . $category->id . '"><img class="img-responsive"  src="images/productCategory/' . $category->id . '/sm/' . $category->image . '" alt="'.$category->titleNed.'"></a>';
						echo '<div class="caption">';
							echo '<h5>'. $category->titleNed . '</h5>';
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

