<?php
/*
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2009-11-24 17:17
 */
interface ContactDetailsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ContactDetails 
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
 	 * @param contactDetail primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ContactDetails contactDetail
 	 */
	public function insert($contactDetail);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ContactDetails contactDetail
 	 */
	public function update($contactDetail);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByConPosition($value);

	public function queryByAddress($value);

	public function queryBySuburb($value);

	public function queryByState($value);

	public function queryByCountry($value);

	public function queryByPostcode($value);

	public function queryByTelephone($value);

	public function queryByFax($value);

	public function queryByMisc($value);

	public function queryByImage($value);

	public function queryByImagepos($value);

	public function queryByEmailTo($value);

	public function queryByDefaultCon($value);

	public function queryByPublished($value);

	public function queryByCheckedOut($value);

	public function queryByCheckedOutTime($value);

	public function queryByOrdering($value);

	public function queryByParams($value);

	public function queryByUserId($value);

	public function queryByCatid($value);

	public function queryByAccess($value);


	public function deleteByName($value);

	public function deleteByConPosition($value);

	public function deleteByAddress($value);

	public function deleteBySuburb($value);

	public function deleteByState($value);

	public function deleteByCountry($value);

	public function deleteByPostcode($value);

	public function deleteByTelephone($value);

	public function deleteByFax($value);

	public function deleteByMisc($value);

	public function deleteByImage($value);

	public function deleteByImagepos($value);

	public function deleteByEmailTo($value);

	public function deleteByDefaultCon($value);

	public function deleteByPublished($value);

	public function deleteByCheckedOut($value);

	public function deleteByCheckedOutTime($value);

	public function deleteByOrdering($value);

	public function deleteByParams($value);

	public function deleteByUserId($value);

	public function deleteByCatid($value);

	public function deleteByAccess($value);


}
?>