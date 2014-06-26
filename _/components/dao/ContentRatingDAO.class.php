<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ContentRatingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ContentRating 
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
 	 * @param contentRating primary key
 	 */
	public function delete($content_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentRating contentRating
 	 */
	public function insert($contentRating);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentRating contentRating
 	 */
	public function update($contentRating);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRatingSum($value);

	public function queryByRatingCount($value);

	public function queryByLastip($value);


	public function deleteByRatingSum($value);

	public function deleteByRatingCount($value);

	public function deleteByLastip($value);


}
?>