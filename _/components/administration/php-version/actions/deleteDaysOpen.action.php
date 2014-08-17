<?php
if(isset($_POST['obj_id'])){
	$objDAO = DAOFactory::getDaysOpenedDAO();
	$objDAO->delete($_POST['obj_id']);
}
?>