<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-10-17 01:53
 */
interface ExampleAutoincrementDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ExampleAutoincrement 
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
 	 * @param exampleAutoincrement primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ExampleAutoincrement exampleAutoincrement
 	 */
	public function insert($exampleAutoincrement);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ExampleAutoincrement exampleAutoincrement
 	 */
	public function update($exampleAutoincrement);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByData($value);


	public function deleteByData($value);


}
?>