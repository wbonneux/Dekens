<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class AvDaysHoursMySqlDAO extends BaseCommonMySqlDAO implements AvDaysHoursDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'av_days_hours');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('av_days_hours');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'av_days_hours');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'av_days_hours');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('av_days_hours');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(AvDaysHours $avDaysHours){
		$sql = 'INSERT INTO av_days_hours (T_I_DAY, T_I_HRS_DAY, T_I_HRS_AM, T_I_HRS_PM, L_I_CLOSED, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avDaysHours->day);
		$sqlQuery->setString($avDaysHours->hoursDay);
		$sqlQuery->setString($avDaysHours->hoursAm);
		$sqlQuery->setString($avDaysHours->hoursPm);
		$sqlQuery->set($avDaysHours->closed);
		$sqlQuery->set($avDaysHours->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$id = $this->executeInsert($sqlQuery);	
		$avDaysHours->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(AvDaysHours $avDaysHours){
		$sql = 'UPDATE av_days_hours SET T_I_DAY = ?, T_I_HRS_DAY = ?, T_I_HRS_AM = ?, T_I_HRS_PM,  L_I_SOLD= ?,  L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avDaysHours->day);
		$sqlQuery->setString($avDaysHours->hoursDay);
		$sqlQuery->setString($avDaysHours->hoursAm);
		$sqlQuery->setString($avDaysHours->hoursPm);
		$sqlQuery->set($avDaysHours->closed);
		$sqlQuery->set($avDaysHours->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$sqlQuery->setNumber($avDaysHours->id);
		
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
		$avDaysHours = new AvDaysHours();
		
		$avDaysHours->id 				= $row['O_I_IDF_TECH'];
		$avDaysHours->day				= $row['T_I_DAY'];
		$avDaysHours->active 			= $row['L_I_ACTIVE'];
		$avDaysHours->created 			= $row['S_I_CREATE_TECH'];
		$avDaysHours->modified			= $row['S_I_MOD_TECH'];
		
		return $avDaysHours;
	}
	
}
?>