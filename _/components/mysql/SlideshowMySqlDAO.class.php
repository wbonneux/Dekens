<?php
/*
 * Class that operate on table 'language'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/28
 */

require_once('BaseCodeMySqlDAO.class.php');

class SlideshowMySqlDAO extends BaseCodeMySqlDAO implements languageDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SlideshowMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'img_slideshow');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('img_slideshow');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'img_slideshow');
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'img_slideshow');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SlideshowMySql language
 	 */
	public function insert($slideshow){
		$sql = 'INSERT INTO img_slideshow (T_I_NAME, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		//$sqlQuery->setNumber($slideshow->id);
		$sqlQuery->setString($slideshow->name);
		$sqlQuery->set($slideshow->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));

		$id = $this->executeInsert($sqlQuery);	
		$slideshow->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SlideshowMySql language
 	 */
	public function update($slideshow){
		$sql = 'UPDATE img_slideshow SET T_I_NAME = ?, L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		echo $sql;

		$sqlQuery = new SqlQuery($sql);
			
	
		$sqlQuery->setString($slideshow->name);
		$sqlQuery->set($slideshow->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		
		$sqlQuery->setNumber($slideshow->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('img_slideshow');
	}

	/**
	 * Read row
	 *
	 * @return SlideshowMySql 
	 */
	public function readRow($row){
		$slideshow = new Slideshow();
		
		$slideshow->id = $row['O_I_IDF_TECH'];
		$slideshow->name = $row['T_I_NAME'];
		$slideshow->active = $row['L_I_ACTIVE'];
		$slideshow->created = $row['S_I_CREATE_TECH'];
		$slideshow->modified = $row['S_I_MOD_TECH'];
		
		return $slideshow;
	}
}
?>