<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class ContentFrontPageMySqlDAO extends BaseCommonMySqlDAO implements ContentFrontPageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'cont_frontpage');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('cont_frontpage');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'cont_frontpage');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'cont_frontpage');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('cont_frontpage');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(ContentFrontPage $frontPage){
		$sql = 'INSERT INTO cont_frontpage (T_I_TITLE, T_I_DESCRIPTION, T_I_IMAGE, T_I_IMAGE_POS, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($frontPage->title);
		$sqlQuery->set($frontPage->description);
		$sqlQuery->setString($frontPage->image);
		$sqlQuery->setString($frontPage->imagePos);
		$sqlQuery->set($frontPage->active);
		//$sqlQuery->set((new DateTime())->format('Y-m-d H:i:s'));
		//$sqlQuery->set(new \DateTime( 'now' ));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$id = $this->executeInsert($sqlQuery);	
		$frontPage->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(ContentFrontPage $frontPage){
		$sql = 'UPDATE cont_frontpage SET T_I_TITLE = ?, T_I_DESCRIPTION = ?, T_I_IMAGE = ?, T_I_IMAGE_POS = ?, L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($frontPage->title);
		$sqlQuery->set($frontPage->description);
		$sqlQuery->setString($frontPage->image);
		$sqlQuery->setString($frontPage->imagePos);
		$sqlQuery->set($frontPage->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$sqlQuery->setNumber($frontPage->id);
		
// 		echo 'update<br/>';
 		//echo $sqlQuery->getQuery();
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Read row
	 *
	 * @return ContentMySql 
	 */
	public function readRow($row){
		$frontPage = new ContentFrontPage();
		
		$frontPage->id 				= $row['O_I_IDF_TECH'];
		$frontPage->title 			= $row['T_I_TITLE'];
		$frontPage->description 	= $row['T_I_DESCRIPTION'];
		$frontPage->image 			= $row['T_I_IMAGE'];
		$frontPage->imagePos		= $row['T_I_IMAGE_POS'];
		$frontPage->active 			= $row['L_I_ACTIVE'];
		$frontPage->created 		= $row['S_I_CREATE_TECH'];
		$frontPage->modified		= $row['S_I_MOD_TECH'];
		
		return $frontPage;
	}
	
}
?>