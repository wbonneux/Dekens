<?php
//set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
//include_once '_/components/lang/lang.nl.php';
//include_once '_/components/php/include_dao.php';
//$secondHandDAO = DAOFactory::getSecondHandDAO();
// $secondHandArr = null;
// $secondHandArr =$secondHandDAO->getActiveSecondHand();
include_once '_/components/lang/select.lang.php';
?>
<html>
	<head>
		<meta name="keyword" content="Agri Technics, Fendt, tractor, accugereedschap, Husq Varna">	
		<meta name="description" content="Dekens Agri Technics - Specialist in accugereedschap met een uitstekende service">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title><?php echo  $lang ['ketting_pagetitle'];?></title>
		<link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/mystyles.css" type="text/css" media="screen" title="master" charset="utf-8">
		<link rel="stylesheet" href="_/css/lightbox.css" type="text/css" media="screen" title="master" charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro' rel='stylesheet' type='text/css'>
		<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	</head>

</head>
<body id="home">
	<section class="container">
        <div class="content row container">
         	<?php include "_/components/php/header.php"; ?>
        	<h1 class="page-header"><?php echo  '<a href="accugereedschap.php">'.$lang ['accu_title'].'</a> / '.$lang ['ketting_title'];?></h1>
        	<div class="row news">
<!-- 				detail van een kettingzaag -->
        	</div>
			
		  	
			
        </div><!-- content -->
	</section>   
	<?php include "_/components/php/footer.php"; ?>
	<script type="text/javascript" src="_/js/bootstrap.js"></script>
	<script type="text/javascript" src="_/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="_/js/myscript.js"></script>
    <script type="text/javascript" src="_/js/lightbox.js"></script>
</body>
</html>