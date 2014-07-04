<?php
if(isset($_POST['sh_id'])){
	$secondHandDAO = DAOFactory::getSecondHandDAO();
	$secondHandDAO->delete($_POST['sh_id']);
}
?>