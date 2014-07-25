<?php
/*
 * Class that operate on table 'frontPage'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2014/07/14
 */

//require_once('_/components/php/include_dao.php');

class ContentFrontPageMySqlExtDAO extends ContentFrontPageMySqlDAO{
	
	
	public function setSwitchActive($id,$active){
		if($active == 1)
		{
			$active = 0;
		}else{
			$active = 1;
		}
		$sql = "UPDATE cont_frontpage SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveFrontPage(){
		$sql = "SELECT * FROM cont_frontpage WHERE L_I_ACTIVE = ? ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber(1);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get rows count where column created_by is equal to method param
	 */
	/*function getCountByCreatedBy($createdBy){
		$sql = "SELECT count(*) FROM frontPage WHERE created_by=?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($createdBy);
		return $this->querySingleResult($sqlQuery);
	}*/
	
	/**
	 * This method returns array of object UserFrontPage. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserFrontPage
	 * and add this object to new array
	 */
	/*function getUserNameAndFrontPageTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, frontPage c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userFrontPage = new UserFrontPage();
			$userFrontPage->username = $tab[$i]["name"];
			$userFrontPage->title = $tab[$i]["title"];
			$ret[$i] = $userFrontPage; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserFrontPage{
// 	var $username;
// 	var $title;
// }
?>
