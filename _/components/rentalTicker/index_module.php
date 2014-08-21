<h3><?php echo $lang['rental_title']; ?></h3>
<div class="vticker">
	<ul style="list-style-type: none">
  			<?php
					// $contArray = DAOFactory::getContentDAO()->getContentBySectionLanguagePublishedOrderBy(1,'nl',1,'S_I_CREATE_TECH');
					$array = DAOFactory::getRentalDAO()->getActiveRental();
					for($i = 0; $i < count ( $array ); $i ++) {
						$row = $array [$i];
						// echo '<li class="newsflash-item"><div class="media"><img class="pull-left" style="height:50px;" src="images/content/'.$row->id.'/'.$row->imageURL.'"><div class="media-body"><h4 class="media-heading" style="padding:5px;padding-top:5px;">'.$row->introtext.'</h4></div></div></li>';
						echo '<li class="newsflash-item">';
								//echo '<div class="media">';
									echo '<img class="pull-left" style="height:200px;" src="images/secondHand/' . $row->id . '/sm/' . $row->image1 . '">';
										//echo '<div class="media-body">';
											echo '<h4 class="media-heading" style="padding:5px;padding-top:5px;">' . $row->title . '</h4>';
										//echo '</div>';
								//echo '</div>';
						echo '</li>';
					}
					?>
  		</ul>

</div>