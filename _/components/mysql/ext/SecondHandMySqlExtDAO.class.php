<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

require_once('_/components/php/include_dao.php');

class SecondHandMySqlExtDAO extends SecondHandMySqlDAO{
	
	
	public function setSwitchActive($id,$active){
		if($active == 1)
		{
			$active = 0;
		}else{
			$active = 1;
		}
		$sql = "UPDATE  PROD_SECONDHAND SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveSecondHand(){
		$sql = "SELECT * FROM PROD_SECONDHAND WHERE L_I_ACTIVE = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber(1);
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
