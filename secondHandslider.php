
<?php
// 	$secondHands = DAOFactory::getSecondHandDAO()->getFrontPageItems();
// 	if(isset($secondHands) && count($secondHands) != 0){
// 		echo '<h2>Te Koop</h2>';
// 		echo '<div id="slider" class="aslider" data-duration="10" data-hide-controls >';
// 		foreach ($secondHands as $secondHand) {			
// 			echo '<div class="aslide" data-duration="4">';
// 				echo '<a href="2dehandsDetail.php?id='.$secondHand->id.'"><img width="100%" class="img-responsive"  src="images/secondHand/'.$secondHand->id.'/'.$secondHand->image1.'" alt="'.$secondHand->title.'" /></a>';
// 				echo '<div class="text"><a href="2dehandsDetail.php?id='.$secondHand->id.'">'.$secondHand->title.'</a></div>';
// 			echo '</div>';
// 		}
// 		echo '</div>';
// 	}

	$secondHands = DAOFactory::getSecondHandDAO()->getFrontPageItems();
	if(isset($secondHands) && count($secondHands) != 0){
		echo '<h2>Te Koop</h2>';
		echo '<div id="slider1_container" style="position: relative; margin: 0 auto;top: 0px; left: 0px; width: 980px; height: 400px; background: url(../img/major/main_bg.jpg) top center no-repeat;">';
//                 <!-- Loading Screen -->
        	echo '<div u="loading" style="position: absolute; top: 0px; left: 0px;">';
            	echo '<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;top: 0px; left: 0px; width: 100%; height: 100%;">';
				echo '</div>';
            	echo '<div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;top: 0px; left: 0px; width: 100%; height: 100%;">';
            	echo '</div>';
			echo '</div>';
// 			<!-- Slides Container -->
			echo '<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 980px;height: 400px; overflow: hidden;">';
			foreach ($secondHands as $secondHand) {
				echo '<div><a href="2dehandsDetail.php?id='.$secondHand->id.'"><img class="img-responsive" src="images/secondHand/'.$secondHand->id.'/xs/'.$secondHand->image1.'" title="'.$secondHand->title.'"></a></div>';
			}
		echo '</div>';
	}
	
	
?>