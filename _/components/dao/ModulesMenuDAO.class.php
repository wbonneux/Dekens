<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ModulesMenuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ModulesMenu 
	 */
	public function load($moduleid, $menuid);

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
 	 * @param modulesMenu primary key
 	 */
	public function delete($moduleid, $menuid);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ModulesMenu modulesMenu
 	 */
	public function insert($modulesMenu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ModulesMenu modulesMenu
 	 */
	public function update($modulesMenu);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>