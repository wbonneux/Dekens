<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface CoreAclGroupsAroMapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CoreAclGroupsAroMap 
	 */
	public function load($groupId, $sectionValue, $aroId);

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
 	 * @param coreAclGroupsAroMap primary key
 	 */
	public function delete($groupId, $sectionValue, $aroId);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclGroupsAroMap coreAclGroupsAroMap
 	 */
	public function insert($coreAclGroupsAroMap);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclGroupsAroMap coreAclGroupsAroMap
 	 */
	public function update($coreAclGroupsAroMap);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>