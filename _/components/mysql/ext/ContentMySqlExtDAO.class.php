<?php
/*
 * Class that operate on table 'content'. Database Mysql.
 * Here you can write non standard sql queries
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */

require_once('_/components/php/include_dao.php');

class ContentMySqlExtDAO extends ContentMySqlDAO{
	
	
	public function setSwitchPublic($id,$published){
		if($published == 1)
		{
			$published = 0;
		}else{
			$published = 1;
		}
		$sql = "UPDATE  CONT_CONTENT SET  L_I_PUBLISHED =  ? WHERE  O_I_IDF_TECH = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($published);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	public function getContentBySection($sectionId){
		$language = DAOFactory::getLanguageDAO()->getLanguageByCode($languageCode); 
		$sql = "SELECT * FROM CONT_CONTENT WHERE O_CONT_SECTION = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($sectionId);
		return $this->getList($sqlQuery);
	}

	public function getContentBySectionOrderBy($sectionId,$ordercolumn){
		$sql = "SELECT * FROM CONT_CONTENT WHERE O_CONT_SECTION = ? ORDER BY ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($sectionId);
		$sqlQuery->setString($ordercolumn);
		return $this->getList($sqlQuery);
	}

	public function getContentBySectionLanguage($sectionId,$languageCode){
		$language = DAOFactory::getLanguageDAO()->getLanguageByCode($languageCode); 
		$sql = "SELECT * FROM CONT_CONTENT WHERE O_CONT_SECTION = ? AND C_CODE_LANGUAGE = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($sectionId);
		$sqlQuery->setNumber($language->id);
		return $this->getList($sqlQuery);
	}

	public function getContentBySectionLanguageOrderBy($sectionId,$languageCode,$ordercolumn){
		$language = DAOFactory::getLanguageDAO()->getLanguageByCode($languageCode); 
		$sql = "SELECT * FROM CONT_CONTENT WHERE O_CONT_SECTION = ? AND C_CODE_LANGUAGE = ? ORDER BY ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($sectionId);
		$sqlQuery->setNumber($language->id);
		$sqlQuery->setString($ordercolumn);
		return $this->getList($sqlQuery);
	}
	
	public function getContentBySectionLanguagePublished($sectionId,$languageCode,$published){
		$language = DAOFactory::getLanguageDAO()->getLanguageByCode($languageCode); 
		$sql = "SELECT * FROM CONT_CONTENT WHERE O_CONT_SECTION = ? AND C_CODE_LANGUAGE = ? AND L_I_PUBLISHED = ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($sectionId);
		$sqlQuery->setNumber($language->id);
		$sqlQuery->set($published);
		return $this->getList($sqlQuery);
	}

	public function getContentBySectionLanguagePublishedOrderBy($sectionId,$languageCode,$published,$ordercolumn){
		$language = DAOFactory::getLanguageDAO()->getLanguageByCode($languageCode); 
		$sql = "SELECT * FROM CONT_CONTENT WHERE O_CONT_SECTION = ? AND C_CODE_LANGUAGE = ? AND L_I_PUBLISHED = ? order by ?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($sectionId);
		$sqlQuery->setNumber($language->id);
		$sqlQuery->set($published);
		$sqlQuery->setString($ordercolumn);
		return $this->getList($sqlQuery);
	}

	/*function queryByContentAndCreatedBy($content, $createdBy){
		$sql = "SELECT * FROM content WHERE title like '%".$content."%' AND created_by=?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($createdBy);
		return $this->getList($sqlQuery);
	}*/	

	/**
	 * Get rows count where column created_by is equal to method param
	 */
	/*function getCountByCreatedBy($createdBy){
		$sql = "SELECT count(*) FROM content WHERE created_by=?";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($createdBy);
		return $this->querySingleResult($sqlQuery);
	}*/
	
	/**
	 * This method returns array of object UserContent. 
	 * Here sql query gets data from two tables.
	 * Developer must loop by variable tab and create for all rows objec UserContent
	 * and add this object to new array
	 */
	/*function getUserNameAndContentTitle(){		
		$sql = "SELECT u.name, c.title FROM users u, content c WHERE c.created_by=u.id";
		$sqlQuery = new SqlQuery($sql);
		$tab = $this->execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$userContent = new UserContent();
			$userContent->username = $tab[$i]["name"];
			$userContent->title = $tab[$i]["title"];
			$ret[$i] = $userContent; 
		}
		return $ret;
	}*/
}

/**
 * Non standard transfer object 
 */
class UserContent{
	var $username;
	var $title;
}
?>
