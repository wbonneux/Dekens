<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface TemplatePositionsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TemplatePositions 
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
 	 * @param templatePosition primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TemplatePositions templatePosition
 	 */
	public function insert($templatePosition);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TemplatePositions templatePosition
 	 */
	public function update($templatePosition);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPosition($value);

	public function queryByDescription($value);


	public function deleteByPosition($value);

	public function deleteByDescription($value);


}
?>