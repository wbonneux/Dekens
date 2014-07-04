<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface PollDataDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PollData 
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
 	 * @param pollData primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PollData pollData
 	 */
	public function insert($pollData);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PollData pollData
 	 */
	public function update($pollData);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPollid($value);

	public function queryByText($value);

	public function queryByHits($value);


	public function deleteByPollid($value);

	public function deleteByText($value);

	public function deleteByHits($value);


}
?>