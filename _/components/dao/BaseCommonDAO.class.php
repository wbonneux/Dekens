<?php
/*
 * Interface BaseCommonDAO
 *
 * @author: Bonneux Wim
 * @date: 2009-11-24 17:17
 */

require_once('BaseDAO.class.php');

interface BaseCommonDAO extends BaseDAO{

	/**
	 * Get Domain  by primry key
	 *
	 * @param String $id primary key
	 * @param String $table table for the query
	 * @Return object 
	 */
	public function loadBase($id,$table);

	/**
	 * Get all records from table
	 * @param String $table table for the query
	 */
	public function queryAllBase($table);
	
	/**
	 * Get all records from table ordered by field
	 * @param $orderColumn column name
	 * @param String $table table for the query
	 */
	public function queryAllOrderByBase($orderColumn,$table);
	
	/**
 	 * Delete record from table
 	 * @param object primary key
 	 * @param String $table table for the query
 	 */
	public function deleteBase($id,$table);
	

	/**
	 * Delete all rows in table
	 * @param String $table table for the query
	 */
	public function cleanBase($table);

}
?>