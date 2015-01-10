<?php 
include_once '../_/components/php/include_dao.php'; 
$id=$_POST['id'];
$category=$_POST['category'];
$dao = DAOFactory::getProdXCategoryDAO();
$resOriginal = $dao->load($id);
$resDestination = $dao->getProductUpRecordByCategory($resOriginal->order,$category);
$orderTemp = $resOriginal->order;
$resOriginal->order = $resDestination->order;
$resDestination->order = $orderTemp;
$dao->update($resOriginal);
$dao->update($resDestination);
 ?>