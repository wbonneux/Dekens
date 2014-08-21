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

<script type="text/javascript">

function setActive(id){
	 
	  $.post('setShActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setInactive("+id+")");
	  });
}

function setInactive(id){
	  $.post('setShInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setActive("+id+")");
		  
	  });
}

function setRtActive(id){
	 
	  $.post('setRtActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setRtInactive("+id+")");
	  });
}

function setRtInactive(id){
	  $.post('setRtInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setRtActive("+id+")");
		  
	  });
}

function setFpActive(id){
	 
	  $.post('setFpActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setFpInactive("+id+")");
	  });
}

function setFpInactive(id){
	  $.post('setFpInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setFpActive("+id+")");
		  
	  });
}

function setSold(id){
	 
	  $.post('setShSold.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  $("#unsold-"+id).addClass('label-success').removeClass('label-error');
		  $("#unsold-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#unsold-"+id).attr('id',"sold-"+id);
		  $("#sold-"+id).attr("onclick","setUnsold("+id+")");
	  });
}



function setUnsold(id){
	 
	  $.post('setShUnsold.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  $("#sold-"+id).addClass('label-error').removeClass('label-success');
		  $("#sold-"+id).text('Nee');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#sold-"+id).attr('id',"unsold-"+id);
		  $("#unsold-"+id).attr("onclick","setSold("+id+")");
	  });
}

function setPosLeft(id){
	 
	  $.post('setPosLeft.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  //$("#left-"+id).addClass('label-success').removeClass('label-error');
		  $("#right-"+id).text('Links');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#right-"+id).attr('id',"left-"+id);
		  $("#left-"+id).attr("onclick","setPosRight("+id+")");
	  });
}



function setPosRight(id){
	 
	  $.post('setPosRight.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  //$("#left-"+id).addClass('label-error').removeClass('label-success');
		  $("#left-"+id).text('Rechts');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#left-"+id).attr('id',"right-"+id);
		  $("#right-"+id).attr("onclick","setPosLeft("+id+")");
	  });
}

function deleteRt(id){
	if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
//			alert('deleted');
		$.post('deleteRt.php', {id:id},function(data){
 			$("#rowid-"+id).remove();
 		});
	}else{
		//alert('delete cancelled');
	}
		
}

function deleteSh(id){
		if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
// 			alert('deleted');
			$.post('deleteSh.php', {id:id},function(data){
	 			$("#rowid-"+id).remove();
	 		});
		}else{
			//alert('delete cancelled');
		}
			
}

function deleteFp(id){
	if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
//			alert('deleted');
		$.post('deleteFp.php', {id:id},function(data){
 			$("#rowid-"+id).remove();
 		});
	}else{
		//alert('delete cancelled');
	}
		
}
// $('document').ready(function(){

// 	$('a').click(function(){

// 		var del_id = $(this).attr('id');
// //		alert(del_id);
// 		//var parent = $(this).parent();
// 		var parent = $("#rowid-"+del_id);

// 		$.post('deleteSh.php', {id:del_id},function(data){

// 			parent.slideUp('slow', function() {$("#rowid-"+id).remove();});
// 		});

// 	});
	
// 	$('#active').click(function(){

// 		var id = $(this).attr('id');
// 		alert(id);
// 		//var parent = $(this).parent();
// // 		var parent = $("#rowid-"+del_id);

// // 		$.post('deleteSh.php', {id:del_id},function(data){

// // 			parent.slideUp('slow', function() {$("#rowid-"+id).remove();});
// // 		});

// 	});


</script>
</body>
</html>
