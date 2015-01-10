<?php

// set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
include_once '_/components/lang/select.lang.php';
$sectionDAO = DAOFactory::getProductSectionDAO();
$categoryDAO = DAOFactory::getProductCategoryDAO();
$productDAO = DAOFactory::getProductDAO();
$prodxCatDAO = DAOFactory::getProdXCategoryDAO();
$section = new ProductSection();
$category = new ProductCategory();
$prodxCat = new ProdXCategory();
$product = new Product();
//level 0: section/menu
if (isset ( $_REQUEST ['section'] )) {
	$section = $sectionDAO->load ( $_REQUEST ['section'] );
	if (isset ( $section ) && isset ( $section->id ) && ($section->active == 1)) {
		// ok
		$_SESSION ['level'] = 0;
	}
	else{
		//header to index.php!
	}
}
//level 1: categories under a menu/section
if (isset ( $_REQUEST ['category']) && $_SESSION['level'] == 0) {
	$category = $categoryDAO->load ( $_REQUEST ['category'] );
	if (isset ( $section ) && isset ( $section->id ) && ($section->active == 1)) {
		$prodxSection = DAOFactory::getProdXSectionDAO()->getProdXSectionByCategory($category->id);
		if(isset($prodxSection[0]) && isset($prodxSection[0]->section))
		{
			if (isset ( $category ) && isset ( $category->id ) && ($category->active == 1) && ($prodxSection[0]->section == $section->id)) {
				// ok
				$_SESSION ['level'] = 1;
			}	
		}
			
	}
	
}
//level 2: subcategories under a category
if (isset ( $_REQUEST ['subcategory'] ) && $_SESSION['level'] == 1) {
	$subCategory = $categoryDAO->load ( $_REQUEST ['subcategory'] );
	if (isset ( $category ) && isset ( $category->id ) && ($category->active == 1)) {
		if (isset ( $subCategory ) && isset ( $subCategory->id ) && ($subCategory->active == 1) && ($subCategory->parent == $category->id)) {
			// ok
			$_SESSION ['level'] = 2;
		}	
	}
	
}

//level 3: product under a category or subcategory
if (isset ( $_REQUEST ['product']) && ($_SESSION['level'] == 1 || $_SESSION['level'] == 2)) {
	$product = $productDAO->load ( $_REQUEST ['product'] );
	if($_SESSION['level'] == 1){
		$prodxCats = $prodxCatDAO->getProdXCategoryByCategory($category->id);
	}elseif($_SESSION['level'] == 2){
		$prodxCats = $prodxCatDAO->getProdXCategoryByCategory($subCategory->id);
	}
	
	foreach ($prodxCats as $prodxCat){
		if(isset($prodxCat) && isset($prodxCat->id) && $prodxCat->active == 1){
// 			echo '$product->id: '.$product->id;
// 			echo '$prodxCat->product: '.$prodxCat->product;
// 			echo 'isset product: '.isset($product).'<br/>';
// 			echo 'isset product->id: '.isset($product->id).'<br/>';
// 			echo 'product->id: '.$product->id.'<br/>';
// 			echo 'active product: '.$product->active.'<br/>';
			if (isset ($product) && isset ( $product->id ) && ($product->active == 1) && ($product->id == $prodxCat->product)) {
				// ok
// 				echo 'ok<br/>';
				$_SESSION ['level'] = 3;
			}
		}
	}
}
	//   echo 'level: '.$_SESSION['level'];
	//   echo 'category: '.$category->id;

 
 //switch statement for querying the level
 /*
  * if level = 0 include menuSubPage
  * if level = 1 include categorySubPage
  * if level = 2 include categorySubPage(extra logic for breadcrumbs)
  * if level = 3 include productSubPage
  */
?>


<html>
<head>
<meta name="keyword" content="Agri Technics, Fendt, tractor, machines">
<meta name="description"
	content="Dekens Agri Technics - Specialist in tuinmachines en parkmachines met een uitstekende service">
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<style type='text/css'>
        ul.nav li.dropdown:hover ul.dropdown-menu {
            display: block;
        }
    </style>
<title>
			<?php
			echo $lang ['pagetitle'];
			?>
		</title>
<link rel="shortcut icon" href="images/icon/favicon.ico"
	type="image/x-icon" />
<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css"
	media="screen" title="master" >
<link rel="stylesheet" href="_/css/mystyles.css" type="text/css"
	media="screen" title="master" >
<link rel="stylesheet" href="_/css/lightbox.css" type="text/css"
	media="screen" title="master" >
<link rel="stylesheet" href="_/components/bxslider/jquery.bxslider.css" />
<!--         <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'> -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css'>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css"
	rel="stylesheet" type="text/css">
</head>

</head>
<body id="home">
<script type="text/javascript" src="../js/jssor.js"></script>
   	<section class="container">
		<div class="content row container">
         	<?php include "_/components/php/header.php"; ?>
         	
         	<?php
         		if(isset($_SESSION['level']))
         		{
         			switch($_SESSION['level']){
         				case 0:
         					include 'menuSubPage.php';
         					break;
         				case 1:
         					include 'categorySubPage.php';
         					break;
         				case 2:
         					include 'subCategorySubPage.php';
         					break;
         				case 3:
         					include 'productSubPage.php';
         					break;
		
         			}
         		}
// 				if ($_SESSION ['level'] == 0) {

					
// 				} elseif ($_SESSION ['level'] == 2) {
// 					include 'productSubPage.php';
// 				}
			?>
         	
         	
<!--         	<h1 class="page-header"> -->
        		<?php
// 										// echo 'level: '.$_SESSION['level'];
// 										if ($_SESSION ['level'] == 1) {
// 											// echo "<a href='landbouw.php'>".$lang ['lb_title']."</a>";
// 											// echo ' - ';
// 											echo $section->titleNed;
// 										} elseif ($_SESSION ['level'] == 2) {
// 											echo $product->titleNed;
// 										} else {
// 											echo "<a href='Menu.php?section='".$section->id.">" . $section->titleNed . "</a>";
// 											;
// 										}
// 										?>
<!--         	</h1> -->
        	<?php
// 									if ($_SESSION ['level'] == 1 || $_SESSION ['level'] == 0) {
// 										// echo "<a href='landbouw.php'>".$lang ['lb_title']."</a>";
// 										// echo ' - ';
// 										include 'menuSubPage.php';
// 									} elseif ($_SESSION ['level'] == 2) {
// 										include 'productSubPage.php';
// 									}
// 									?>
        </div>
		<!-- content -->
	</section>   
	<?php include "_/components/php/footer.php"; ?>
	<script type="text/javascript" src="_/js/bootstrap.js"></script>
	<script type="text/javascript" src="_/js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="_/js/myscript.js"></script>
	<script type="text/javascript" src="_/js/lightbox.js"></script>
</body>
</html>