<?php 

/** 
 * Class BaseCommonMySqlDAO
 *
 * @author : Bonneux Wim <wbonneux@gmail.com>
 * @date: 2013/11/28
 */

require_once("BaseMySqlDAO.class.php");

class BaseCommonMySqlDAO extends BaseMySqlDAO implements BaseCommonDAO{

	/**
	 * Get Domain  by primry key
	 *
	 * @param String $id primary key
	 * @param String $table table for the query
	 * @Return object 
	 */
	public function loadBase($id,$table){
		$sql = 'SELECT * FROM '.$table.' WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}
	
	/**
	 * Get Domain  by primry key and active
	 *
	 * @param String $id primary key
	 * @param String $table table for the query
	 * @Return object
	 */
	public function loadBaseActive($id,$table){
		$sql = 'SELECT * FROM '.$table.' WHERE L_I_ACTIVE = TRUE AND O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}
	

	/**
	 * Get all records from table
	 * @param String $table table for the query
	 */
	public function queryAllBase($table){
		$sql = 'SELECT * FROM '.$table;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 * @param $orderColumn column name
	 * @param String $table table for the query
	 */
	public function queryAllOrderByBase($orderColumn,$table){
		$sql = 'SELECT * FROM '.$table.' ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param object primary key
 	 * @param String $table table for the query
 	 */
	public function deleteBase($id,$table){
		$sql = 'DELETE FROM '.$table.' WHERE O_I_IDF_TECH = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		//echo $sqlQuery->getQuery();
		return $this->executeUpdate($sqlQuery);
	}

	

	/**
	 * Delete all rows in table
	 * @param String $table table for the query
	 */
	public function cleanBase($table){
		$sql = 'DELETE FROM '.$table;
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}
}

 ?>