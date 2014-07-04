<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface PollsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Polls 
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
 	 * @param poll primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Polls poll
 	 */
	public function insert($poll);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Polls poll
 	 */
	public function update($poll);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitle($value);

	public function queryByVoters($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByPublished($value);

	public function queryByAccess($value);

	public function queryByLag($value);


	public function deleteByTitle($value);

	public function deleteByVoters($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByPublished($value);

	public function deleteByAccess($value);

	public function deleteByLag($value);


}
?>