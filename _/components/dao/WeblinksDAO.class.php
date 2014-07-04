<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface WeblinksDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Weblinks 
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
 	 * @param weblink primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Weblinks weblink
 	 */
	public function insert($weblink);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Weblinks weblink
 	 */
	public function update($weblink);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCatid($value);

	public function queryBySid($value);

	public function queryByTitle($value);

	public function queryByUrl($value);

	public function queryByDescription($value);

	public function queryByDate($value);

	public function queryByHits($value);

	public function queryByPublished($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByOrdering($value);

	public function queryByArchived($value);

	public function queryByApproved($value);

	public function queryByParams($value);


	public function deleteByCatid($value);

	public function deleteBySid($value);

	public function deleteByTitle($value);

	public function deleteByUrl($value);

	public function deleteByDescription($value);

	public function deleteByDate($value);

	public function deleteByHits($value);

	public function deleteByPublished($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByOrdering($value);

	public function deleteByArchived($value);

	public function deleteByApproved($value);

	public function deleteByParams($value);


}
?>