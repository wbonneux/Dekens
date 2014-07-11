<?php
if(isset($_POST['sh_id'])){
	$rentalDAO = DAOFactory::getRentalDAO();
	$rentalDAO->delete($_POST['sh_id']);
}
?>