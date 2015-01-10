<?php
if(!isset($_GET['p'])){
	echo 'P is not been set' ;
}else{
	echo 'P: '.$_GET['p'];
}
echo '<br/>';
if(!isset($_GET['n'])){
	echo 'N is not been set' ;
}else{
	echo 'N: '.$_GET['n'];
}
	
	
?>