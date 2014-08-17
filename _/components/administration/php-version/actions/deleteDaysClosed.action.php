<?php
if(isset($_POST['obj_id'])){
	$objDAO = DAOFactory::getDaysClosedDAO();
	$objDAO->delete($_POST['obj_id']);
}
?>