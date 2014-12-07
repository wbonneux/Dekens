<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class SecondHandMySqlExtDAO extends SecondHandMySqlDAO{
	
	
	public function setSold($id){
		$sql = "UPDATE  prod_secondhand SET  L_I_SOLD = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setUnsold($id){
		$sql = "UPDATE  prod_secondhand SET  L_I_SOLD = false WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	
	public function setActive($id){
		$sql = "UPDATE  prod_secondhand SET  L_I_ACTIVE = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setInactive($id){
		$sql = "UPDATE  prod_secondhand SET  L_I_ACTIVE = false WHERE  O_I_IDF_TECH = ?";
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
		$sql = "UPDATE  prod_secondhand SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveSecondHand(){
		$sql = "SELECT * FROM prod_secondhand WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function countActiveSecondHand(){
		$sql = "SELECT count(O_I_IDF_TECH) FROM prod_secondhand WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->querySingleResult($sqlQuery);
	}
	
	public function getFrontPageItems(){
		$sql = "SELECT * FROM PROD_SECONDHAND WHERE L_I_ACTIVE = TRUE AND L_I_SOLD = FALSE ORDER BY PROD_SECONDHAND.S_I_CREATE_TECH DESC LIMIT 5";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
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
	 * This method returns array of object UserSecondHand. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserSecondHand
	 * and add this object to new array
	 */
	/*function getUserNameAndSecondHandTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userSecondHand = new UserSecondHand();
			$userSecondHand->username = $tab[$i]["name"];
			$userSecondHand->title = $tab[$i]["title"];
			$ret[$i] = $userSecondHand; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserSecondHand{
// 	var $username;
// 	var $title;
// }
?>
