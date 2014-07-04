<!-- <div id="wrap" style="margin-top:150px;">  -->

<h3 class="page-header">Laatste nieuws</h3>
<br>

  <div class="vticker">
  		<ul style="list-style-type:none;width:400px">
  			<?php 
  				$contArray = DAOFactory::getContentDAO()->getContentBySectionLanguagePublishedOrderBy(1,'nl',1,'S_I_CREATE_TECH');
  				for($i=0;$i<count($contArray);$i++){
					$row = $contArray[$i];
					//echo '<li class="newsflash-item"><div class="media"><img class="pull-left" style="height:50px;" src="images/content/'.$row->id.'/'.$row->imageURL.'"><div class="media-body"><h4 class="media-heading" style="padding:5px;padding-top:5px;">'.$row->introtext.'</h4></div></div></li>';
					echo '<li class="newsflash-item"><div class="media"><img class="pull-left" style="height:50px;" src="images/content/'.$row->id.'/'.$row->imageURL.'"><div class="media-body"><h4 class="media-heading" style="padding:5px;padding-top:5px;">'.$row->introtext.'</h4></div></div></li>';
				}
				 ?>
	
	  		<li>
	  			<h4 style="padding:5px;">Openingsuren - Feestdagen</h4>
	  		</li>	
	  	  	<li>
		  		<h4 style="padding:5px;">Fendt 210 Vario Demo</h4>
	  	  	</li>
  		</ul>
	  
	</div>
<!-- </div> -->