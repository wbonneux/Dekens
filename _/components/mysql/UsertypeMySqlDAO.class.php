<?php
/*
 * Class that operate on table 'CODE_USER_TYPE'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/28
 */

require_once('BaseCodeMySqlDAO.class.php');

class UserTypeMySqlDAO extends BaseCodeMySqlDAO implements UserTypeDAO {

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UserTypeMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'CODE_USER_TYPE');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('CODE_USER_TYPE');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'CODE_USER_TYPE');
	}
	
	/**
 	 * Delete record from table
 	 * @param userType primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'CODE_USER_TYPE');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param userTypeMySql userType
 	 */
	public function insert($userType){
		$sql = 'INSERT INTO CODE_USER_TYPE (T_I_TITLE) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		//$sqlQuery->setNumber($userType->id);
		$sqlQuery->setString($userType->title);

		$id = $this->executeInsert($sqlQuery);	
		$userType->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param userTypeMySql userType
 	 */
	public function update($userType){
		$sql = 'UPDATE CODE_USER_TYPE SET T_I_TITLE ';
		$sql = $sql.'S_I_MOD_TECH = now() WHERE C_I_IDF_TECH = ?';
		echo $sql;

		$sqlQuery = new SqlQuery($sql);
			
		$sqlQuery->setString($userType->title);
		
		$sqlQuery->setNumber($userType->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('CODE_USER_TYPE');
	}

	/**
	 * Read row
	 *
	 * @return userTypeMySql 
	 */
	public function readRow($row){
		$userType = new userType();
		
		$userType->id = $row['C_I_IDF_TECH'];
		$userType->title = $row['T_I_TITLE'];
		$userType->created = $row['S_I_CREATE_TECH'];
		$userType->created = $row['S_I_MOD_TECH'];
		
		return $userType;
	}
}
?>