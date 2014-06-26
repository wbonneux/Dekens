<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ComponentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Components 
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
 	 * @param component primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Components component
 	 */
	public function insert($component);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Components component
 	 */
	public function update($component);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByLink($value);

	public function queryByMenuid($value);

	public function queryByParent($value);

	public function queryByAdminMenuLink($value);

	public function queryByAdminMenuAlt($value);

	public function queryByOption($value);

	public function queryByOrdering($value);

	public function queryByAdminMenuImg($value);

	public function queryByIscore($value);

	public function queryByParams($value);


	public function deleteByName($value);

	public function deleteByLink($value);

	public function deleteByMenuid($value);

	public function deleteByParent($value);

	public function deleteByAdminMenuLink($value);

	public function deleteByAdminMenuAlt($value);

	public function deleteByOption($value);

	public function deleteByOrdering($value);

	public function deleteByAdminMenuImg($value);

	public function deleteByIscore($value);

	public function deleteByParams($value);


}
?>