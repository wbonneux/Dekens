<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface CommentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Comment 
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
 	 * @param comment primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Comment comment
 	 */
	public function insert($comment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Comment comment
 	 */
	public function update($comment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByArticleid($value);

	public function queryByIp($value);

	public function queryByName($value);

	public function queryByComments($value);

	public function queryByStartdate($value);

	public function queryByPublished($value);


	public function deleteByArticleid($value);

	public function deleteByIp($value);

	public function deleteByName($value);

	public function deleteByComments($value);

	public function deleteByStartdate($value);

	public function deleteByPublished($value);


}
?>