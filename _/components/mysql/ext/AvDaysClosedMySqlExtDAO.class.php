<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class AvDaysClosedMySqlExtDAO extends AvDaysClosedMySqlDAO{
	
	
	public function setSwitchActive($id,$active){
		if($active == 1)
		{
			$active = 0;
		}else{
			$active = 1;
		}
		$sql = "UPDATE  av_days_closed SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveAvDaysClosed(){
		$sql = "SELECT * FROM av_days_closed WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
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
	 * This method returns array of object UserAvDaysClosed. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserAvDaysClosed
	 * and add this object to new array
	 */
	/*function getUserNameAndAvDaysClosedTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userAvDaysClosed = new UserAvDaysClosed();
			$userAvDaysClosed->username = $tab[$i]["name"];
			$userAvDaysClosed->title = $tab[$i]["title"];
			$ret[$i] = $userAvDaysClosed; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserAvDaysClosed{
// 	var $username;
// 	var $title;
// }
?>
