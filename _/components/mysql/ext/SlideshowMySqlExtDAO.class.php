<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class SlideshowMySqlExtDAO extends SlideshowMySqlDAO{
	
	
	public function setActive($id){
		$sql = "UPDATE  img_slideshow SET  L_I_ACTIVE = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setInactive($id){
		$sql = "UPDATE  img_slideshow SET  L_I_ACTIVE = false WHERE  O_I_IDF_TECH = ?";
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
		$sql = "UPDATE  img_slideshow SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveSlideshow(){
		$sql = "SELECT * FROM img_slideshow WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function countActiveSlideshow(){
		$sql = "SELECT count(O_I_IDF_TECH) FROM img_slideshow WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
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
	 * This method returns array of object UserSlideshow. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserSlideshow
	 * and add this object to new array
	 */
	/*function getUserNameAndSlideshowTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userSlideshow = new UserSlideshow();
			$userSlideshow->username = $tab[$i]["name"];
			$userSlideshow->title = $tab[$i]["title"];
			$ret[$i] = $userSlideshow; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserSlideshow{
// 	var $username;
// 	var $title;
// }
?>
