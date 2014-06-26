<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface MenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Menu 
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
 	 * @param menu primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Menu menu
 	 */
	public function insert($menu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Menu menu
 	 */
	public function update($menu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMenutype($value);

	public function queryByName($value);

	public function queryByLink($value);

	public function queryByType($value);

	public function queryByPublished($value);

	public function queryByParent($value);

	public function queryByComponentid($value);

	public function queryBySublevel($value);

	public function queryByOrdering($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByPollid($value);

	public function queryByBrowserNav($value);

	public function queryByAccess($value);

	public function queryByUtaccess($value);

	public function queryByParams($value);


	public function deleteByMenutype($value);

	public function deleteByName($value);

	public function deleteByLink($value);

	public function deleteByType($value);

	public function deleteByPublished($value);

	public function deleteByParent($value);

	public function deleteByComponentid($value);

	public function deleteBySublevel($value);

	public function deleteByOrdering($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByPollid($value);

	public function deleteByBrowserNav($value);

	public function deleteByAccess($value);

	public function deleteByUtaccess($value);

	public function deleteByParams($value);


}
?>