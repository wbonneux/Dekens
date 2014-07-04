<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface CoreAclAroDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CoreAclAro 
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
 	 * @param coreAclAro primary key
 	 */
	public function delete($aro_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclAro coreAclAro
 	 */
	public function insert($coreAclAro);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclAro coreAclAro
 	 */
	public function update($coreAclAro);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySectionValue($value);

	public function queryByValue($value);

	public function queryByOrderValue($value);

	public function queryByName($value);

	public function queryByHidden($value);


	public function deleteBySectionValue($value);

	public function deleteByValue($value);

	public function deleteByOrderValue($value);

	public function deleteByName($value);

	public function deleteByHidden($value);


}
?>