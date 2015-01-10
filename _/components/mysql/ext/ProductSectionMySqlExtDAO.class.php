<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class ProductSectionMySqlExtDAO extends ProductSectionMySqlDAO{
	
	public function setActive($id){
		$sql = "UPDATE  prod_section SET  L_I_ACTIVE = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setInactive($id){
		$sql = "UPDATE  prod_section SET  L_I_ACTIVE = false WHERE  O_I_IDF_TECH = ?";
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
		$sql = "UPDATE  prod_section SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	public function getActiveProductSectionOrderByTitle(){
		$sql = "SELECT * FROM prod_section WHERE L_I_ACTIVE = true ORDER BY T_I_TITLE_NED ASC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getAllProductSectionOrderByTitle(){
		$sql = "SELECT * FROM prod_section ORDER BY T_I_TITLE_NED ASC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProductSectionOrderByOrder(){
		$sql = "SELECT * FROM prod_section WHERE L_I_ACTIVE = true ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getAllProductSectionOrderByOrder(){
		$sql = "SELECT * FROM prod_section ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
		public function getActiveProductSection(){
		$sql = "SELECT * FROM prod_section WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function countActiveProductSection(){
		$sql = "SELECT count(O_I_IDF_TECH) FROM prod_section WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->querySingleResult($sqlQuery);
	}
	
	public function getProductSectionUpRecord($order){
		//sql: get maximum order number where order < order from the id
		$sql = "SELECT * FROM dekens_it01.prod_section WHERE (N_I_ORDER) IN ( SELECT MAX(N_I_ORDER) FROM PROD_SECTION WHERE N_I_ORDER < ?)";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($order);
		return $this->getRow($sqlQuery);
	}
	
	public function getProductSectionDownRecord($order){
		$sql = "SELECT * FROM dekens_it01.prod_section WHERE (N_I_ORDER) IN ( SELECT MIN(N_I_ORDER)  FROM PROD_SECTION  WHERE N_I_ORDER > ?)";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($order);
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
	 * This method returns array of object UserProductSection. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserProductSection
	 * and add this object to new array
	 */
	/*function getUserNameAndProductSectionTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userProductSection = new UserProductSection();
			$userProductSection->username = $tab[$i]["name"];
			$userProductSection->title = $tab[$i]["title"];
			$ret[$i] = $userProductSection; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserProductSection{
// 	var $username;
// 	var $title;
// }
?>
