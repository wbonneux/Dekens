<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface CoreAclAroSectionsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CoreAclAroSections 
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
 	 * @param coreAclAroSection primary key
 	 */
	public function delete($section_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CoreAclAroSections coreAclAroSection
 	 */
	public function insert($coreAclAroSection);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CoreAclAroSections coreAclAroSection
 	 */
	public function update($coreAclAroSection);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByValue($value);

	public function queryByOrderValue($value);

	public function queryByName($value);

	public function queryByHidden($value);


	public function deleteByValue($value);

	public function deleteByOrderValue($value);

	public function deleteByName($value);

	public function deleteByHidden($value);


}
?>