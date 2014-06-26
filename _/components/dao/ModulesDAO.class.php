<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ModulesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Modules 
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
 	 * @param module primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Modules module
 	 */
	public function insert($module);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Modules module
 	 */
	public function update($module);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitle($value);

	public function queryByContent($value);

	public function queryByOrdering($value);

	public function queryByPosition($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByPublished($value);

	public function queryByModule($value);

	public function queryByNumnews($value);

	public function queryByAccess($value);

	public function queryByShowtitle($value);

	public function queryByParams($value);

	public function queryByIscore($value);

	public function queryByClientId($value);


	public function deleteByTitle($value);

	public function deleteByContent($value);

	public function deleteByOrdering($value);

	public function deleteByPosition($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByPublished($value);

	public function deleteByModule($value);

	public function deleteByNumnews($value);

	public function deleteByAccess($value);

	public function deleteByShowtitle($value);

	public function deleteByParams($value);

	public function deleteByIscore($value);

	public function deleteByClientId($value);


}
?>