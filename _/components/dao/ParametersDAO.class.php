<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ParametersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Parameters 
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
 	 * @param parameter primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Parameters parameter
 	 */
	public function insert($parameter);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Parameters parameter
 	 */
	public function update($parameter);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByParamName($value);

	public function queryByParamFile($value);

	public function queryByParamVersion($value);

	public function queryByParams($value);


	public function deleteByParamName($value);

	public function deleteByParamFile($value);

	public function deleteByParamVersion($value);

	public function deleteByParams($value);


}
?>