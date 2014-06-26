<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-10-17 02:54
 */
interface Table1DAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Table1 
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
 	 * @param table1 primary key
 	 */
	public function delete($id_auto);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Table1 table1
 	 */
	public function insert($table1);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Table1 table1
 	 */
	public function update($table1);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByData1($value);


	public function deleteByData1($value);


}
?>