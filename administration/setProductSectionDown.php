<?php 
include_once '../_/components/php/include_dao.php'; 
$id=$_POST['id'];
$dao = DAOFactory::getProductSectionDAO();
$resOriginal = $dao->load($id);
// $resOriginal->order = $resOriginal->order + 1;
$resDestination = $dao->getProductSectionDownRecord($resOriginal->order);
$orderTemp = $resOriginal->order;
$resOriginal->order = $resDestination->order;
$resDestination->order = $orderTemp;
$dao->update($resOriginal);
$dao->update($resDestination);
 ?>