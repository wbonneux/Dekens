<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ContainersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Containers 
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
 	 * @param container primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Containers container
 	 */
	public function insert($container);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Containers container
 	 */
	public function update($container);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByParentid($value);

	public function queryByOrdering($value);

	public function queryByPublished($value);

	public function queryByChildcount($value);

	public function queryByName($value);

	public function queryByTitle($value);

	public function queryByWindowtitle($value);

	public function queryByKeywords($value);

	public function queryByIcon($value);

	public function queryByDescription($value);


	public function deleteByParentid($value);

	public function deleteByOrdering($value);

	public function deleteByPublished($value);

	public function deleteByChildcount($value);

	public function deleteByName($value);

	public function deleteByTitle($value);

	public function deleteByWindowtitle($value);

	public function deleteByKeywords($value);

	public function deleteByIcon($value);

	public function deleteByDescription($value);


}
?>