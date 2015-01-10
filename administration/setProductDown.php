<?php 
include_once '../_/components/php/include_dao.php'; 
$id=$_POST['id'];
$category=$_POST['category'];
$dao = DAOFactory::getProdXCategoryDAO();
$resOriginal = $dao->load($id);
// $resOriginal->order = $resOriginal->order + 1;
$resDestination = $dao->getProductDownRecordByCategory($resOriginal->order,$category);
$orderTemp = $resOriginal->order;
$resOriginal->order = $resDestination->order;
$resDestination->order = $orderTemp;
$dao->update($resOriginal);
$dao->update($resDestination);
 ?>