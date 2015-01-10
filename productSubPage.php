<h1 class="page-header">
	<?php
		echo $product->titleNed; 
	?>
</h1>
<div class="row">
	<div class="col-xs-12">
		<ol class="breadcrumb">
		  <li><a href="menu.php?section=<?php echo $section->id; ?>"><?php echo $section->titleNed; ?></a></li>
		  <li><a href="menu.php?section=<?php echo $section->id.'&category='.$category->id; ?>"><?php echo $category->titleNed; ?></a></li>
		  <?php
		  	if(isset($_REQUEST['subcategory']))
		  	{
		  		echo '<li><a href="menu.php?section='.$section->id.'&category='.$category->id.'&subcategory='.$subCategory->id.'">'.$subCategory->titleNed.'</a></li>';
		  	} 
		  ?>
		  <li class="active"><?php echo $product->titleNed; ?></li>
		</ol>
	</div>
</div>
<div class="col-lg-9">
	<div class="row">
	<?php 
		if(isset($product->image) && ($product->image != ''))
		{
			echo '<div class="col-lg-5 hidden-xs hidden-sm hidden-md">';
				echo '<div style="padding-left:0px">';
					echo '<img  class="img-responsive"  src="images/product/'.$product->id.'/'.$product->image.'" alt="'.$product->titleNed.'">';
				echo '</div>';
			echo '</div>';
			echo '<div class="col-lg-7">';
				echo $product->descrNed;
			echo '</div>';
		}
		else
		{
			echo '<div class="col-lg-12">';
				echo $product->descrNed;
			echo '</div>';
		}
	?>
	</div>
</div>
<div class="col-lg-3 hidden-xs hidden-sm hidden-md">
	<?php
		include 'secondHandslider.php'; 
	?>
	2dehands/Te Huur
	carrousel</div>
</div>