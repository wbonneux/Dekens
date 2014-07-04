<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface MessagesCfgDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MessagesCfg 
	 */
	public function load($userId, $cfgName);

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
 	 * @param messagesCfg primary key
 	 */
	public function delete($userId, $cfgName);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessagesCfg messagesCfg
 	 */
	public function insert($messagesCfg);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessagesCfg messagesCfg
 	 */
	public function update($messagesCfg);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCfgValue($value);


	public function deleteByCfgValue($value);


}
?>