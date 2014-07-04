<?php
/*
 * Class that operate on table 'USR_USER'. Database Mysql.
 *
 * @author: Bonneux Wim
 * @date: 2013/11/29
 */
require_once('BaseCommonMySqlDAO.class.php');

class UserMySqlDAO extends BaseCommonMySqlDAO implements UserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UserMySql 
	 */
	public function load($id){
		return parent::loadBase($id,'USR_USER');
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		return parent::queryAllBase('USR_USER');
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		return parent::queryAllOrderByBase($orderColumn,'USR_USER');
	}
	
	/**
 	 * Delete record from table
 	 * @param user primary key
 	 */
	public function delete($id){
		return parent::deleteBase($id,'USR_USER');
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		return parent::cleanBase('USR_USER');
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserMySql user
 	 */
	public function insert($user){
		$sql = 'INSERT INTO USR_USER (T_I_NAME, T_I_USERNAME, T_I_EMAIL, C_CODE_USER_TYPE, C_CODE_LANGUAGE, T_I_PASSWORD, L_I_ACTIVE) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->name);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->email);
		$sqlQuery->setNumber($user->usertype);
		$sqlQuery->setNumber($user->language);
		$sqlQuery->set($user->password);
		$sqlQuery->set($user->active);
		
		$id = $this->executeInsert($sqlQuery);	
		$user->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserMySql user
 	 */
	public function update($user){
		$sql = 'UPDATE URS_USER SET T_I_NAME = ?, T_I_USERNAME = ?, T_I_EMAIL = ?, C_CODE_USER_TYPE = ?, C_CODE_LANGUAGE = ?, T_I_PASSWORD = ?, L_I_ACTIVE = ? WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->name);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->email);
		$sqlQuery->setNumber($user->usertype);
		$sqlQuery->setNumber($user->language);
		$sqlQuery->set($user->password);
		$sqlQuery->set($user->active);

		$sqlQuery->setNumber($user->id);
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Read row
	 *
	 * @return UserMySql 
	 */
	public function readRow($row){
		$user = new User();
		
		$user->id = $row['O_I_IDF_TECH'];
		$user->name = $row['T_I_NAME'];
		$user->username = $row['T_I_USERNAME'];
		$user->email = $row['T_I_EMAIL'];
		$user->usertype = $row['C_CODE_USER_TYPE'];
		$user->language = $row['C_CODE_LANGUAGE'];
		$user->password = $row['T_I_PASSWORD'];
		$user->active = $row['L_I_ACTIVE'];
		$user->created = $row['S_I_CREATE_TECH'];
		$user->modified = $row['S_I_MOD_TECH'];

		return $user;
	}
	
}
?>