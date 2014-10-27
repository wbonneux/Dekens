<?php
set_include_path ( '.;C:\xampp\htdocs\Zend\Dekens' );
// include_once '_/components/php/include_dao.php';
?>
<header class="clearfix">
	<section id="branding">
		
		<div class="row">
			<div class="col-lg-10 col-md-6 hidden-xs">
				<a href="index.php"> <img class="none-bg img-responsive"
					style="height: 100px" src="images/misc/Logo_Trans_Header_V4.png"
					alt="Dekens Agri Technics">
				</a>
			</div>
			<div class="col-lg-2 col-md-6 hidden-sm hidden-xs"
				style="text-align: right">
				<div id="languages">
					<a href="index.php?lang=nl"><img src="images/flags/en.png" /></a> <a
						href="index.php?lang=fr"><img src="images/flags/es.png" /></a>
				</div>
				<br />
				<br /> <a href="http://www.mypartspartner.be/mpp-be/nl"
					target="_blank"> <img class="none-bg img-responsive"
					style="height: 40px; text-align: right; vertical-align: bottom"
					src="images/MyPartsPartner/MyPartsPartner.JPG"
					alt="My Parts Partner - klik om in te loggen">
				</a>
			</div>
		</div>
	</section>
	<!-- branding -->

	<nav class="navbar" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<!--
      <a class="navbar-brand" href="#">Brand</a>
    -->
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar">
				<li><a href="index.php">Home</a></li>
				<!--<li><a href="overons.php">Over ons</a></li>-->
				<!--  <li class="visible-xs hidden-sm hidden-md visible-lg"><a href="merken.php">Merken</a></li>-->
				<!--  <li class="visible-xs hidden-sm hidden-md visible-lg"><a href="service.php">Service</a></li>-->
				<li><a href="accugereedschap.php"><?php echo  $lang ['accu_title'];?></a></li>
				<li><a href="2dehands.php">Tweedehands</a></li>
				<li><a href="Verhuur.php">Verhuur</a></li>
				<li><a href="contact.php">Contacteer ons</a></li>
			</ul>
			<!--
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
    </ul>
  -->
		</div>
		<!-- /.navbar-collapse -->
	</nav>
	<!-- Modal -->
	<section id="modal" class="modal fade">
		<div class="modal-body">
			<img id="modalimage" src="" alt="Modal Photo">
		</div>
		<!-- modal-body -->
	</section>
	<!-- modal -->
</header>
<!-- header -->
