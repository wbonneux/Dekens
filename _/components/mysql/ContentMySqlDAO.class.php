<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class ContentMySqlDAO extends BaseCommonMySqlDAO implements ContentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'CONT_CONTENT');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('CONT_CONTENT');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'CONT_CONTENT');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'CONT_CONTENT');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('CONT_CONTENT');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert($content){
		$sql = 'INSERT INTO cont_content (T_I_TITLE, T_I_INTRO_TEXT, T_I_FULL_TEXT, O_CONT_SECTION, C_CODE_LANGUAGE, T_I_AUTHOR, L_I_PUBLISHED, T_I_IMAGE, N_I_ORDER) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($content->title);
		$sqlQuery->setString($content->introtext);
		$sqlQuery->setString($content->fulltext);
		$sqlQuery->setNumber($content->sectionid);
		$sqlQuery->setNumber($content->languageid);
		$sqlQuery->setString($content->author);
		$sqlQuery->set($content->published);
		$sqlQuery->setString($content->imageURL);

		$sqlQuery->setNumber($content->order);
		
		$id = $this->executeInsert($sqlQuery);	
		$content->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update($content){
		$sql = 'UPDATE cont_content SET T_I_TITLE = ?, T_I_INTRO_TEXT = ?, T_I_FULL_TEXT = ?, O_CONT_SECTION = ?, C_CODE_LANGUAGE = ?, T_I_AUTHOR = ?, L_I_PUBLISHED = ?, N_I_ORDER = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($content->title);
		$sqlQuery->set($content->introtext);
		$sqlQuery->set($content->fulltext);
		$sqlQuery->setNumber($content->sectionid);
		$sqlQuery->setNumber($content->languageid);
		$sqlQuery->set($content->author);
		$sqlQuery->set($content->published);
		$sqlQuery->set($content->imageURL);
		$sqlQuery->setNumber($content->order);

		$sqlQuery->setNumber($content->id);
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Read row
	 *
	 * @return ContentMySql 
	 */
	public function readRow($row){
		$content = new Content();
		
		$content->id = $row['O_I_IDF_TECH'];
		$content->title = $row['T_I_TITLE'];
		$content->introtext = $row['T_I_INTRO_TEXT'];
		$content->fulltext = $row['T_I_FULL_TEXT'];
		$content->sectionid = $row['O_CONT_SECTION'];
		$content->languageid = $row['C_CODE_LANGUAGE'];
		$content->published = $row['L_I_PUBLISHED'];
		$content->imageURL = $row['T_I_IMAGE'];
		$content->order = $row['N_I_ORDER'];
		$content->created = $row['S_I_CREATE_TECH'];
		$content->modified = $row['S_I_MOD_TECH'];

		return $content;
	}
	
}
?>