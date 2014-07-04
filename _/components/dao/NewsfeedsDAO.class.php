<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface NewsfeedsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Newsfeeds 
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
 	 * @param newsfeed primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Newsfeeds newsfeed
 	 */
	public function insert($newsfeed);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Newsfeeds newsfeed
 	 */
	public function update($newsfeed);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCatid($value);

	public function queryByName($value);

	public function queryByLink($value);

	public function queryByFilename($value);

	public function queryByPublished($value);

	public function queryByNumarticles($value);

	public function queryByCacheTime($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByOrdering($value);


	public function deleteByCatid($value);

	public function deleteByName($value);

	public function deleteByLink($value);

	public function deleteByFilename($value);

	public function deleteByPublished($value);

	public function deleteByNumarticles($value);

	public function deleteByCacheTime($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByOrdering($value);


}
?>