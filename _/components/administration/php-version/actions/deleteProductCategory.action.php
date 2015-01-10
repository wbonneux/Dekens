<?php
if(isset($_POST['pc_id'])){
	$productCategoryDAO = DAOFactory::getProductCategoryDAO();
	$productCategoryDAO->delete($_POST['pc_id']);
}
?>