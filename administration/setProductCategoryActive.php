<?php 
include_once '../_/components/php/include_dao.php'; 
$id=$_POST['id'];
echo $id;
$res = DAOFactory::getProductCategoryDAO()->setActive($id);
$prodxSection = DAOFactory::getProdXSectionDAO()->getProdXSectionByCategory($id);
$res = DAOFactory::getProdXSectionDAO()->setActive($prodxSection[0]->id);
 if($res > 0)
    echo "success";
 else{
    echo "Please after some time";
 }
 ?>