<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class ProdXCategoryMySqlExtDAO extends ProdXCategoryMySqlDAO{
	
	
	public function setActive($id){
		$sql = "UPDATE  prod_x_category SET  L_I_ACTIVE = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setInactive($id){
		$sql = "UPDATE  prod_x_category SET  L_I_ACTIVE = false WHERE  O_I_IDF_TECH = ?";
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
		$sql = "UPDATE  prod_x_category SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveProdXCategory(){
		$sql = "SELECT * FROM prod_x_category WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProdXCategoryOrderedByOrder(){
		$sql = "SELECT * FROM prod_x_category WHERE L_I_ACTIVE = true ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getProdXCategoryByOrder($orderId){
		$sql = "SELECT * FROM prod_x_category WHERE N_I_ORDER = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderId);
		return $this->querySingleResult($sqlQuery);
	}
	
	public function getProdXCategoryByProduct($productId){
		$sql = "SELECT * FROM prod_x_category WHERE O_PRODUCT_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($productId);
		return $this->getRow($sqlQuery);
	}
	public function getActiveProdXCategoryByProductOrder($productId){
		$sql = "SELECT * FROM prod_x_category WHERE L_I_ACTIVE = true AND O_PRODUCT_IDF_TECH = ? ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($productId);
		return $this->getList($sqlQuery);
	}
	
	public function getProdXCategoryByCategory($categoryId){
		$sql = "SELECT * FROM prod_x_category WHERE O_CATEGORY_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($categoryId);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProdXCategoryByCategoryOrder($categoryId){
		$sql = "SELECT * FROM prod_x_category WHERE L_I_ACTIVE = true AND O_CATEGORY_IDF_TECH = ? ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($categoryId);
		return $this->getList($sqlQuery);
	}
	
	public function getAllProdXCategoryByCategoryOrder($categoryId){
		$sql = "SELECT * FROM prod_x_category WHERE O_CATEGORY_IDF_TECH = ? ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($categoryId);
		return $this->getList($sqlQuery);
	}
	

	
	public function deleteProdXCategoryByProduct($productId){
		$sql = "DELETE FROM prod_x_category WHERE O_PRODUCT_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($productId);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function deleteProdXCategoryByCategory($categoryId){
		$sql = "DELETE FROM prod_x_category WHERE O_CATEGORY_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($categoryId);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getOrderForDown($active, $categoryId, $orderId){
		$sql = "SELECT MAX(N_I_ORDER) FROM prod_x_category WHERE L_I_ACTIVE = ? AND O_CATEGORY_IDF_TECH = ? AND WHERE N_I_ORDER < ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->set($categoryId);
		$sqlQuery->setNumber($orderId);
		return $this->querySingleResult($sqlQuery);
	}
	
	public function getOrderForUp($active, $categoryId, $orderId){
		$sql = "SELECT MIN(N_I_ORDER) FROM prod_x_category WHERE L_I_ACTIVE = ? AND O_CATEGORY_IDF_TECH = ? AND WHERE N_I_ORDER > ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->set($categoryId);
		$sqlQuery->setNumber($orderId);
		return $this->querySingleResult($sqlQuery);
	}
	
	
	

	/**
	 * Swap the order of a tabel(origin, dest)
	 */
	public function swapRecords($prodxcategory, $origin,$dest){
		$record_origin = $this->getProdXCategoryByOrder($origin);
		$record_origin->order = $dest;
		$this->update($record_origin);
		
		$record_dest = $this->getProdXCategoryByOrder($dest);
		$record_dest->order = $dest;
		$this->update($record_dest);
		
	}
	
	public function countActiveProdXCategory(){
		$sql = "SELECT count(O_I_IDF_TECH) FROM prod_x_category WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->querySingleResult($sqlQuery);
	}
	
	public function getProductUpRecord($order){
		//sql: get maximum order number where order < order from the id
		$sql = "SELECT * FROM dekens_it01.prod_x_category WHERE (N_I_ORDER) IN ( SELECT MAX(N_I_ORDER) FROM prod_x_category WHERE N_I_ORDER < ?)";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($order);
		return $this->getRow($sqlQuery);
	}
	
	public function getProductUpRecordByCategory($order,$category){
		//sql: get maximum order number where order < order from the id
		$sql = "SELECT * FROM dekens_it01.prod_x_category WHERE (N_I_ORDER) IN ( SELECT MAX(N_I_ORDER) FROM prod_x_category WHERE N_I_ORDER < ? AND O_CATEGORY_IDF_TECH = ?)";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($order);
		$sqlQuery->setNumber($category);
		return $this->getRow($sqlQuery);
	}
	
	public function getProductDownRecord($order){
		$sql = "SELECT * FROM dekens_it01.prod_x_category WHERE (N_I_ORDER) IN ( SELECT MIN(N_I_ORDER)  FROM prod_x_category  WHERE N_I_ORDER > ?)";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($order);
		return $this->getRow($sqlQuery);
	}
	
	public function getProductDownRecordByCategory($order,$category){
		$sql = "SELECT * FROM dekens_it01.prod_x_category WHERE (N_I_ORDER) IN ( SELECT MIN(N_I_ORDER)  FROM prod_x_category  WHERE N_I_ORDER > ? AND O_CATEGORY_IDF_TECH = ?)";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($order);
		$sqlQuery->setNumber($category);
		return $this->getRow($sqlQuery);
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
	 * This method returns array of object UserProdXCategory. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserProdXCategory
	 * and add this object to new array
	 */
	/*function getUserNameAndProdXCategoryTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userProdXCategory = new UserProdXCategory();
			$userProdXCategory->username = $tab[$i]["name"];
			$userProdXCategory->title = $tab[$i]["title"];
			$ret[$i] = $userProdXCategory; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserProdXCategory{
// 	var $username;
// 	var $title;
// }
?>
