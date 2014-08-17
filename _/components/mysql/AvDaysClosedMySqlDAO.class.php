<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class AvDaysClosedMySqlDAO extends BaseCommonMySqlDAO implements AvDaysClosedDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'av_days_closed');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('av_days_closed');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'av_days_closed');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'av_days_closed');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('av_days_closed');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(AvDaysClosed $avDaysClosed){
		$sql = 'INSERT INTO av_days_closed (T_I_DAY, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avDaysClosed->day);
		$sqlQuery->set($avDaysClosed->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$id = $this->executeInsert($sqlQuery);	
		$avDaysClosed->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(AvDaysClosed $avDaysClosed){
		$sql = 'UPDATE av_days_closed SET T_I_DAY = ?,  L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avDaysClosed->day);
		$sqlQuery->set($avDaysClosed->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$sqlQuery->setNumber($avDaysClosed->id);
		
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
		$avDaysClosed = new AvDaysClosed();
		
		$avDaysClosed->id 				= $row['O_I_IDF_TECH'];
		$avDaysClosed->day				= $row['T_I_DAY'];
		$avDaysClosed->active 			= $row['L_I_ACTIVE'];
		$avDaysClosed->created 			= $row['S_I_CREATE_TECH'];
		$avDaysClosed->modified			= $row['S_I_MOD_TECH'];
		
		return $avDaysClosed;
	}
	
}
?>