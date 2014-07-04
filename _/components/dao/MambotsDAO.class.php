<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface MambotsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Mambots 
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
 	 * @param mambot primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Mambots mambot
 	 */
	public function insert($mambot);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Mambots mambot
 	 */
	public function update($mambot);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByElement($value);

	public function queryByFolder($value);

	public function queryByAccess($value);

	public function queryByOrdering($value);

	public function queryByPublished($value);

	public function queryByIscore($value);

	public function queryByClientId($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByParams($value);


	public function deleteByName($value);

	public function deleteByElement($value);

	public function deleteByFolder($value);

	public function deleteByAccess($value);

	public function deleteByOrdering($value);

	public function deleteByPublished($value);

	public function deleteByIscore($value);

	public function deleteByClientId($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByParams($value);


}
?>