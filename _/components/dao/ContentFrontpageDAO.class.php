<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ContentFrontpageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ContentFrontpage 
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
 	 * @param contentFrontpage primary key
 	 */
	public function delete($content_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContentFrontpage contentFrontpage
 	 */
	public function insert($contentFrontpage);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContentFrontpage contentFrontpage
 	 */
	public function update($contentFrontpage);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByOrdering($value);


	public function deleteByOrdering($value);


}
?>