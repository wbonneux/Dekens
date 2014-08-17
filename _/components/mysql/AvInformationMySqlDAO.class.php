<?php
/*
 * Class that operate on table 'CONT_CONTENT'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/30
 */
require_once('BaseCommonMySqlDAO.class.php');

class AvInformationMySqlDAO extends BaseCommonMySqlDAO implements AvInformationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ContentMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'av_information');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('av_information');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'av_information');
	}
	
	/**
 	 * Delete record from table
 	 * @param content primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'av_information');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('av_information');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentMySql content
 	 */
	public function insert(AvInformation $avInformation){
		$sql = 'INSERT INTO av_information (T_I_INFORMATION, L_I_ACTIVE, S_I_CREATE_TECH) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avInformation->information);
		$sqlQuery->set($avInformation->active);
		//$sqlQuery->set((new \DateTime())->format('Y-m-d H:i:s'));
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$id = $this->executeInsert($sqlQuery);	
		$avInformation->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentMySql content
 	 */
	public function update(AvInformation $avInformation){
		$sql = 'UPDATE av_information SET T_I_INFORMATION = ?,  L_I_ACTIVE = ?, S_I_MOD_TECH = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setString($avInformation->information);
		$sqlQuery->set($avInformation->active);
		$sqlQuery->set(date('Y-m-d H:i:s'));
		$sqlQuery->setNumber($avInformation->id);
		
 		echo 'update<br/>';
		echo $sqlQuery->getQuery();
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Read row
	 *
	 * @return ContentMySql 
	 */
	public function readRow($row){
		$avInformation = new AvInformation();
		
		$avInformation->id 				= $row['O_I_IDF_TECH'];
		$avInformation->information		= $row['T_I_INFORMATION'];
		$avInformation->active 			= $row['L_I_ACTIVE'];
		$avInformation->created 		= $row['S_I_CREATE_TECH'];
		$avInformation->modified		= $row['S_I_MOD_TECH'];
		
		return $avInformation;
	}
	
}
?>