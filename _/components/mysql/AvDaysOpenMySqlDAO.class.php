<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class AvDaysOpenMySqlDAO extends BaseCommonMySqlDAO implements AvDaysOpenDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'av_days_open');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('av_days_open');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'av_days_open');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'av_days_open');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('av_days_open');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(AvDaysOpen $avDaysOpen){
		$sql = 'INSERT INTO av_days_open (T_I_DAY, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avDaysOpen->day);
		$sqlQuery->set($avDaysOpen->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$id = $this->executeInsert($sqlQuery);	
		$avDaysOpen->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(AvDaysOpen $avDaysOpen){
		$sql = 'UPDATE av_days_open SET T_I_DAY = ?,  L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avDaysOpen->day);
		$sqlQuery->set($avDaysOpen->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$sqlQuery->setNumber($avDaysOpen->id);
		
// 		echo 'update<br/>';
// 		echo $sqlQuery->getQuery();
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Read row
	 *
	 * @return ContentMySql 
	 */
	public function readRow($row){
		$avDaysOpen = new AvDaysOpen();
		
		$avDaysOpen->id 				= $row['O_I_IDF_TECH'];
		$avDaysOpen->day				= $row['T_I_DAY'];
		$avDaysOpen->active 			= $row['L_I_ACTIVE'];
		$avDaysOpen->created 			= $row['S_I_CREATE_TECH'];
		$avDaysOpen->modified			= $row['S_I_MOD_TECH'];
		
		return $avDaysOpen;
	}
	
}
?>