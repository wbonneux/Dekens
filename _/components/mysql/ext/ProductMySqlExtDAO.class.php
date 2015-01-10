<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class ProductMySqlExtDAO extends ProductMySqlDAO{
	
	public function setActive($id){
		$sql = "UPDATE  prod_product SET  L_I_ACTIVE = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setInactive($id){
		$sql = "UPDATE  prod_product SET  L_I_ACTIVE = false WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	
	public function setSwitchActive($id,$active){
		if($active == 1)
		{
			$active = 0;
		}else{
			$active = 1;
		}
		$sql = "UPDATE  prod_product SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveProduct(){
		$sql = "SELECT * FROM prod_product WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getAllProductByCategoryOrderByOrder($category){
		$sql = "SELECT * FROM PROD_PRODUCT WHERE (O_I_IDF_TECH) IN (SELECT O_PRODUCT_IDF_TECH FROM PROD_X_CATEGORY WHERE O_CATEGORY_IDF_TECH = ? ORDER BY N_I_ORDER)";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($category);
		return $this->getList($sqlQuery);
	}
	
	public function countActiveProduct(){
		$sql = "SELECT count(O_I_IDF_TECH) FROM prod_product WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->querySingleResult($sqlQuery);
	}
	
	/**
	 * Get rows count where column created_by is equal to method param
	 */
	/*function getCountByCreatedBy($createdBy){
		$sql = "SELECT count(*) FROM secondHand WHERE created_by=?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($createdBy);
		return $this->querySingleResult($sqlQuery);
	}*/
	
	/**
	 * This method returns array of object UserProduct. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserProduct
	 * and add this object to new array
	 */
	/*function getUserNameAndProductTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userProduct = new UserProduct();
			$userProduct->username = $tab[$i]["name"];
			$userProduct->title = $tab[$i]["title"];
			$ret[$i] = $userProduct; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserProduct{
// 	var $username;
// 	var $title;
// }
?>
