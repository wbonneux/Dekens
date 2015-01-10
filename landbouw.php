<?php
// set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '_/components/php/include_dao.php';
include_once '_/components/lang/select.lang.php';
$categoryDAO = DAOFactory::getProductCategoryDAO ();
$productDAO = DAOFactory::getProductDAO ();
$category = new ProductCategory ();
$product = new Product ();
if (isset ( $_REQUEST ['category'] )) {
	$category = $categoryDAO->load ( $_REQUEST ['category'] );
	if (isset ( $category ) && isset ( $category->id ) && ($category->active == 1)) {
		// ok
		$_SESSION ['level'] = 1;
	} else {
		$category = $categoryDAO->load ( 19 );
		$_SESSION ['level'] = 0;
	}
} else {
	$category = $categoryDAO->load ( 19 );
	$_SESSION ['level'] = 0;
}

if (isset ( $_REQUEST ['product'] )) {
	$product = $productDAO->load ( $_REQUEST ['product'] );
	if (isset ( $product ) && isset ( $product->id ) && ($product->active == 1)) {
		// ok
		$_SESSION ['level'] = 2;
	} else {
		$category = $categoryDAO->load ( 19 );
		$_SESSION ['level'] = 0;
	}
}
// echo 'level: '.$_SESSION['level'];

?>
<html>
<head>
<meta name="keyword" content="Agri Technics, Fendt, tractor, machines">
<meta name="description"
	content="Dekens Agri Technics - Specialist in tuinmachines en parkmachines met een uitstekende service">
<meta http-equiv="Content-type" content="text/html; charset=utf-8">

<title>
			<?php
			echo $lang ['lb_pagetitle'];
			?>
		</title>
<link rel="shortcut icon" href="images/icon/favicon.ico"
	type="image/x-icon" />
<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css"
	media="screen" title="master" charset="utf-8">
<link rel="stylesheet" href="_/css/mystyles.css" type="text/css"
	media="screen" title="master" charset="utf-8">
<link rel="stylesheet" href="_/css/lightbox.css" type="text/css"
	media="screen" title="master" charset="utf-8">
<link rel="stylesheet" href="_/components/bxslider/jquery.bxslider.css" />
<!--         <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'> -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css'>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css"
	rel="stylesheet" type="text/css">
</head>

</head>
<body id="home">
	
	<section class="container">
		<div class="content row container">
         	<?php include "_/components/php/header.php"; ?>
         	
        	<h1 class="page-header">
        		<?php
										// echo 'level: '.$_SESSION['level'];
										if ($_SESSION ['level'] == 1) {
											// echo "<a href='landbouw.php'>".$lang ['lb_title']."</a>";
											// echo ' - ';
											echo $category->titleNed;
										} elseif ($_SESSION ['level'] == 2) {
											echo $product->titleNed;
										} else {
											echo "<a href='landbouw.php'>" . $lang ['lb_title'] . "</a>";
											;
										}
										?>
        	</h1>
        	<?php
									if ($_SESSION ['level'] == 1 || $_SESSION ['level'] == 0) {
										// echo "<a href='landbouw.php'>".$lang ['lb_title']."</a>";
										// echo ' - ';
										include 'categorySubPage.php';
									} elseif ($_SESSION ['level'] == 2) {
										include 'productSubPage.php';
									}
									?>
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