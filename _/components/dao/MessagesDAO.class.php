<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface MessagesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Messages 
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
 	 * @param message primary key
 	 */
	public function delete($message_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Messages message
 	 */
	public function insert($message);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Messages message
 	 */
	public function update($message);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserIdFrom($value);

	public function queryByUserIdTo($value);

	public function queryByFolderId($value);

	public function queryByDateTime($value);

	public function queryByState($value);

	public function queryByPriority($value);

	public function queryBySubject($value);

	public function queryByMessage($value);


	public function deleteByUserIdFrom($value);

	public function deleteByUserIdTo($value);

	public function deleteByFolderId($value);

	public function deleteByDateTime($value);

	public function deleteByState($value);

	public function deleteByPriority($value);

	public function deleteBySubject($value);

	public function deleteByMessage($value);


}
?>