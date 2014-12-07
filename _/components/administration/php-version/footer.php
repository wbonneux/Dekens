		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
<!-- content ends -->
</div>
<!--/#content.span10-->
<?php } ?>
</div>
<!--/fluid-row-->
<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>

<hr>

<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Toevoegen</h3>
	</div>
	<!-- <form action="nieuws.php?action=add" method="POST" role="form"> -->
	<form action="nieuws.php?action=add" method="POST" role="form"
		enctype="multipart/form-data">
			<?php
	// $languageArray = DAOFactory::getLanguageDAO()->queryAll();
	include '_/components/administration/php-version/addContent.php';
	?>

				
				
			
				
			</form>
	<!-- <div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div> -->
</div>

<footer>
	<p class="pull-left">
		&copy; <a mailto="info@webbositedesign.be" target="_blank">Bonneux Wim</a> <?php echo date('Y') ?></p>
	<p class="pull-right">
		Powered by: <a href="http://webbositedesign.be">WebBo Software</a>
	</p>
</footer>
<?php } ?>

</div>
<!--/.fluid-container-->

<!-- external javascript
	================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
<?php include "include_js_footer.php"?>

<!--
	<?php
	// Google Analytics code for tracking my demo site, you can remove this.
	if ($_SERVER ['HTTP_HOST'] == 'usman.it') {
		?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-26532312-1']);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
			})();
		</script>
	<?php } ?>
	-->


</body>
</html>
