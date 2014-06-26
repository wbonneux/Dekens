<?php 

/** 
 * Class BaseCodeMySqlDAO
 *
 * @author : Bonneux Wim <wbonneux@gmail.com>
 * @date: 2013/11/28
 */

require_once("BaseMySqlDAO.class.php");

class BaseCodeMySqlDAO extends BaseMySqlDAO implements BaseCodeDAO{

	/**
	 * Get Domain language by primry key
	 *
	 * @param String $id primary key
	 * @Return language 
	 */
	public function loadBase($id,$table){
		$sql = 'SELECT * FROM '.$table.' WHERE C_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAllBAse($table){
		$sql = 'SELECT * FROM '.$table;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderByBase($orderColumn,$table){
		$sql = 'SELECT * FROM '.$table.' ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param language primary key
 	 */
	public function deleteBase($id,$table){
		$sql = 'DELETE FROM '.$table.' WHERE C_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Delete all rows in table
	 */
	public function cleanBase($table){
		$sql = 'DELETE FROM '.$table;
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}
}

 ?>