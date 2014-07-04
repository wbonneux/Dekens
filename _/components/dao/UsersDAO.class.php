<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface UsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Users 
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
 	 * @param user primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Users user
 	 */
	public function insert($user);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Users user
 	 */
	public function update($user);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByUsername($value);

	public function queryByEmail($value);

	public function queryByPassword($value);

	public function queryByUsertype($value);

	public function queryByBlock($value);

	public function queryBySendEmail($value);

	public function queryByGid($value);

	public function queryByRegisterDate($value);

	public function queryByLastvisitDate($value);

	public function queryByActivation($value);

	public function queryByParams($value);


	public function deleteByName($value);

	public function deleteByUsername($value);

	public function deleteByEmail($value);

	public function deleteByPassword($value);

	public function deleteByUsertype($value);

	public function deleteByBlock($value);

	public function deleteBySendEmail($value);

	public function deleteByGid($value);

	public function deleteByRegisterDate($value);

	public function deleteByLastvisitDate($value);

	public function deleteByActivation($value);

	public function deleteByParams($value);


}
?>