<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface CoreAclAroGroupsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CoreAclAroGroups 
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
 	 * @param coreAclAroGroup primary key
 	 */
	public function delete($group_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclAroGroups coreAclAroGroup
 	 */
	public function insert($coreAclAroGroup);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclAroGroups coreAclAroGroup
 	 */
	public function update($coreAclAroGroup);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByParentId($value);

	public function queryByName($value);

	public function queryByLft($value);

	public function queryByRgt($value);


	public function deleteByParentId($value);

	public function deleteByName($value);

	public function deleteByLft($value);

	public function deleteByRgt($value);


}
?>