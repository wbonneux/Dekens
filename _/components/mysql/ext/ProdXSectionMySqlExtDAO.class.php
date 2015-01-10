<?php
/*
 * Class that operate on table 'secondHand'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

// require_once('_/components/php/include_dao.php');

class ProdXSectionMySqlExtDAO extends ProdXSectionMySqlDAO{
	
	
	public function setActive($id){
		$sql = "UPDATE  section_x_category SET  L_I_ACTIVE = true WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function setInactive($id){
		$sql = "UPDATE  section_x_category SET  L_I_ACTIVE = false WHERE  O_I_IDF_TECH = ?";
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
		$sql = "UPDATE  section_x_category SET  L_I_ACTIVE =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getActiveProdXSection(){
		$sql = "SELECT * FROM section_x_category WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProdXSectionOrderedByOrder(){
		$sql = "SELECT * FROM section_x_category WHERE L_I_ACTIVE = true ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function getProdXSectionByOrder($orderId){
		$sql = "SELECT * FROM section_x_category WHERE N_I_ORDER = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($orderId);
		return $this->querySingleResult($sqlQuery);
	}
	
	public function getProdXSectionBySection($sectionId){
		$sql = "SELECT * FROM section_x_category WHERE O_SECTION_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($sectionId);
		return $this->getRow($sqlQuery);
	}
	public function getActiveProdXSectionBySectionOrder($sectionId){
		$sql = "SELECT * FROM section_x_category WHERE L_I_ACTIVE = true AND O_SECTION_IDF_TECH = ? ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($sectionId);
		return $this->getList($sqlQuery);
	}
	
	public function getProdXSectionByCategory($categoryId){
		$sql = "SELECT * FROM section_x_category WHERE O_CATEGORY_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($categoryId);
		return $this->getList($sqlQuery);
	}
	
	public function getActiveProdXSectionByCategoryOrder($categoryId){
		$sql = "SELECT * FROM section_x_category WHERE L_I_ACTIVE = true AND O_CATEGORY_IDF_TECH = ? ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($categoryId);
		return $this->getList($sqlQuery);
	}
	
	public function getAllProdXSectionBySectionOrder($sectionId){
		$sql = "SELECT * FROM section_x_category WHERE O_SECTION_IDF_TECH = ? ORDER BY N_I_ORDER ASC";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($sectionId);
		return $this->getList($sqlQuery);
	}
	

	
	public function deleteProdXSectionBySection($sectionId){
		$sql = "DELETE FROM section_x_category WHERE O_SECTION_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($sectionId);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function deleteProdXSectionByCategory($categoryId){
		$sql = "DELETE FROM section_x_category WHERE O_CATEGORY_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($categoryId);
		return $this->executeUpdate($sqlQuery);
	}

	
	public function getOrderForDown($active, $categoryId, $orderId){
		$sql = "SELECT MAX(N_I_ORDER) FROM section_x_category WHERE L_I_ACTIVE = ? AND O_CATEGORY_IDF_TECH = ? AND WHERE N_I_ORDER < ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($active);
		$sqlQuery->set($categoryId);
		$sqlQuery->setNumber($orderId);
		return $this->querySingleResult($sqlQuery);
	}
	
	public function getOrderForUp($active, $categoryId, $orderId){
		$sql = "SELECT MIN(N_I_ORDER) FROM section_x_category WHERE L_I_ACTIVE = ? AND O_CATEGORY_IDF_TECH = ? AND WHERE N_I_ORDER > ?";
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
		$record_origin = $this->getProdXSectionByOrder($origin);
		$record_origin->order = $dest;
		$this->update($record_origin);
		
		$record_dest = $this->getProdXSectionByOrder($dest);
		$record_dest->order = $dest;
		$this->update($record_dest);
		
	}
	
	public function countActiveProdXSection(){
		$sql = "SELECT count(O_I_IDF_TECH) FROM section_x_category WHERE L_I_ACTIVE = true ORDER BY S_I_CREATE_TECH DESC";
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
	 * This method returns array of object UserProdXSection. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserProdXSection
	 * and add this object to new array
	 */
	/*function getUserNameAndProdXSectionTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, secondHand c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userProdXSection = new UserProdXSection();
			$userProdXSection->username = $tab[$i]["name"];
			$userProdXSection->title = $tab[$i]["title"];
			$ret[$i] = $userProdXSection; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
// class UserProdXSection{
// 	var $username;
// 	var $title;
// }
?>
