<?php
if(isset($_POST['fp_id'])){
	$frontPageDAO = DAOFactory::getContentFrontPageDAO();
	$frontPageDAO->delete($_POST['fp_id']);
}
?>