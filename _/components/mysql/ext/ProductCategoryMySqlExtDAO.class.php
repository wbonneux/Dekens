<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class ProductCategoryMySqlExtDAO extends ProductCategoryMySqlDAO{
	
	public function setActive($id){
		$sql = "UPDATE  prod_category SET  L_I_ACTIVE = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setInactive($id){
		$sql = "UPDATE  prod_category SET  L_I_ACTIVE = false WHERE  O_I_IDF_TECH = ?";
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
		$sql = "UPDATE  prod_category SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	public function getActiveProductCategoryOrderByTitle(){
		$sql = "SELECT * FROM prod_category WHERE L_I_ACTIVE = true ORDER BY T_I_TITLE_NED ASC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProductCategoryByParentOrder($parent){
		$sql = "SELECT * FROM prod_category WHERE O_I_PARENT_CATEGORY_IDF_TECH = ? AND L_I_ACTIVE = true ORDER BY T_I_TITLE_NED ASC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($parent);
		return $this->getList($sqlQuery);
	}
	
	public function getAllProductCategoryBySectionOrder($section){
		$sql = "SELECT * FROM prod_category WHERE O_SECTION_IDF_TECH = ? ORDER BY N_I_ORDER";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($section);
		return $this->getList($sqlQuery);
	}
	
	public function getAllProductCategoryParents(){
		$sql = "SELECT * FROM dekens_it01.prod_category WHERE prod_category.O_I_PARENT_CATEGORY_IDF_TECH = 0 ORDER BY prod_category.T_I_TITLE_NED";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProductCategoryBySectionOrder($section){
		$sql = "SELECT * FROM prod_category WHERE O_SECTION_IDF_TECH = ? AND L_I_ACTIVE = true ORDER BY N_I_ORDER";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($section);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProductCategory(){
		$sql = "SELECT * FROM prod_category WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function countActiveProductCategory(){
		$sql = "SELECT count(O_I_IDF_TECH) FROM prod_category WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
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
	 * This method returns array of object UserProductCategory. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserProductCategory
	 * and add this object to new array
	 */
	/*function getUserNameAndProductCategoryTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userProductCategory = new UserProductCategory();
			$userProductCategory->username = $tab[$i]["name"];
			$userProductCategory->title = $tab[$i]["title"];
			$ret[$i] = $userProductCategory; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserProductCategory{
// 	var $username;
// 	var $title;
// }
?>
