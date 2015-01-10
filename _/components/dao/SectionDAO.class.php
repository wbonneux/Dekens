<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface SectionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Sections 
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
 	 * @param section primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Sections section
 	 */
	public function insert($section);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Sections section
 	 */
	public function update($section);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitle($value);

	public function queryByName($value);

	public function queryByImage($value);

	public function queryByScope($value);

	public function queryByImagePosition($value);

	public function queryByDescription($value);

	public function queryByPublished($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByOrdering($value);

	public function queryByAccess($value);

	public function queryByCount($value);

	public function queryByParams($value);


	public function deleteByTitle($value);

	public function deleteByName($value);

	public function deleteByImage($value);

	public function deleteByScope($value);

	public function deleteByImagePosition($value);

	public function deleteByDescription($value);

	public function deleteByPublished($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByOrdering($value);

	public function deleteByAccess($value);

	public function deleteByCount($value);

	public function deleteByParams($value);


}
?>