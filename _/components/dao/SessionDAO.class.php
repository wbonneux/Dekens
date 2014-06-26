<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface SessionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Session 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param session primary key
 	 */
	public function delete($session_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Session session
 	 */
	public function insert($session);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Session session
 	 */
	public function update($session);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsername($value);

	public function queryByTime($value);

	public function queryByGuest($value);

	public function queryByUserid($value);

	public function queryByUsertype($value);

	public function queryByGid($value);


	public function deleteByUsername($value);

	public function deleteByTime($value);

	public function deleteByGuest($value);

	public function deleteByUserid($value);

	public function deleteByUsertype($value);

	public function deleteByGid($value);


}
?>