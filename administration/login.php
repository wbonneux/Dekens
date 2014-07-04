<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dekens Agri Technics - Administration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Administration powered by WebBo Software">
	<meta name="author" content="Bonneux Wim">

	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	
	<link href='../_/components/formvalidation/style.css' rel='stylesheet'>
	<link href='../_/components/administration/css/bootstrap-classic.css' rel='stylesheet'>
	<link href="../_/components/administration/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../_/components/administration/css/charisma-app.css" rel="stylesheet">
	<link href="../_/components/administration/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='../_/components/administration/css/fullcalendar.css' rel='stylesheet'>
	<link href='../_/components/administration/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='../_/components/administration/css/chosen.css' rel='stylesheet'>
	<link href='../_/components/administration/css/uniform.default.css' rel='stylesheet'>
	<link href='../_/components/administration/css/colorbox.css' rel='stylesheet'>
	<link href='../_/components/administration/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='../_/components/administration/css/jquery.noty.css' rel='stylesheet'>
	<link href='../_/components/administration/css/noty_theme_default.css' rel='stylesheet'>
	<link href='../_/components/administration/css/elfinder.min.css' rel='stylesheet'>
	<link href='../_/components/administration/css/elfinder.theme.css' rel='stylesheet'>
	<link href='../_/components/administration/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='../_/components/administration/css/opa-icons.css' rel='stylesheet'>
	<link href='../_/components/administration/css/uploadify.css' rel='stylesheet'>
	


	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="../_/components/administration/img/favicon.ico">
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				 <div class="span12 center login-header">
					<h2>Welkom bij de administratiemodule</h2>
				</div><!--/span
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Gelieve in te loggen met uw gebruikersnaam en uw wachtwoord.
					</div>
					<form class="form-horizontal" id="login-form" action="../_/components/administration/php-version/authorize.php" method="post">
						<fieldset>
							<div class="input-prepend" title="Gebruikersnaam" data-rel="tooltip">
								<span class="add-on">
									<i class="icon-user"></i>
								</span>
								<input autofocus class="input-large span10" name="username" id="username" type="text"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Wachtwoord" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" />
							</div>
							<div class="clearfix"></div>

							<!-- <div class="input-prepend">
								<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div> -->
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">Login</button>
							</p>
						</fieldset>
					</form>

				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="../_/components/administration/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="../_/components/administration/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="../_/components/administration/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="../_/components/administration/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="../_/components/administration/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="../_/components/administration/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="../_/components/administration/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="../_/components/administration/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="../_/components/administration/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="../_/components/administration/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="../_/components/administration/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="../_/components/administration/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="../_/components/administration/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="../_/components/administration/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="../_/components/administration/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="../_/components/administration/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='../_/components/administration/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='../_/components/administration/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="../_/components/administration/js/excanvas.js"></script>
	<script src="../_/components/administration/js/jquery.flot.min.js"></script>
	<script src="../_/components/administration/js/jquery.flot.pie.min.js"></script>
	<script src="../_/components/administration/js/jquery.flot.stack.js"></script>
	<script src="../_/components/administration/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="../_/components/administration/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="../_/components/administration/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="../_/components/administration/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="../_/components/administration/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="../_/components/administration/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="../_/components/administration/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="../_/components/administration/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="../_/components/administration/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="../_/components/administration/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="../_/components/administration/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="../_/components/administration/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="../_/components/administration/js/charisma.js"></script>
	
		
</body>
</html>
