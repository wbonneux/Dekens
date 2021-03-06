<?php
//set_include_path('.;C:\xampp\htdocs\Zend\Dekens');
include_once '../_/components/php/include_dao.php'; 
include_once '_/components/lang/select.lang.php';
	//echo 'session';
// 	session_start();
	//echo $_SESSION['myusername'];
	if (!isset($_SESSION['myusername'])) {
		header("location:login.php");
	}
		
	?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Administratie module - powered by WebBo Software</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="../_/components/administration/css/bootstrap.css" rel="stylesheet">
	<link id="bs-css" href="../_/components/administration/css/bootstrap-cerulean.css" rel="stylesheet">
	<script type="text/javascript" src="../_/components/ckeditor/ckeditor.js"></script>
<!--      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> -->
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>


	<?php //include "include_form_validation.php" ?>
	
	<?php include "include_css_header.php" ?>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="../_/components/administration/img/favicon.ico">
<!-- 	<script type="text/javascript" src="../_/js/tinymce/tinymce.min.js"></script> -->
	<script type="text/javascript" src="../_/components/js/jquery.js"></script>
	<script type="text/javascript" src="../_/js/adminActions.js"></script>

			
</head>

<body>
	
	
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a> -->
				<!-- <a class="brand" href="index.html"> <img alt="Charisma Logo" src="../_/components/administration/img/logo20.png" /> <span>Charisma</span></a> -->
				
				<!-- theme selector starts -->
				 <!-- <div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="h#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div> -->
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="../_/components/administration/php-version/logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<!-- <div class="top-nav nav-collapse">
					<ul class="nav">
						<li><a href="#">Visit Site</a></li>
						<li>
							<form class="navbar-search pull-left">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div> --><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
<!-- 						<li><a class="ajax-link" href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li> -->
						<!-- 
						<li><a class="ajax-link" href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a class="ajax-link" href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a class="ajax-link" href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a class="ajax-link" href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						 -->
<!-- 						 <li><a class="ajax-link" href="fotoalbum.php"><i class="icon-picture"></i><span class="hidden-tablet"> Albums & Foto's</span></a></li> -->
						
						<!-- <li class="nav-header hidden-tablet">Sample Section</li>
					-->
<!-- 						<li><a class="ajax-link" href="nieuws.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Nieuws</span></a></li> -->
						<li><a class="ajax-link" href="voorpagina.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Voorpagina</span></a></li>
						<li><a class="ajax-link" href="2dehands.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;2deHands</span></a></li>
						<li><a class="ajax-link" href="verhuur.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Verhuur</span></a></li>
						
						<li class="nav-header hidden-tablet">Categorie/Produkt</li>
						<li><a class="ajax-link" href="Section.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Menu</span></a></li>
						<li><a class="ajax-link" href="Category.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Categorie</span></a></li>
						<li><a class="ajax-link" href="Product.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Produkt</span></a></li>
						
						<li class="nav-header hidden-tablet">Beschikbaarheden</li>
						<li><a class="ajax-link" href="daysHours.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Openingsuren</span></a></li>
						<li><a class="ajax-link" href="daysClosed.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Uitzonderlijk gesloten</span></a></li>
						<li><a class="ajax-link" href="daysOpen.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Uitzonderlijk open</span></a></li>
						<li><a class="ajax-link" href="infoAvailability.php"><i class="icon-align-justify"></i><span class="hidden-tablet">&nbsp;&nbsp;Extra informatie</span></a></li>
						<!--
						<li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a class="ajax-link" href="grid.html"><i class="icon-th"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a class="ajax-link" href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="tour.html"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
						<li><a class="ajax-link" href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="error.html"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Error Page</span></a></li>
						<li><a href="login.php"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
						 -->
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>

