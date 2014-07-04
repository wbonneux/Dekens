<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface TemplatesMenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TemplatesMenu 
	 */
	public function load($template, $menuid);

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
 	 * @param templatesMenu primary key
 	 */
	public function delete($template, $menuid);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TemplatesMenu templatesMenu
 	 */
	public function insert($templatesMenu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TemplatesMenu templatesMenu
 	 */
	public function update($templatesMenu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByClientId($value);


	public function deleteByClientId($value);


}
?>