<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface PollDateDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PollDate 
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
 	 * @param pollDate primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PollDate pollDate
 	 */
	public function insert($pollDate);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PollDate pollDate
 	 */
	public function update($pollDate);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDate($value);

	public function queryByVoteId($value);

	public function queryByPollId($value);


	public function deleteByDate($value);

	public function deleteByVoteId($value);

	public function deleteByPollId($value);


}
?>