<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface PollMenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PollMenu 
	 */
	public function load($pollid, $menuid);

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
 	 * @param pollMenu primary key
 	 */
	public function delete($pollid, $menuid);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PollMenu pollMenu
 	 */
	public function insert($pollMenu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PollMenu pollMenu
 	 */
	public function update($pollMenu);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>