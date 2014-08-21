<?php 
include_once '../_/components/php/include_dao.php'; 
$id=$_POST['id'];
echo $id;
$res = DAOFactory::getSecondHandDAO()->setInactive($id);
 if($res > 0)
    echo "success";
 else{
    echo "Please after some time";
 }
 ?>