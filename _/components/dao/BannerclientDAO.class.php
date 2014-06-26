<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface BannerclientDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Bannerclient 
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
 	 * @param bannerclient primary key
 	 */
	public function delete($cid);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Bannerclient bannerclient
 	 */
	public function insert($bannerclient);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Bannerclient bannerclient
 	 */
	public function update($bannerclient);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByContact($value);

	public function queryByEmail($value);

	public function queryByExtrainfo($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByEditor($value);


	public function deleteByName($value);

	public function deleteByContact($value);

	public function deleteByEmail($value);

	public function deleteByExtrainfo($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByEditor($value);


}
?>